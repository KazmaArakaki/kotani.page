<?php
use Cake\I18n\Time;
?>
<footer class="footer">
  <a href="tel:0722375695" class="footer-contact">
    <i class="fas fa-mobile-alt"></i>

    お電話でのお問い合わせ
  </a>

  <div class="container">
    <p class="d-flex align-items-center justify-content-center">
      <small class="footer-copyright">
        <?= __('© {0} 小谷はり灸所', Time::now()->i18nFormat('yyyy')) ?>
      </small>

      <img src="<?= $this->Url->image('logo.svg') ?>"
          width="10" height="10"
          class="ml-2"
          style="width: auto; height: 1em;">
    </p>
  </div>
</footer>

