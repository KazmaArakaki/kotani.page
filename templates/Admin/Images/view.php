<div class="container py-4">
  <h2>
    <?= h($image['name']) ?>
  </h2>

  <div class="card mb-4">
    <img src="<?= $image->getUrl() ?>" class="card-img-top">
  </div>

  <h3>
    <?= __('説明') ?>
  </h3>

  <p>
    <?= nl2br(h($image['description'])) ?>
  </p>

  <h3>
    <?= __('表示') ?>
  </h3>

  <ul>
    <?php if ($image['is_shown_in_carousel']): ?>
    <li>
      <?= __('カルーセル') ?>
    </li>
    <?php endif; ?>

    <?php if ($image['is_shown_in_gallery']): ?>
    <li>
      <?= __('ギャラリー') ?>
    </li>
    <?php endif; ?>
  </ul>
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

