<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;

class AccessLogExcludesController extends AdminController {
  public function initialize(): void {
    parent::initialize();
  }

  public function create() {
    try {
      if (!$this->request->is(['post'])) {
        throw new AppException(__('不正なリクエストです。'));
      }

      $accessLogExclude = $this->AccessLogExcludes->newEntity([]);

      if (!empty($this->request->getData('session_id'))) {
        $accessLogExclude['session_id'] = $this->request->getData('session_id');
      }

      if (!empty($this->request->getData('path'))) {
        $accessLogExclude['path'] = $this->request->getData('path');
      }

      if (!empty($this->request->getData('user_agent'))) {
        $accessLogExclude['user_agent'] = $this->request->getData('user_agent');
      }

      if (!empty($this->request->getData('ip_address'))) {
        $accessLogExclude['ip_address'] = $this->request->getData('ip_address');
      }

      $accessLogExcludeSaved = $this->AccessLogExcludes->save($accessLogExclude);

      if (!$accessLogExcludeSaved) {
        throw new AppException(__('除外対象を追加できませんでした。'));
      }

      $this->Flash->success(__('除外対象を追加しました。'));
    } catch (AppException $exception) {
      $this->Flash->error($exception->getMessage());
    }

    return $this->redirect($this->request->referer());
  }

  public function edit($id = null) {
    try {
      if (!$this->request->is(['put'])) {
        throw new AppException(__('不正なリクエストです。'));
      }

      $accessLogExclude = $this->AccessLogExcludes->find()
          ->where([
            ['AccessLogExcludes.id' => $id],
          ])
          ->first();

      if (empty($accessLogExclude)) {
        throw new AppException(__('除外対象が見つかりませんでした。'));
      }

      if ($this->request->getData('is_active') !== null) {
        $accessLogExclude['is_active'] = !!$this->request->getData('is_active');
      }

      $accessLogExcludeSaved = $this->AccessLogExcludes->save($accessLogExclude);

      if (!$accessLogExcludeSaved) {
        throw new AppException(__('除外対象を更新できませんでした。'));
      }

      $this->Flash->success(__('除外対象を更新しました。'));
    } catch (AppException $exception) {
      $this->Flash->error($exception->getMessage());
    }

    return $this->redirect($this->request->referer());
  }

  public function delete($id = null) {
    try {
      if (!$this->request->is(['delete'])) {
        throw new AppException(__('不正なリクエストです。'));
      }

      $accessLogExclude = $this->AccessLogExcludes->find()
          ->where([
            ['AccessLogExcludes.id' => $id],
          ])
          ->first();

      if (empty($accessLogExclude)) {
        throw new AppException(__('除外対象が見つかりませんでした。'));
      }

      $accessLogExcludeDeleted = $this->AccessLogExcludes->delete($accessLogExclude);

      if (!$accessLogExcludeDeleted) {
        throw new AppException(__('除外対象を削除できませんでした。'));
      }

      $this->Flash->success(__('除外対象を削除しました。'));
    } catch (AppException $exception) {
      $this->Flash->error($exception->getMessage());
    }

    return $this->redirect($this->request->referer());
  }
}

