<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Validation\Validator;

class QuestionsTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);
  }

  public function validationDefault(Validator $validator): Validator {
    $validator->notEmpty([
      'body' => [
        'message' => __('質問を入力してください。'),
      ],
    ]);

    return $validator;
  }
}

