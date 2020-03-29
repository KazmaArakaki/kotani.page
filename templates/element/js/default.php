<script>
(() => {
  const adjustHeadingsWidth = (event) => {
    const headings = document.querySelectorAll(".main h3");

    let headingWidth = 0;

    for (const heading of headings) {
      const width = Number.parseInt(getComputedStyle(heading).width);

      if (width > headingWidth) {
        headingWidth = width;
      }
    }

    for (const heading of headings) {
      heading.style.width = `${headingWidth}px`;
    }
  };

  window.addEventListener("resize", adjustHeadingsWidth);
  window.addEventListener("load", adjustHeadingsWidth);
})();
</script>

