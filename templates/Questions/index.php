<h2 class="text-center">
  <?= __('よくあるご質問') ?>
</h2>

<div class="container py-4">
  <div class="form-group question-search-field-container">
    <input
        placeholder="<?= __('質問を検索') ?>"
        id="question-search-field" class="form-control question-search-field">
  </div>
</div>

<div class="container py-4">
  <p class="text-center">
    <strong>
      <?= __('現在準備中です。') ?>
    </strong>
  </p>

  <?php /*
  <div id="questions-container" class="card-columns">
    <?php foreach ($questions as $question): ?>
    <div class="card"
        data-body="<?= preg_replace(["/\n/", "/\r/"], '', $question['body']) ?>"
        data-summary="<?= preg_replace(["/\n/", "/\r/"], '', $question['summary']) ?>"
        data-answer="<?= preg_replace(["/\n/", "/\r/"], '', $question['answer']) ?>">
      <div class="card-body">
        <h5 class="card-title">
          <?= nl2br(h($question['body'])) ?>
        </h5>

        <p class="card-text">
          <?= nl2br(h($question['answer'])) ?>
        </p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  */ ?>
</div>

<div class="container py-4">
  <?= $this->Form->create($newQuestion, ['novalidate' => true, 'id' => 'question-form']) ?>
    <div class="form-group">
      <label>
        <?= __('回答が見つかりませんでしたか？ご質問は以下のフォームからお気軽にどうぞ。') ?>

        <small class="d-block">
          <?= __('（回答までにお時間をいただく場合があります。）') ?>
        </small>
      </label>

      <?= $this->Form->textarea('body', [
        'placeholder' => __('ご質問内容を入力してください。'),
        'class' => implode(' ', [
          'form-control',
          $this->Form->isFieldError('body') ? 'is-invalid' : '',
        ]),
      ]) ?>

      <div class="invalid-feedback">
        <?= $this->Form->error('body') ?>
      </div>
    </div>

    <button id="question-form-submit-button" class="btn btn-primary text-nowrap">
      <?= __('院長に質問する') ?>
    </button>
  <?= $this->Form->end() ?>
</div>

<?php $this->append('css'); ?>
<style>
.question-search-field {
  padding-right: 1em;
  padding-left: 2em;
  height: 3em;
}

.question-search-field-container {
  position: relative;
}

.question-search-field-container::before {
  content: "\f002";
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto 0 auto .75em;
  display: flex;
  align-items: center;
  height: 4.8vw;
  color: #999999;
  font-size: 4.8vw;
  font-style: normal;
  font-variant: normal;
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
}

@media (min-width: /* md */ 768px) {
  .question-search-field-container::before {
    height: 3.2vw;
    font-size: 3.2vw;
  }
}

@media (min-width: /* lg */ 992px) {
  .question-search-field-container::before {
    height: 24px;
    font-size: 24px;
  }
}
</style>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", (event) => {
  const questionsContainer = document.querySelector("#questions-container");
  const questionSearchField = document.querySelector("#question-search-field");

  questionSearchField.addEventListener("input", (event) => {
    for (const questionContainer of questionsContainer.querySelectorAll(".card")) {
      const searchText = questionSearchField.value;
      const body = questionContainer.dataset.body;
      const summary = questionContainer.dataset.summary;
      const answer = questionContainer.dataset.answer;

      if (searchText === "" || `${body}${summary}${answer}`.indexOf(searchText) >= 0) {
        questionContainer.classList.remove("d-none");

        continue;
      }

      questionContainer.classList.add("d-none");
    }
  });

  const questionForm = document.querySelector("#question-form");
  const questionFormSubmitButton = document.querySelector("#question-form-submit-button");

  questionForm.addEventListener("submit", (event) => {
    questionFormSubmitButton.disabled = true;
  });
});
</script>
<?php $this->end(); ?>

