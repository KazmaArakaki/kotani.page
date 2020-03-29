<div class="container">
  <p class="main-headline">
    <?= __('４年間本場・台湾で修行をした女性鍼灸師が中国伝統の痛くない鍼灸治療をいたします。') ?>
  </p>
</div>

<section id="opening-hours">
  <div class="container">
    <h1>
      <?= __('診療時間') ?>
    </h1>

    <p>
      <?= implode('<br>', [
        __('午　前： 9:00 - 12:30'),
        __('午　後： 15:00 - 21:00'),
        __('休診日：木・土・日曜日および祝日'),
      ]) ?>
    </p>
  </div>
</section>

<section id="subjects">
  <div class="container">
    <h1>
      <?= __('診療科目') ?>
    </h1>

    <p>
      <?= implode('<br>', [
        __('肩こり・捻挫・腰痛・骨折各種痛み'),
        __('生理不良・逆子治療'),
        __('自律神経失調・精神不安'),
        __('※漢方薬取り寄せできます。'),
      ]) ?>
    </p>
  </div>
</section>

<section id="billings">
  <div class="container">
    <h1>
      <?= __('診療費') ?>
    </h1>

    <p>
      <?= __('4000円（初診料 4500円）') ?>
    </p>
  </div>
</section>

<section id="address">
  <div class="container">
    <h1>
      <?= __('所在地') ?>
    </h1>

    <p>
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
</section>

