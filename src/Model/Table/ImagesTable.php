<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Validation\Validator;

class ImagesTable extends Table {
  const FILE_TYPE_EXT_MAP = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
  ];

  public function validationDefault(Validator $validator): Validator {
    $validator->notEmpty([
      'name' => [
        'message' => __('名前を入力してください。'),
      ],
    ]);

    return $validator;
  }

  public static function checkFileTypeSupported(string $fileType): bool {
    return array_key_exists($fileType, self::FILE_TYPE_EXT_MAP);
  }

  public static function getExtByFileType(string $fileType): ?string {
    if (!self::checkFileTypeSupported($fileType)) {
      return null;
    }

    return self::FILE_TYPE_EXT_MAP[$fileType];
  }
}

