<?php
$dayOfMonth = null;
?>
<div class="container pt-4">
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a href="#tab-content-blank" class="nav-link active" data-toggle="tab">
            <i class="fas fa-compress-arrows-alt"></i>
          </a>
        </li>

        <li class="nav-item">
          <a href="#tab-content-filter" class="nav-link" data-toggle="tab">
            <?= __('絞り込み') ?>
          </a>
        </li>

        <li class="nav-item">
          <a href="#tab-content-excludes" class="nav-link" data-toggle="tab">
            <?= __('除外対象') ?>
          </a>
        </li>
      </ul>
    </div>

    <div class="card-body tab-content">
      <div id="tab-content-blank" class="tab-pane fade show active"></div>

      <div id="tab-content-filter" class="tab-pane fade">
        <?= $this->Form->create($form, ['novalidate' => true, 'type' => 'get']) ?>
          <div class="form-row">
            <div class="form-group col-sm">
              <label>
                <?= __('Session ID') ?>
              </label>

              <?= $this->Form->text('session_id', [
                'placeholder' => __('セッションID'),
                'class' => 'form-control form-control-sm',
              ]) ?>
            </div>

            <div class="form-group col-sm">
              <label>
                <?= __('Path') ?>
              </label>

              <?= $this->Form->text('path', [
                'placeholder' => __('パス'),
                'class' => 'form-control form-control-sm',
              ]) ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm">
              <label>
                <?= __('User Agent') ?>
              </label>

              <?= $this->Form->text('user_agent', [
                'placeholder' => __('ユーザーエージェント'),
                'class' => 'form-control form-control-sm',
              ]) ?>
            </div>

            <div class="form-group col-sm">
              <label>
                <?= __('IP Address') ?>
              </label>

              <?= $this->Form->text('ip_address', [
                'placeholder' => __('IPアドレス'),
                'class' => 'form-control form-control-sm',
              ]) ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm">
              <label>
                <?= __('Access Date (from)') ?>
              </label>

              <?= $this->Form->date('created_from', [
                'placeholder' => __('Created From'),
                'class' => 'form-control form-control-sm',
              ]) ?>
            </div>

            <div class="form-group col-sm">
              <label>
                <?= __('Access Date (to)') ?>
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

      <div id="tab-content-excludes" class="tab-pane fade">
        <div>
          <label>
            <?= __('Session ID') ?>
          </label>

          <?php foreach ($accessLogExcludes as $accessLogExclude): ?>
          <?php if (empty($accessLogExclude['session_id'])) { continue; } ?>
          <div class="form-row">
            <div class="form-group col">
              <?= $this->Form->text('session_id', [
                'placeholder' => __('セッションID'),
                'class' => 'form-control form-control-sm',
                'value' => $accessLogExclude['session_id'],
              ]) ?>
            </div>

            <div class="form-group col-auto">
              <?php
              if ($accessLogExclude['is_active']) {
                echo $this->Form->postLink(__('無効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => false,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-danger',
                ]);
              } else {
                echo $this->Form->postLink(__('有効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => true,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-secondary',
                ]);
              }
              ?>
            </div>

            <div class="form-group col-auto">
              <?= $this->Form->postLink(__('削除する'), [
                'controller' => 'AccessLogExcludes',
                'action' => 'delete',
                $accessLogExclude['id'],
              ], [
                'method' => 'delete',
                'block' => true,
                'class' => 'btn btn-sm btn-danger',
              ]) ?>
            </div>
          </div>
          <?php endforeach; ?>

          <?= $this->Form->create($form, [
            'url' => [
              'controller' => 'AccessLogExcludes',
              'action' => 'create',
            ],
            'novalidate' => true,
          ]) ?>
            <div class="form-row">
              <div class="form-group col">
                <?= $this->Form->text('session_id', [
                  'placeholder' => __('セッションID'),
                  'class' => 'form-control form-control-sm',
                ]) ?>
              </div>

              <div class="form-group col-auto">
                <button class="btn btn-sm btn-primary">
                  <?= __('追加する') ?>
                </button>
              </div>
            </div>
          <?= $this->Form->end() ?>
        </div>

        <div>
          <label>
            <?= __('User Agent') ?>
          </label>

          <?php foreach ($accessLogExcludes as $accessLogExclude): ?>
          <?php if (empty($accessLogExclude['user_agent'])) { continue; } ?>
          <div class="form-row">
            <div class="form-group col">
              <?= $this->Form->text('user_agent', [
                'placeholder' => __('ユーザーエージェント'),
                'class' => 'form-control form-control-sm',
                'value' => $accessLogExclude['user_agent'],
              ]) ?>
            </div>

            <div class="form-group col-auto">
              <?php
              if ($accessLogExclude['is_active']) {
                echo $this->Form->postLink(__('無効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => false,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-danger',
                ]);
              } else {
                echo $this->Form->postLink(__('有効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => true,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-secondary',
                ]);
              }
              ?>
            </div>

            <div class="form-group col-auto">
              <?= $this->Form->postLink(__('削除する'), [
                'controller' => 'AccessLogExcludes',
                'action' => 'delete',
                $accessLogExclude['id'],
              ], [
                'method' => 'delete',
                'block' => true,
                'class' => 'btn btn-sm btn-danger',
              ]) ?>
            </div>
          </div>
          <?php endforeach; ?>

          <?= $this->Form->create($form, [
            'url' => [
              'controller' => 'AccessLogExcludes',
              'action' => 'create',
            ],
            'novalidate' => true,
          ]) ?>
            <div class="form-row">
              <div class="form-group col">
                <?= $this->Form->text('user_agent', [
                  'placeholder' => __('ユーザーエージェント'),
                  'class' => 'form-control form-control-sm',
                ]) ?>
              </div>

              <div class="form-group col-auto">
                <button class="btn btn-sm btn-primary">
                  <?= __('追加する') ?>
                </button>
              </div>
            </div>
          <?= $this->Form->end() ?>
        </div>

        <div>
          <label>
            <?= __('IP Address') ?>
          </label>

          <?php foreach ($accessLogExcludes as $accessLogExclude): ?>
          <?php if (empty($accessLogExclude['ip_address'])) { continue; } ?>
          <div class="form-row">
            <div class="form-group col">
              <?= $this->Form->text('ip_address', [
                'placeholder' => __('IPアドレス'),
                'class' => 'form-control form-control-sm',
                'value' => $accessLogExclude['ip_address'],
              ]) ?>
            </div>

            <div class="form-group col-auto">
              <?php
              if ($accessLogExclude['is_active']) {
                echo $this->Form->postLink(__('無効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => false,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-danger',
                ]);
              } else {
                echo $this->Form->postLink(__('有効にする'), [
                  'controller' => 'AccessLogExcludes',
                  'action' => 'edit',
                  $accessLogExclude['id'],
                ], [
                  'method' => 'put',
                  'data' => [
                    'is_active' => true,
                  ],
                  'block' => true,
                  'class' => 'btn btn-sm btn-outline-secondary',
                ]);
              }
              ?>
            </div>

            <div class="form-group col-auto">
              <?= $this->Form->postLink(__('削除する'), [
                'controller' => 'AccessLogExcludes',
                'action' => 'delete',
                $accessLogExclude['id'],
              ], [
                'method' => 'delete',
                'block' => true,
                'class' => 'btn btn-sm btn-danger',
              ]) ?>
            </div>
          </div>
          <?php endforeach; ?>

          <?= $this->Form->create($form, [
            'url' => [
              'controller' => 'AccessLogExcludes',
              'action' => 'create',
            ],
            'novalidate' => true,
          ]) ?>
            <div class="form-row">
              <div class="form-group col">
                <?= $this->Form->text('ip_address', [
                  'placeholder' => __('IPアドレス'),
                  'class' => 'form-control form-control-sm',
                ]) ?>
              </div>

              <div class="form-group col-auto">
                <button class="btn btn-sm btn-primary">
                  <?= __('追加する') ?>
                </button>
              </div>
            </div>
          <?= $this->Form->end() ?>
        </div>
      </div>
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
          <?= __('Datetime') ?>
        </th>

        <th>
          <?= __('Log Detail') ?>
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
              <?= __('Session ID') ?>
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

            <dt class="col-sm-2">
              <?= __('Referer') ?>
            </dt>

            <dd class="col-sm-10 mb-0">
              <?= h($accessLog['referer']) ?>
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

