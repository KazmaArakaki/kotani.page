<h2 class="text-center">
  <?= __('ギャラリー') ?>
</h2>

<div class="container py-4">
  <div class="card-columns">
    <?php foreach ($images as $image): ?>
    <a href="<?= $image->getUrl() ?>" class="card text-reset text-decoration-none lightbox">
      <img src="<?= $image->getUrl() ?>" class="card-img-top">

      <div class="card-body">
        <p class="card-text" style="font-size: 16px;">
          <?= nl2br(h($image['description'])) ?>
        </p>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</div>

