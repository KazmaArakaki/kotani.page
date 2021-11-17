<?php
declare(strict_types=1);

namespace App\Error\Middleware;

use Cake\Controller\Exception\MissingActionException;
use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;
use Cake\Http\Exception\MissingControllerException;
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

      if ($exception instanceof MissingControllerException) {
        Log::error(sprintf('[ErrorHandlerMiddleware::handleException] Controller not found. (%s)', json_encode([
          'path' => $request->getPath(),
          'ip' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ])));
      } else if ($exception instanceof MissingActionException) {
        Log::error(sprintf('[ErrorHandlerMiddleware::handleException] Action not found. (%s)', json_encode([
          'path' => $request->getPath(),
          'ip' => $request->getHeaderLine('X-Forwarded-For'),
          'user_agent' => $request->getHeaderLine('User-Agent'),
        ])));
      } else {
        $errorHandler->logException($exception, $request);
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

