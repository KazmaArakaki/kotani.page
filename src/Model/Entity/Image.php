<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Table\ImagesTable;
use Cake\Core\Configure;
use Cake\ORM\Entity;

class Image extends Entity {
  protected $_accessible = [
    '*' => true,
    'id' => false,
  ];

  public function getDirname() {
    return WWW_ROOT . implode(DS, [
      'upload', 'image', $this['id'],
    ]);
  }

  public function getFilename() {
    $filename = $this['uuid'];

    if (ImagesTable::checkFileTypeSupported($this['file_type'])) {
      $filename .= '.' . ImagesTable::getExtByFileType($this['file_type']);
    }

    return $filename;
  }

  public function getFilepath() {
    return implode(DS, [
      $this->getDirname(),
      $this->getFilename(),
    ]);
  }

  public function getUrl() {
    return implode('/', [
      Configure::read('App.fullBaseUrl'),
      'upload', 'image', $this['id'],
      $this->getFilename(),
    ]);
  }
}

