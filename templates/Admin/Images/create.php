<div class="container py-4">
  <?= $this->Form->create($image, ['type' => 'file', 'novalidate' => true]) ?>
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
        <?= __('ファイル選択') ?>
      </label>

      <label class="<?= implode(' ', [
        'form-control',
        $this->Form->isFieldError('file') ? 'is-invalid' : '',
      ]) ?>" style="height: auto; min-height: calc(2.25rem + 2px); cursor: copy;">
        <?= $this->Form->file('file', [
          'accept' => 'image/*',
          'id' => 'file-field',
          'class' => 'd-none',
        ]) ?>

        <img id="preview" class="preview">
      </label>

      <div class="invalid-feedback">
        <?= $this->Form->error('file') ?>
      </div>
    </div>

    <div class="form-group">
      <label>
        <?= __('説明') ?>
      </label>

      <?= $this->Form->textarea('description', [
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('description') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('description') ?>
      </div>
    </div>

    <div class="form-group">
      <div class="form-check">
        <?= $this->Form->checkbox('is_shown_in_carousel', [
          'id' => 'is-shown-in-carousel-field',
          'class' => 'form-check-input',
        ]) ?>

        <label class="form-check-label" for="is-shown-in-carousel-field">
          <?= __('カルーセルに表示') ?>
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-check">
        <?= $this->Form->checkbox('is_shown_in_gallery', [
          'id' => 'is-shown-in-gallery-field',
          'class' => 'form-check-input',
        ]) ?>

        <label class="form-check-label" for="is-shown-in-gallery-field">
          <?= __('ギャラリーに表示') ?>
        </label>
      </div>
    </div>

    <button class="btn btn-primary">
      <?= __('画像を保存する') ?>
    </button>
  <?= $this->Form->end() ?>
</div>

<div class="container py-4">
  <hr>

  <div class="row">
    <div class="col-auto">
      <a href="<?= $this->Url->build([
        'action' => 'index',
      ]) ?>" class="btn btn-outline-secondary">
        <?= __('一覧へ戻る') ?>
      </a>
    </div>
  </div>
</div>

<?php $this->append('css'); ?>
<style>
.preview {
  display: none;
}

.preview[src] {
  display: block;
  max-height: 80px;
}
</style>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", (event) => {
  const fileField = document.querySelector("#file-field");
  const preview = document.querySelector("#preview");

  fileField.addEventListener("change", (event) => {
    const file = fileField.files[0];

    if (!file) { return; }

    const fileReader = new FileReader();

    fileReader.addEventListener("load", (event) => {
      preview.src = fileReader.result;
    });

    fileReader.readAsDataURL(fileField.files[0]);
  });
});
</script>
<?php $this->end(); ?>

