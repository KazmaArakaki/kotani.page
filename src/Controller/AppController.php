<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\EventInterface;

class AppController extends Controller {
  public function initialize(): void {
    parent::initialize();

    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
  }

  public function beforeFilter(EventInterface $event) {
    parent::beforeFilter($event);
  }

  public function beforeRender(EventInterface $event) {
    parent::beforeRender($event);
  }
}

