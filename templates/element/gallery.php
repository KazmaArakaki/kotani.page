<?php
$imageSources = [
  $this->Url->image('DSC00666.JPG'),
  $this->Url->image('DSC00668.JPG'),
  $this->Url->image('DSC00671.JPG'),
];
?>

<div class="container-fluid pt-4 pb-3 px-0" style="background-color: #352e23;">
  <div id="carousel">
    <?php foreach ($imageSources as $imageSource): ?>
    <div style="height: 8em; overflow: hidden;">
      <img src="<?= $imageSource ?>"
          class="d-block rounded mx-2"
          style="height: 100%;">
    </div>
    <?php endforeach; ?>
  </div>
</div>

