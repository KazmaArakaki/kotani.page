<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Log\Log;

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

    if (!in_array($this->request->getParam('prefix'), ['Admin', 'Api'])) {
      $accessLog = $this->AccessLogs->newEntity([
        'session_id' => session_id(),
        'path' => $this->request->getRequestTarget(),
        'user_agent' => $this->request->getHeaderLine('User-Agent'),
        'is_mobile' => $this->request->is(['mobile']),
      ]);

      $this->AccessLogs->save($accessLog);
    }
  }
}

