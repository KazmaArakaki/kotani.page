<div class="container py-4">
  <ul class="nav justify-content-end mb-4">
    <li class="nav-item">
      <a href="<?= $this->Url->build([
        'action' => 'create',
      ]) ?>" class="btn btn-primary">
        <?= __('新しい画像を追加') ?>
      </a>
    </li>
  </ul>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-right" style="width: 48px;">
          <?= h('id') ?>
        </th>

        <th>
          <?= __('内容') ?>
        </th>

        <th class="text-right" style="width: 164px;">
          <?= __('日時') ?>
        </th>

        <th class="text-center" style="width: 120px;">
          <?= __('アクション') ?>
        </th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($images as $image): ?>
      <tr>
        <td class="text-right">
          <?= h($image['id']) ?>
        </td>

        <td>
          <h3 class="h5">
            <?= h($image['name']) ?>
          </h3>

          <div class="row">
            <div class="col-auto" style="width: 150px;">
              <img src="<?= $image->getUrl() ?>" class="d-block mx-auto" style="max-width: 120px; max-height: 80px;">
            </div>

            <div class="col">
	      <div class="mb-2">
		<?php if ($image['is_shown_in_carousel']): ?>
		<span class="badge badge-info">
		  <?= __('カルーセル') ?>
		</span>
		<?php endif; ?>

		<?php if ($image['is_shown_in_gallery']): ?>
		<span class="badge badge-info">
		  <?= __('ギャラリー') ?>
		</span>
		<?php endif; ?>
	      </div>

              <div class="text-secondary">
		<?= !empty($image['description']) ? nl2br(h($image['description'])) : '' ?>
	      </div>
            </div>
          </div>
        </td>

        <td class="text-right">
          <?= $image['created']->i18nFormat('yyyy/MM/dd HH:mm') ?>
        </td>

        <td>
          <a href="<?= $this->Url->build([
            'prefix' => 'Admin',
            'controller' => 'Images',
            'action' => 'view',
            $image['id'],
          ]) ?>" class="btn btn-outline-secondary btn-sm btn-block p-0" style="font-size: 12px;">
            <?= __('詳細') ?>
          </a>

          <a href="<?= $this->Url->build([
            'prefix' => 'Admin',
            'controller' => 'Images',
            'action' => 'edit',
            $image['id'],
          ]) ?>" class="btn btn-warning btn-sm btn-block p-0" style="margin-top: 4px; font-size: 12px;">
            <?= __('編集') ?>
          </a>

          <?= $this->Form->postLink(__('削除'), [
            'prefix' => 'Admin',
            'controller' => 'Images',
            'action' => 'delete',
            $image['id'],
          ], [
            'method' => 'delete',
            'confirm' => __('この画像を削除しますか？'),
            'block' => true,
            'class' => 'btn btn-danger btn-sm btn-block p-0',
            'style' => 'margin-top: 4px; font-size: 12px;',
          ]) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

