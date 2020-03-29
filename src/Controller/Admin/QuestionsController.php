<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;
use Cake\Log\Log;

class QuestionsController extends AdminController {
  public function index() {
    $questions = $this->Questions->find()
        ->order(['Questions.id' => 'desc'])
        ->toList();

    $this->set(compact([
      'questions',
    ]));
  }

  public function view($id = null) {
    $question = $this->Questions->find()
        ->where([
          ['Questions.id' => $id],
        ])
        ->first();

    if (empty($question)) {
      $this->Flash->error(__('質問が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    $this->set(compact([
      'question',
    ]));
  }

  public function edit($id = null) {
    $question = $this->Questions->find()
        ->where([
          ['Questions.id' => $id],
        ])
        ->first();

    if (empty($question)) {
      $this->Flash->error(__('質問が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['put'])) {
      try {
        $this->Questions->patchEntity($question, [
          'body' => $this->request->getData('body'),
          'answer' => $this->request->getData('answer'),
        ]);

        if ($question->hasErrors()) {
          throw new AppException(__('質問と回答を保存できませんできた。入力内容を確認してください。'));
        }

        $questionSaved = $this->Questions->save($question);

        if (!$questionSaved) {
          throw new AppException(__('質問と回答を保存できませんできた。時間を置いて再度お試しください。'));
        }

        $this->Flash->success(__('質問と回答を保存しました。'));

        return $this->redirect([
          'prefix' => 'Admin',
          'controller' => 'Questions',
          'action' => 'view',
          $question['id'],
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'question',
    ]));
  }

  public function delete($id = null) {
    try {
      if (!$this->request->is(['delete'])) {
        throw new AppException(__('不正なリクエストです。'));
      }

      $question = $this->Questions->find()
          ->where([
            ['Questions.id' => $id],
          ])
          ->first();

      if (empty($question)) {
        throw new AppException(__('質問が見つかりませんでした。'));
      }

      $questionDeleted = $this->Questions->delete($question);

      if (!$questionDeleted) {
        throw new AppException(__('質問を削除できませんでした。時間を置いて再度お試しください。'));
      }

      $this->Flash->success(__('質問を削除しました。'));
    } catch (AppException $exception) {
      $this->Flash->error($exception->getMessage());
    }

    return $this->redirect($this->request->referer());
  }
}

