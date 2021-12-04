<?php $this->append('pageContent'); ?>
<div>
  <?= $this->element('header') ?>

  <?= $this->fetch('content') ?>

  <?= $this->element('footer') ?>
</div>
<?php $this->end(); ?>

<!DOCTYPE html>
<html>
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160052896-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-160052896-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">

    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="<?= __('小谷はり灸所') ?>">
    <meta property="og:url" content="<?= $this->Url->build(['?' => false], ['fullBase' => true]) ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?= __('中国伝統の痛くない鍼灸治療は小谷はり灸所。小児はり、各種痛み、不安、漢方薬') ?>">
    <meta property="og:title" content="<?= __('小谷はり灸所') ?>">
    <meta property="og:image" content="<?= $this->Url->image('ogp.20211027.jpg') ?>">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="768">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?= $this->Url->image('ogp.20211027.jpg') ?>">
    <link rel="canonical" href="<?= $this->Url->build(['?' => false], ['fullBase' => true]) ?>">

    <title>
      <?= __('小谷はり灸所') ?>
    </title>

    <?= $this->fetch('meta') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@400;600;800&display=swap">

    <style>
    body {
      margin: 0;
      color: #333333;
      font-family: "Shippori Mincho B1", serif;
      animation: fade-in 3s;
    }

    h1, h2, h3, h4, h5, h6 {
      margin: 0;
    }

    p {
      margin: 0;
      line-height: 1.6;
    }

    button {
      padding: 0;
      height: auto;
      border: none;
      background: transparent;
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }
    </style>

    <?= $this->fetch('css') ?>

    <?= $this->fetch('component') ?>

    <script type="application/ld+json">
      {
        "@id": "https://kotani.page/",
        "@context": "https://schema.org",
        "@type": "MedicalClinic",
        "url": "https://kotani.page/",
        "name": "<?= __('小谷はり灸所') ?>",
        "description": "<?= __('小谷はり灸所｜４年間本場・台湾で修行をした女性鍼灸師が中国伝統の痛くない鍼灸治療をいたします。') ?>",
        "telephone": "+81722375695",
        "priceRange": "<?= __('4000円（初診料 4500円)') ?>",
        "address": {
          "@type": "PostalAddress",
          "addressCountry": "JP",
          "postalCode": "599-8126",
          "addressRegion": "<?= __('大阪府堺市') ?>",
          "addressLocality": "<?= __('東区') ?>",
          "streetAddress": "<?= __('大美野 158-23') ?>"
        },
        "hasMap": "https://goo.gl/maps/zokENZeg2BzyzTsZ9",
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 34.530760,
          "longitude": 135.525911
        },
        "openingHours": [
          "Mo,Tu,We,Fr 09:00-12:30",
          "Mo,Tu,We,Fr 15:00-21:00"
        ],
        "currenciesAccepted": "JPY",
        "paymentAccepted": "Cash",
        "image": [
          "https://kotani.page/assets/images/DSC00666.JPG",
          "https://kotani.page/assets/images/DSC00668.JPG",
          "https://kotani.page/assets/images/DSC00671.JPG"
        ]
      }
    </script>
  </head>

  <body>
    <?= $this->fetch('pageContent') ?>

    <?= $this->fetch('modal') ?>

    <?= $this->fetch('postLink') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

