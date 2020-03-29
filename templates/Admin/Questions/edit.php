<div class="container py-4">
  <?= $this->Form->create($question, ['novalidate' => true]) ?>
    <div class="form-group">
      <label>
        <?= __('質問') ?>
      </label>

      <?= $this->Form->textarea('body', [
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('body') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('body') ?>
      </div>
    </div>

    <div class="form-group">
      <label>
        <?= __('回答') ?>
      </label>

      <?= $this->Form->textarea('answer', [
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('answer') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('answer') ?>
      </div>
    </div>

    <button class="btn btn-primary">
      <?= __('質問と回答を保存する') ?>
    </button>
  <?= $this->Form->end() ?>
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

