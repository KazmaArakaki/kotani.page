<style>
.header {
  /* background-color: #352e23; */
  background-color: #fff4e6;
  background-image: url(<?= $this->Url->image('logo.svg') ?>);
  background-size: contain;
  background-position: bottom left;
  background-repeat: repeat-y;
}

.header h1,
.header li {
  text-shadow: <?= implode(', ', [
    '-2px -2px 4px #fff4e6',
    '0px -2px 4px #fff4e6',
    '2px -2px 4px #fff4e6',
    '-2px 0px 4px #fff4e6',
    '0px 0px 4px #fff4e6',
    '2px 0px 4px #fff4e6',
    '-2px 2px 4px #fff4e6',
    '0px 2px 4px #fff4e6',
    '2px 2px 4px #fff4e6',
  ]) ?>;
}

.header h1 {
  font-size: 8vw;
}

.header li {
  font-size: 4vw;
}

@media (min-width: /* md */ 768px) {
  .header h1 {
    font-size: 6.4vw;
  }

  .header li {
    font-size: 3.2vw;
  }
}

@media (min-width: /* lg */ 992px) {
  .header {
    background-size: 50vw 50vw;
    background-repeat: no-repeat;
    background-position: center right;
  }

  .header h1 {
    margin-top: 2em;
    margin-bottom: 2em;
    font-size: 64px;
  }

  .header li {
    font-size: 24px;
  }
}
</style>

