<?php
declare(strict_types=1);

namespace App\Form\Admin;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class SignupForm extends Form {
  public function validationDefault(Validator $validator): Validator {
    $validator->notEmpty([
      'name' => [
        'message' => __('名前を入力してください。'),
      ],
      'password' => [
        'message' => __('パスワードを入力してください。'),
      ],
    ]);

    return $validator;
  }

  protected function _buildSchema(Schema $schema): Schema {
    $schema
        ->addField('name', ['type' => 'string'])
        ->addField('password', ['type' => 'string']);

    return $schema;
  }

  protected function _execute(array $data): bool {
    return true;
  }
}

