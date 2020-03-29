<div class="container">
  <p>
    <?= __('４年間本場・台湾で修行をした女性鍼灸師が中国伝統の痛くない鍼灸治療をいたします。') ?>
  </p>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('診療時間') ?>

    <br class="d-none d-lg-inline">

    <a href="<?= $this->Url->build([
      'controller' => 'Home',
      'action' => 'access',
      '#' => 'main',
    ]) ?>">
      <small class="badge" style="font-size: 64%;">
        <?= __('More') ?>

        <i class="fas fa-chevron-right" style="font-size: 64%;"></i>
      </small>
    </a>
  </h3>

  <p class="ml-4">
    <?= implode('<br>', [
      __('午　前： 9:00 - 12:30'),
      __('午　後： 15:00 - 21:00'),
      __('休診日：木・土・日曜日および祝日'),
    ]) ?>
  </p>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('診療科目') ?>

    <br class="d-none d-lg-inline">

    <a href="<?= $this->Url->build([
      'controller' => 'Home',
      'action' => 'services',
      '#' => 'main',
    ]) ?>">
      <small class="badge" style="font-size: 64%;">
        <?= __('More') ?>

        <i class="fas fa-chevron-right" style="font-size: 64%;"></i>
      </small>
    </a>
  </h3>

  <p class="ml-4">
    <?= implode('<br>', [
      __('肩こり・捻挫・腰痛・骨折各種痛み'),
      __('生理不良・逆子治療'),
      __('自律神経失調・精神不安'),
      __('※漢方薬取り寄せできます。'),
    ]) ?>
  </p>
</div>
<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('診療費') ?>
  </h3>

  <p class="ml-4">
    <?= __('4000円（初診料 4500円）') ?>
  </p>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('所在地') ?>

    <br class="d-none d-lg-inline">

    <a href="<?= $this->Url->build([
      'controller' => 'Home',
      'action' => 'access',
      '#' => 'main',
    ]) ?>">
      <small class="badge" style="font-size: 64%;">
        <?= __('More') ?>

        <i class="fas fa-chevron-right" style="font-size: 64%;"></i>
      </small>
    </a>
  </h3>

  <p class="ml-4">
    <?= implode('<br>', [
      __('〒{0}', '599-8126'),
      __('大阪府堺市東区大美野 158-23'),
      vsprintf('<a href="%s" target="_blank">%s</a>', [
        'https://goo.gl/maps/TACKWyvRAxi3q37e9',
        __('南海北野田駅からバスで16分'),
      ]),
    ]) ?>
  </p>
</div>

<iframe class="google-map d-block w-100 border-0"
    height="300"
    sandbox="allow-scripts allow-same-origin"
    src="https://www.google.com/maps/embed/v1/place?q=日本、大阪府堺市東区大美野１５８−２３+小谷はり灸所&key=AIzaSyAq92LVBH_q56vksTJoxfFtoApIJSlhKT4"></iframe>

