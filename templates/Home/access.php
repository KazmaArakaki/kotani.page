<h2 class="text-center">
  <?= __('アクセス') ?>
</h2>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('診療時間') ?>
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
    <?= __('所在地') ?>
  </h3>

  <p class="ml-4">
    <?= implode('<br>', [
      __('〒{0}', h('599-8126')),
      __('大阪府堺市東区大美野 158-23'),
    ]) ?>
  </p>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('電話番号') ?>
  </h3>

  <p class="ml-4">
    <?= h('072-237-5695') ?>
  </p>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('交通手段') ?>
  </h3>

  <ul class="list-unstyled ml-4 pl-0">
    <li class="mb-4">
      <?= implode('<br>', [
        __('南海電鉄高野線 北野田駅からバスで15分'),
        implode('<br>', [
          vsprintf('<a href="%s" target="_blank"><small><i class="fas fa-external-link-alt"></i>%s</small></a>', [
            'https://www.jorudan.co.jp/norikae/cgi/nori.cgi?eki2=%E5%8C%97%E9%87%8E%E7%94%B0',
            __('北野田駅までのの乗換を検索する'),
          ]),
          vsprintf('<a href="%s" target="_blank"><small><i class="fas fa-external-link-alt"></i>%s</small></a>', [
            'https://goo.gl/maps/exe2YbH73cHicK6p9',
            __('北野田駅からの経路をGoogle Mapで見る'),
          ]),
        ]),
      ]) ?>
    </li>

    <li class="mb-4">
      <?= implode('<br>', [
        __('大阪メトロ御堂筋線 なかもず駅からバスで23分'),
        implode('<br>', [
          vsprintf('<a href="%s" target="_blank"><small><i class="fas fa-external-link-alt"></i>%s</small></a>', [
            'https://www.jorudan.co.jp/norikae/cgi/nori.cgi?eki2=%E3%81%AA%E3%81%8B%E3%82%82%E3%81%9A',
            __('なかもず駅までのの乗換を検索する'),
          ]),
          vsprintf('<a href="%s" target="_blank"><small><i class="fas fa-external-link-alt"></i>%s</small></a>', [
            'https://goo.gl/maps/TJck5fbPENTDbzPP9',
            __('なかもず駅からの経路をGoogle Mapで見る'),
          ]),
        ]),
      ]) ?>
    </li>

    <li class="mb-0">
      <?= implode('<br>', [
        __('南海バス北野田線 西口園バス停から徒歩2分'),
        implode('<br>', [
          vsprintf('<a href="%s" target="_blank"><small><i class="fas fa-external-link-alt"></i>%s</small></a>', [
            'https://www.navitime.co.jp/diagram/bus/00408777/00067809/0/',
            __('西口園バス停の時刻表をNAVITIMEで見る'),
          ]),
        ]),
      ]) ?>
    </li>
  </ul>
</div>

<div class="container py-4 d-lg-flex">
  <h3>
    <?= __('地図') ?>
  </h3>

  <div class="mb-2 ml-4 flex-fill">
    <a href="<?= $this->Url->image('map.png') ?>" class="d-block lightbox">
      <img src="<?= $this->Url->image('map.png') ?>" class="img-fluid rounded">
    </a>

    <a href="https://goo.gl/maps/Nfm3Zag8DAeRp5ng9" target="_blank" class="d-block">
      <small>
        <i class="fas fa-external-link-alt"></i>

        <?= __('周辺地図をGoogle Mapで見る') ?>
      </small>
    </a>
  </div>
</div>

