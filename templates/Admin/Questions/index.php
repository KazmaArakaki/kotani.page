<div class="container py-4">
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
      <?php foreach ($questions as $question): ?>
      <tr>
        <td class="text-right">
          <?= h($question['id']) ?>
        </td>

        <td>
          <?= $this->Text->truncate($question['body'], 20) ?>

          <div>
            <?php if (empty($question['answer'])): ?>
            <span class="badge badge-primary">
              <?= __('未回答') ?>
            </span>
            <?php endif; ?>
          </div>
        </td>

        <td class="text-right">
          <?= $question['created']->i18nFormat('yyyy/MM/dd HH:mm') ?>
        </td>

        <td>
          <a href="<?= $this->Url->build([
            'prefix' => 'Admin',
            'controller' => 'Questions',
            'action' => 'view',
            $question['id'],
          ]) ?>" class="btn btn-outline-secondary btn-sm btn-block p-0" style="font-size: 12px;">
            <?= __('詳細') ?>
          </a>

          <a href="<?= $this->Url->build([
            'prefix' => 'Admin',
            'controller' => 'Questions',
            'action' => 'edit',
            $question['id'],
          ]) ?>" class="btn btn-warning btn-sm btn-block p-0" style="margin-top: 4px; font-size: 12px;">
            <?= __('編集') ?>
          </a>

          <?= $this->Form->postLink(__('削除'), [
            'prefix' => 'Admin',
            'controller' => 'Questions',
            'action' => 'delete',
            $question['id'],
          ], [
            'method' => 'delete',
            'confirm' => __('この質問を削除しますか？'),
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

