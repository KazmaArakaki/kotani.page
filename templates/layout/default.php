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

    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Sawarabi+Mincho&display=swap') ?>

    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.10.0/css/all.css') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', [
      'integrity' => 'sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->element('css/default') ?>
    <?= $this->element('css/header/default') ?>
    <?= $this->element('css/footer/default') ?>
    <?= $this->fetch('css') ?>
    <title>
      <?= __('小谷はり灸所') ?>
    </title>
  </head>

  <body>
    <?= $this->element('header/default') ?>

    <?= $this->element('navigation/default') ?>

    <?= $this->Flash->render() ?>

    <main id="main" class="main">
      <?= $this->Flash->render() ?>

      <?= $this->fetch('content') ?>
    </main>

    <?= $this->element('footer/default') ?>

    <?= $this->fetch('postLink') ?>

    <?= $this->Html->script('https://code.jquery.com/jquery-3.4.1.slim.min.js', [
      'integrity' => 'sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [
      'integrity' => 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [
      'integrity' => 'sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->element('js/default') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

