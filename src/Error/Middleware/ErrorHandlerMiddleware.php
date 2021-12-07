<?php
declare(strict_types=1);

namespace App\Error\Middleware;

use Cake\Controller\Exception\MissingActionException;
use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\MissingControllerException;
use Cake\Http\Response;
use Cake\I18n\Time;
use Cake\Log\Log;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;

class ErrorHandlerMiddleware extends CakeErrorHandlerMiddleware {
  public function handleException(Throwable $exception, ServerRequestInterface $request): ResponseInterface {
    $errorHandler = $this->getErrorHandler();
    $renderer = $errorHandler->getRenderer($exception, $request);

    try {
      $response = $renderer->render();

      $invalidAccessLogsTable = TableRegistry::getTableLocator()->get('InvalidAccessLogs');
      $invalidAccessLog = null;

      if ($exception instanceof MissingControllerException) {
        $invalidAccessLog = $invalidAccessLogsTable->newEntity([
          'ip_address' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ]);

        Log::error(sprintf('[ErrorHandlerMiddleware::handleException] Controller not found. (%s)', json_encode([
          'path' => $request->getPath(),
          'ip' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ])));
      } else if ($exception instanceof MissingActionException) {
        $invalidAccessLog = $invalidAccessLogsTable->newEntity([
          'ip_address' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ]);

        Log::error(sprintf('[ErrorHandlerMiddleware::handleException] Action not found. (%s)', json_encode([
          'path' => $request->getPath(),
          'ip' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ])));
      } else {
        $errorHandler->logException($exception, $request);
      }

      if (!empty($invalidAccessLog)) {
        $invalidAccessLogCount = $invalidAccessLogsTable->find()
            ->where([
              ['InvalidAccessLogs.ip_address' => $invalidAccessLog['ip_address']],
            ])
            ->count();

        $invalidAccessLog['ban_until_datetime'] = Time::now('UTC')->addMinutes($invalidAccessLogCount + 1);

        $invalidAccessLogSaved = $invalidAccessLogsTable->save($invalidAccessLog);

        if (!$invalidAccessLogSaved) {
          Log::error(sprintf('[ErrorHandlerMiddleware::handleException] Failed to save InvalidAccessLog. (%s)', json_encode([
            'invalid_access_log' => $invalidAccessLog,
          ])));
        }
      }
    } catch (Throwable $internalException) {
      $errorHandler->logException($internalException, $request);

      $response = $this->handleInternalError();
    }

    return $response;
  }

  protected function handleInternalError(): ResponseInterface {
    $response = new Response(['body' => 'An Internal Server Error Occurred']);

    return $response->withStatus(500);
  }
}

