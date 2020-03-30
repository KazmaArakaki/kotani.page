<div class="container-fluid pt-4 pb-3 px-0" style="background-color: #352e23;">
  <div id="carousel"></div>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const carousel = document.querySelector("#carousel");

  $(carousel).slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    centerMode: true,
    infinite: true,
    slidesToShow: 1,
    speed: 300,
    variableWidth: true
  });

  const response = await fetch("<?= $this->Url->build([
    'prefix' => 'Api',
    'controller' => 'Images',
    'action' => 'index',
    '_ext' => 'json',
    '?' => [
      'type' => 'carousel',
    ],
  ]) ?>");

  const responseData = await response.json();

  if (!responseData.success) { return; }

  for (const image of responseData.data.images) {
    const img = document.createElement("img");

    img.src = image.url;
    img.className = "d-block rounded mx-2";
    img.style.height = "100%";

    const div = document.createElement("div");

    div.style.height = "8em";
    div.style.overflow = "hidden";

    div.appendChild(img);

    $(carousel).slick("slickAdd", div);
  }
});
</script>
<?php $this->end(); ?>

