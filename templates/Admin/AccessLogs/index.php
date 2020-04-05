<?php
$dayOfMonth = null;
?>
<div class="container pt-4">
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">
            <?= __('絞り込み') ?>
          </a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <?= $this->Form->create($form, ['novalidate' => true, 'type' => 'get']) ?>
        <div class="form-row">
          <div class="col-sm mb-2">
            <label>
              <?= __('セッションID') ?>
            </label>

            <?= $this->Form->text('session_id', [
              'placeholder' => __('セッションID'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>

          <div class="col-sm mb-2">
            <label>
              <?= __('パス') ?>
            </label>

            <?= $this->Form->text('path', [
              'placeholder' => __('パス'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>
        </div>

        <div class="form-row">
          <div class="col-sm mb-2">
            <label>
              <?= __('ユーザーエージェント') ?>
            </label>

            <?= $this->Form->text('user_agent', [
              'placeholder' => __('ユーザーエージェント'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>

          <div class="col-sm mb-2">
            <label>
              <?= __('IPアドレス') ?>
            </label>

            <?= $this->Form->text('ip_address', [
              'placeholder' => __('IPアドレス'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>
        </div>

        <div class="form-row">
          <div class="col-sm mb-2">
            <label>
              <?= __('日時〜') ?>
            </label>

            <?= $this->Form->date('created_from', [
              'placeholder' => __('Created From'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>

          <div class="col-sm mb-2">
            <label>
              <?= __('〜日時') ?>
            </label>

            <?= $this->Form->date('created_to', [
              'placeholder' => __('Created To'),
              'class' => 'form-control form-control-sm',
            ]) ?>
          </div>
        </div>

        <div class="form-row justify-content-end">
          <div class="col-auto">
            <button class="btn btn-primary btn-sm">
              <?= __('絞り込む') ?>
            </button>
          </div>
        </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>

<div class="container py-4">
  <p class="text-right">
    <?= __('件数：{0}', $accessLogsCount) ?>
  </p>

  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <th style="width: 128px;">
          <?= __('日時') ?>
        </th>

        <th>
          <?= __('Access Log') ?>
        </th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($accessLogs as $accessLog): ?>
      <?php if ($dayOfMonth !== $accessLog['created']->i18nFormat('yyyy/MM/dd', 'Asia/Tokyo')): ?>
      <tr class="bg-light">
        <td colspan="2">
          <?= $accessLog['created']->i18nformat('yyyy/MM/dd', 'Asia/Tokyo') ?>
        </td>
      </tr>
      <?php $dayOfMonth = $accessLog['created']->i18nformat('yyyy/MM/dd', 'Asia/Tokyo'); ?>
      <?php endif; ?>

      <tr>
        <td>
          <?= $accessLog['created']->i18nFormat('HH:mm:ss', 'Asia/Tokyo') ?>
        </td>

        <td>
          <dl class="row mb-0 access-log-content-container">
            <dt class="col-sm-2">
              <?= __('Path') ?>
            </dt>

            <dd class="col-sm-10 mb-0">
              <?= h($accessLog['path']) ?>
            </dd>

            <dt class="col-sm-2">
              <?= __('Session Id') ?>
            </dt>

            <dd class="col-sm-10 mb-0">
              <?= h($accessLog['session_id']) ?>
            </dd>

            <dt class="col-sm-2">
              <?= __('User Agent') ?>
            </dt>

            <dd class="col-sm-10 mb-0">
              <?= h($accessLog['user_agent']) ?>
            </dd>

            <dt class="col-sm-2">
              <?= __('IP Address') ?>
            </dt>

            <dd class="col-sm-10 mb-0">
              <?= h($accessLog['ip_address']) ?>
            </dd>
          </dl>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <ul class="pagination">
    <?= $this->Paginator->first('«') ?>

    <?= $this->Paginator->numbers() ?>

    <?= $this->Paginator->last('»') ?>
  </ul>
</div>

<?php $this->append('css'); ?>
<style>
.access-log-content-container {
  max-height: 1.5em;
  overflow: hidden;
  transition-duration: 0.5s;
}

.access-log-content-container.expanded {
  max-height: none;
}
</style>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", (event) => {
  const accessLogContentContainers = document.querySelectorAll(".access-log-content-container");

  for (const accessLogContentContainer of accessLogContentContainers) {
    accessLogContentContainer.addEventListener("click", (event) => {
      event.currentTarget.classList.toggle("expanded");
    });
  }
});
</script>
<?php $this->end(); ?>

