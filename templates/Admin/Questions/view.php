<div class="container py-4">
  <h3>
    <?= __('質問日時') ?>
  </h3>

  <p>
    <?= $question['created']->i18nFormat('yyyy/MM/dd HH:mm') ?>
  </p>

  <h3>
    <?= __('質問内容') ?>
  </h3>

  <p>
    <?= nl2br(h($question['body'])) ?>
  </p>

  <h3>
    <?= __('回答') ?>
  </h3>

  <p>
    <?php if (empty($question['answer'])): ?>
    <?= __('未回答です') ?>
    <?php endif; ?>

    <?= nl2br(h($question['answer'])) ?>
  </p>
</div>

<div class="container py-4">
  <hr>

  <div class="row">
    <div class="col-auto">
    <a href="<?= $this->Url->build([
      'prefix' => 'Admin',
      'controller' => 'Questions',
      'action' => 'index',
    ]) ?>" class="btn btn-outline-secondary">
        <?= __('一覧へ戻る') ?>
      </a>
    </div>
  </div>
</div>

