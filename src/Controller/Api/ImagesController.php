<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Event\EventInterface;
use Cake\Log\Log;

class ImagesController extends ApiController {
  public function index() {
    $conditions = [];

    if (!empty($this->request->getQuery('type')) && $this->request->getQuery('type') === 'carousel') {
      $conditions[] = ['Images.is_shown_in_carousel' => true];
    }

    $images = $this->Images->find()
        ->where($conditions)
        ->order(['Images.created' => 'desc'])
        ->toList();

    $this->responseData['data']['images'] = [];

    foreach ($images as $image) {
      $this->responseData['data']['images'][] = [
        'url' => $image->getUrl(),
        'name' => h($image['name']),
        'description' => h($image['description']),
        'is_shown_in_carousel' => $image['is_shown_in_carousel'],
        'is_shown_in_gallery' => $image['is_shown_in_gallery'],
      ];
    }
  }
}

