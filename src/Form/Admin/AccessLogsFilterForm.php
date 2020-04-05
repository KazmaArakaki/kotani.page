<?php
declare(strict_types=1);

namespace App\Form\Admin;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class AccessLogsFilterForm extends Form {
  public function validationDefault(Validator $validator): Validator {
    return $validator;
  }

  protected function _buildSchema(Schema $schema): Schema {
    $schema
        ->addField('session_id', ['type' => 'string'])
        ->addField('path', ['type' => 'string'])
        ->addField('user_agent', ['type' => 'string'])
        ->addField('ip_address', ['type' => 'string']);

    return $schema;
  }

  protected function _execute(array $data): bool {
    return true;
  }
}

