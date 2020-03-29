<?php
declare(strict_types=1);

namespace App\Controller;

use App\Exception\Exception as AppException;
use Cake\Log\Log;

class QuestionsController extends AppController {
  public function index() {
    $questions = $this->Questions->find()
        ->where([
          ['Questions.summary != ""'],
          ['Questions.body != ""'],
          ['Questions.answer != ""'],
        ])
        ->toList();

    $newQuestion = null;

    if ($this->request->is(['post'])) {
      try {
        $newQuestion = $this->Questions->newEntity([
          'body' => $this->request->getData('body'),
        ]);

        $questionSaved = $this->Questions->save($newQuestion);

        if (!$questionSaved) {
          throw new AppException(__('ご質問を受付できませんでした。入力内容をご確認ください。'));
        }

        $this->Flash->alert(__('ご質問を受け付けました。確認次第順番に回答させていただきますのでしばらくお待ちください。ありがとうございました。'));

        return $this->redirect([
          'action' => 'index',
        ]);
      } catch (AppException $exception) {
        $this->Flash->alert($exception->getMessage());
      }
    }

    $this->set(compact([
      'questions',
      'newQuestion',
    ]));
  }

  public function view($id = null) {
  }
}

