<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="小谷はり灸所">
    <meta property="og:url" content="https://kotani.page/" />
    <meta property="og:type" content="website">
    <meta property="og:description" content="小谷はり灸所｜４年間本場・台湾で修行をした女性鍼灸師が中国伝統の痛くない鍼灸治療をいたします。">
    <meta property="og:title" content="小谷はり灸所">
    <meta property="og:image" content="<?= $this->Url->image('DSC00668.JPG') ?>">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="768">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?= $this->Url->image('DSC00668.JPG') ?>">
    <meta name="twitter:site" content="@KazmaArakaki">
    <meta name="twitter:creator" content="@KazmaArakaki">
    <link rel="canonical" href="https://kotani.page/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <?= $this->element('css/default') ?>
    <?= $this->fetch('css') ?>
    <title>
      小谷はり灸所
    </title>
  </head>

  <body>
    <header class="header">
      <div class="container">
        <amp-carousel class="carousel"
            type="slides" height="1024" width="1024"
            layout="responsive" sizes="(min-width: 768px) 512px, 72vw"
            autoplay delay="5000" loop>
          <div class="carousel-item" data-index="1"></div>
          <div class="carousel-item" data-index="2"></div>
          <div class="carousel-item" data-index="3"></div>
        </amp-carousel>

        <div class="header-info-container">
          <h1 class="header-info-title">
            小谷はり灸所
          </h1>

          <p class="header-info-text">
            072-237-5695

            <a href="tel:0722375695">
              [TEL]
            </a>
          </p>

          <p class="header-info-text">
            堺市東区大美野 158-23

            <a href="https://goo.gl/maps/zokENZeg2BzyzTsZ9" target="_blank">
              [MAP]
            </a>
          </p>
        </div>
      </div>
    </header>

    <nav class="navigation">
      <div class="container">
        <ul class="navigation-list">
          <li class="navigation-item">
            <a href="#opening-hours" class="navigation-action">
              診療時間
            </a>
          </li>

          <li class="navigation-item">
            <a href="#subjects" class="navigation-action">
              診療科目
            </a>
          </li>

          <li class="navigation-item">
            <a href="#billings" class="navigation-action">
              診療費
            </a>
          </li>

          <li class="navigation-item">
            <a href="#address" class="navigation-action">
              所在地
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

    <aside class="aside">
      <div class="aside-share">
        <amp-social-share type="facebook"></amp-social-share>
        <amp-social-share type="twitter"></amp-social-share>
        <amp-social-share type="line"></amp-social-share>
      </div>
    </aside>

    <footer class="footer">
      <a href="tel:0722375695" class="footer-contact">
        <i class="fas fa-mobile-alt"></i>

        お電話でのお問い合わせ
      </a>

      <div class="container">
        <p class="footer-copyright">
          <small>
            © 2019 小谷はり灸所
          </small>

          <span class="footer-copyright-logo">
            <amp-img src="<?= $this->Url->image('logo.svg') ?>" layout="fill">
          </span>
        </p>
      </div>
    </footer>

    <?= $this->fetch('postLink') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

