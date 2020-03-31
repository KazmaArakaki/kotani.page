<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

class HomeController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Images');
    $this->loadModel('Questions');
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

  public function sitemap() {
    $lastModifiedImage = $this->Images->find()
        ->order(['Images.modified' => 'desc'])
        ->first();

    $lastModifiedQuestion = $this->Questions->find()
        ->order(['Questions.modified' => 'desc'])
        ->first();

    $routesInfo = [
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'index',
        ], true),
        'modified' => '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'hello',
        ], true),
        'modified' => '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'access',
        ], true),
        'modified' => '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'services',
        ], true),
        'modified' => '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'billing',
        ], true),
        'modified' => '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Home',
          'action' => 'gallery',
        ], true),
        'modified' => !empty($lastModifiedImage) ? $lastModifiedImage['modified']->i18nFormat('yyyy-MM-dd') : '2020-03-31',
      ],
      [
        'url' => Router::url([
          'controller' => 'Questions',
          'action' => 'index',
        ], true),
        'modified' => !empty($lastModifiedQuestion) ? $lastModifiedQuestion['modified']->i18nFormat('yyyy-MM-dd') : '2020-03-31',
      ],
    ];

    $this->set(compact([
      'routesInfo',
    ]));
  }
}

