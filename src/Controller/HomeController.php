<?php
declare(strict_types=1);

namespace App\Controller;

class HomeController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Images');
  }

  public function index() {
  }

  public function hello() {
  }

  public function gallery() {
    $images = $this->Images->find()
        ->where([
          ['Images.is_shown_in_gallery' => true],
        ])
        ->order(['Images.created' => 'desc'])
        ->toList();

    $this->set(compact([
      'images',
    ]));
  }

  public function access() {
  }

  public function billing() {
  }

  public function services() {
  }
}

