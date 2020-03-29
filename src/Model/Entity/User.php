<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity {
  protected $_accessible = [
    '*' => true,
    'id' => false,
  ];

  protected function _setPassword(string $password) {
    if (strlen($password) > 0) {
      $passwordHasher = new DefaultPasswordHasher();

      return $passwordHasher->hash($password);
    }
  }
}

