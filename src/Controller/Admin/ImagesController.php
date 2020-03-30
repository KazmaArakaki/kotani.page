<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use Cake\Utility\Text;

class ImagesController extends AdminController {
  public function create() {
    $image = null;

    if ($this->request->is(['post'])) {
      try {
        ConnectionManager::get('default')->transactional(function (&$connection) use ($image) {
          $file = $this->request->getData('file');

          $image = $this->Images->newEntity([
            'file_type' => $file->getClientMediaType(),
            'name' => $this->request->getData('name'),
            'description' => $this->request->getData('description'),
            'is_shown_in_carousel' => $this->request->getData('is_shown_in_carousel'),
            'is_shown_in_gallery' => $this->request->getData('is_shown_in_gallery'),
          ]);

          if ($file->getError() === UPLOAD_ERR_NO_FILE) {
            $image->setError('file', __('画像を選択してください。'));

            throw new AppException(__('画像を選択してください。'));
          }

          if ($file->getError() !== UPLOAD_ERR_OK) {
            throw new AppException(__('画像を保存できませんでした。'));
          }

          $isImageUuidDuplicated = true;

          while ($isImageUuidDuplicated) {
            $this->Images->patchEntity($image, [
              'uuid' => Text::uuid(),
            ]);

            $isImageUuidDuplicated = $this->Images->find()
                ->where([
                  ['Images.uuid' => $image['uuid']],
                ])
                ->limit(1)
                ->count() > 0;
          }

          $imageSaved = $this->Images->save($image);

          if (!$imageSaved) {
            throw new AppException(__('画像を保存できませんでした。'));
          }

          if (!file_exists($image->getDirname())) {
            $isDirectoryMade = mkdir($image->getDirname(), 0777, true);

            if (!$isDirectoryMade) {
              throw new AppException(__('画像を保存できませんでした。'));
            }
          }

          $file->moveTo($image->getFilepath());

          $this->Flash->success(__('画像を保存しました。'));

          return $this->redirect([
            'action' => 'index',
          ]);
        });
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      } catch (\Exception $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'image',
    ]));
  }

  public function index() {
    $images = $this->Images->find()
        ->order(['Images.id' => 'desc'])
        ->toList();

    $this->set(compact([
      'images',
    ]));
  }

  public function view($id = null) {
    $image = $this->Images->find()
        ->where([
          ['Images.id' => $id],
        ])
        ->first();

    if (empty($image)) {
      $this->Flash->error(__('画像が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    $this->set(compact([
      'image',
    ]));
  }

  public function edit($id = null) {
    $image = $this->Images->find()
        ->where([
          ['Images.id' => $id],
        ])
        ->first();

    if (empty($image)) {
      $this->Flash->error(__('画像が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['put'])) {
      try {
        $this->Images->patchEntity($image, [
          'name' => $this->request->getData('name'),
          'description' => $this->request->getData('description'),
          'is_shown_in_carousel' => $this->request->getData('is_shown_in_carousel'),
          'is_shown_in_gallery' => $this->request->getData('is_shown_in_gallery'),
        ]);

        $imageSaved = $this->Images->save($image);

        if (!$imageSaved) {
          throw new AppException(__('画像を保存できませんでした。'));
        }

        $this->Flash->success(__('画像を保存しました。'));

        return $this->redirect([
          'action' => 'index',
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      } catch (\Exception $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'image',
    ]));
  }

  public function delete($id = null) {
    try {
      if (!$this->request->is(['delete'])) {
        throw new AppException(__('不正なリクエストです。'));
      }

      $image = $this->Images->find()
          ->where([
            ['Images.id' => $id],
          ])
          ->first();

      if (empty($image)) {
        throw new AppException(__('画像が見つかりませんでした。'));
      }

      $imageDeleted = $this->Images->delete($image);

      if (!$imageDeleted) {
        throw new AppException(__('画像を削除できませんでした。時間を置いて再度お試しください。'));
      }

      $this->Flash->success(__('画像を削除しました。'));
    } catch (AppException $exception) {
      $this->Flash->error($exception->getMessage());
    }

    return $this->redirect($this->request->referer());
  }
}

