<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class AdminController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadComponent('Auth', [
      'authError' => false,
      'loginAction' => [
        'prefix' => 'Admin',
        'controller' => 'Users',
        'action' => 'signin',
      ],
    ]);
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $this->viewBuilder()
        ->setLayout('admin');
  }
}

