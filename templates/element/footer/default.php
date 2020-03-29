<?php
use Cake\I18n\Time;
?>

<footer class="footer py-4">
  <div class="container">
    <nav class="py-4 text-right">
      <ul class="list-unstyled ml-lg-auto">
        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Home',
            'action' => 'access',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('診療時間') ?>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Home',
            'action' => 'services',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('診療科目') ?>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Home',
            'action' => 'billing',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('診療費') ?>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Home',
            'action' => 'access',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('所在地') ?>

            <small class="d-block">
              <?= h('大阪府堺市東区大美野 158-23') ?>
            </small>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="tel:0722375695" class="text-reset">
            <?= __('お電話での問い合わせ') ?>

            <small class="d-block">
              <?= h('072-237-5695') ?>
            </small>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Home',
            'action' => 'hello',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('院長あいさつ') ?>
          </a>
        </li>

        <li class="mb-2 mb-md-4">
          <a href="<?= $this->Url->build([
            'controller' => 'Questions',
            'action' => 'index',
            '#' => 'main',
          ]) ?>" class="text-reset">
            <?= __('よくあるご質問') ?>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <p class="d-flex align-items-center justify-content-center">
      <a href="<?= $this->Url->build([
        'prefix' => 'Admin',
        'controller'=> 'Home',
        'action' => 'index',
      ]) ?>" class="text-reset text-nowrap">
        <small class="footer-copyright">
          <?= __('© {0} 小谷はり灸所', Time::now()->i18nFormat('yyyy')) ?>
        </small>

        <img src="<?= $this->Url->image('logo.svg') ?>"
            width="10" height="10"
            class="ml-2"
            style="width: auto; height: 1em;">
      </a>
    </p>
  </div>
</footer>

