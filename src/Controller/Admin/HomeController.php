<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\I18n\Time;

class HomeController extends AdminController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('AccessLogs');
  }

  public function index() {
  }
}

