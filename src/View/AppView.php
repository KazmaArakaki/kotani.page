<?php
declare(strict_types=1);

namespace App\View;

use Cake\View\View;

class AppView extends View {
  public function initialize(): void {
    parent::initialize();

    $this->Paginator->setTemplates([
      'first' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
      'last' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
      'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
      'current' => '<li class="page-item active"><a href="#" class="page-link">{{text}}</a></li>',
    ]);
  }
}

