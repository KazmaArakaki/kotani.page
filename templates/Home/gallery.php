<?php
$imageSources = [
  $this->Url->image('DSC00666.JPG'),
  $this->Url->image('DSC00668.JPG'),
  $this->Url->image('DSC00671.JPG'),
];
?>

<h2 class="text-center">
  <?= __('ギャラリー') ?>
</h2>

<div class="container py-4">
  <div class="card-columns">
    <?php foreach ($imageSources as $imageSource): ?>
    <div class="card">
      <img src="<?= $imageSource ?>" class="card-img-top">
    </div>
    <?php endforeach; ?>
  </div>
</div>

