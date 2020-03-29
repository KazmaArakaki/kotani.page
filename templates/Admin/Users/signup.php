<div class="container py-4">
  <?= $this->Form->create($form, ['novalidate' => true]) ?>
    <div class="form-group">
      <label>
        <?= __('名前') ?>
      </label>

      <?= $this->Form->text('name', [
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('name') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('name') ?>
      </div>
    </div>

    <div class="form-group">
      <label>
        <?= __('パスワード') ?>
      </label>

      <?= $this->Form->password('password', [
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('password') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('password') ?>
      </div>
    </div>

    <button class="btn btn-primary">
      <?= __('登録') ?>
    </button>
  <?= $this->Form->end() ?>
</div>

