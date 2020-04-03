<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use Cake\Utility\Text;

class AppController extends Controller {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('AccessLogs');

    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
  }

  public function beforeFilter(EventInterface $event): void {
    parent::beforeFilter($event);

    Log::info(vsprintf('%s %s %s (%s)', [
      $this->response->getStatusCode(),
      $this->request->getMethod(),
      $this->request->getRequestTarget(),
      json_encode([
        'handler' => [
          'controller' => $this->request->getParam('controller'),
          'action' => $this->request->getParam('action'),
        ],
        'pass' => $this->request->getParam('pass'),
        'query' => $this->request->getQuery(),
        'data' => $this->request->getData(),
        'referer' => $this->request->referer(),
        'response' => $this->viewBuilder()->getVars(),
      ]),
    ]), [
      'scope' => [
        'access',
      ],
    ]);
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $session = $this->request->getSession();

    if (!$session->check('AccessLog.sessionId')) {
      $session->write('AccessLog.sessionId', Text::uuid());
    }

    if (!in_array($this->request->getParam('prefix'), ['Admin', 'Api'])) {
      $accessLog = $this->AccessLogs->newEntity([
        'session_id' => $session->read('AccessLog.sessionId'),
        'path' => $this->request->getRequestTarget(),
        'user_agent' => $this->request->getHeaderLine('User-Agent'),
        'ip_address' => !empty($this->request->getEnv('HTTP_X_FORWARDED_FOR')) ? $this->request->getEnv('HTTP_X_FORWARDED_FOR'): '',
        'is_mobile' => $this->request->is(['mobile']),
      ]);

      $this->AccessLogs->save($accessLog);
    }
  }
}

