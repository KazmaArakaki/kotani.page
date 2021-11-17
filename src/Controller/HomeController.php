<?php
declare(strict_types=1);

namespace App\Controller;

class HomeController extends AppController {
  public function initialize(): void {
    parent::initialize();
  }

  public function index() {
  }

  public function healthcheck() {
    return $this->response
        ->withStatus(200)
        ->withType('text')
        ->withStringBody('OK');
  }
}

