<!doctype html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160052896-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-160052896-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="<?= __('小谷はり灸所') ?>">
    <meta property="og:url" content="https://kotani.page/" />
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?= __('小谷はり灸所｜４年間本場・台湾で修行をした女性鍼灸師が中国伝統の痛くない鍼灸治療をいたします。') ?>">
    <meta property="og:title" content="<?= __('小谷はり灸所') ?>">
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
      <?= __('小谷はり灸所') ?>
    </title>
  </head>

  <body>
    <?= $this->element('header/default') ?>

    <?= $this->element('navigation/default') ?>

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>


    <?= $this->element('footer/default') ?>

    <?= $this->fetch('postLink') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

