<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;
use App\Form\Admin\SigninForm;
use App\Form\Admin\SignupForm;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Log\Log;

class UsersController extends AdminController {
  public function signup() {
    $form = new SignupForm();

    if ($this->request->is(['post'])) {
      try {
        $isValidated = $form->execute($this->request->getData());

        if (!$isValidated) {
          throw new AppException(__('入力内容を確認してください。'));
        }

        $user = $this->Users->find()
            ->where([
              ['Users.name' => $this->request->getData('name')],
            ])
            ->first();

        if (!empty($user)) {
          throw new AppException(__('同じ名前のユーザーが存在します。'));
        }

        $user = $this->Users->newEntity([
          'name' => $this->request->getData('name'),
          'password' => $this->request->getData('password'),
        ]);

        $userSaved = $this->Users->save($user);

        if (!$userSaved) {
          throw new AppException(__('ユーザー情報を保存できませんでした。時間を置いて再度お試しください。'));
        }

        $this->Flash->success(__('新規ユーザーを登録しました。'));
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'form',
    ]));
  }

  public function signin() {
    $form = new SigninForm();

    if ($this->request->is(['post'])) {
      try {
        $isValidated = $form->execute($this->request->getData());

        if (!$isValidated) {
          throw new AppException(__('入力内容を確認してください。'));
        }

        $user = $this->Users->find()
            ->where([
              ['Users.name' => $this->request->getData('name')],
            ])
            ->first();

        if (empty($user)) {
          throw new AppException(__('ユーザーが見つかりませんでした。'));
        }

        $passwordHasher = new DefaultPasswordHasher();

        $passwordChecked = $passwordHasher->check($this->request->getData('password'), $user['password']);

        if (!$passwordChecked) {
          throw new AppException(__('パスワードが正しくありません。'));
        }

        $this->Auth->setUser([
          'id' => $user['id'],
        ]);

        $this->Flash->success(__('ようこそ{0}さん', $user['name']));

        if (!empty($this->request->getQuery('redirect'))) {
          return $this->redirect($this->request->getQuery('redirect'));
        }

        return $this->redirect([
          'prefix' => 'Admin',
          'controller' => 'Home',
          'action' => 'index',
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'form',
    ]));
  }
}

