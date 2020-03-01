<style amp-custom>
  :root {
    --white: #ffffff;
    --lightGray: #cccccc;
    --gray: #999999;
    --darkGray: #666666;
    --black: #333333;
    --beige: #fff4e6;
    --lightBrown: #948a7d;
    --brown: #635A4E;
    --darkBrown: #352e23;
    --tablet: 768px;
    --mobile-l: 425px;
    --mobile-m: 375px;
    --mobile-s: 320px;
  }

  html {
    background-color: var(--beige, #fff4e6);
    color: var(--darkBrown, #352e23);
    font-size: 4vw;
    font-weight: 400;
    font-family: "Sawarabi Mincho", serif;
  }

  body {
    font-size: 150%;
  }

  @media (min-width: /* tablet */ 768px) {
    body {
      font-size: 32px;
    }
  }

  .container {
    position: relative;
    margin: 0 auto;
    max-width: var(--tablet, 768px);
  }

  .header {
    position: relative;
  }

  .carousel {
    margin-left: auto;
  }

  .amp-carousel-button {
    display: none;
  }

  .carousel-item {
    background-position: center;
    background-size: cover;
  }

  .carousel-item[data-index="1"] {
    background-image: url("<?= $this->Url->image('DSC00666.JPG') ?>");
  }

  .carousel-item[data-index="2"] {
    background-image: url("<?= $this->Url->image('DSC00668.JPG') ?>");
  }

  .carousel-item[data-index="3"] {
    background-image: url("<?= $this->Url->image('DSC00671.JPG') ?>");
  }

  .header-info-container {
    position: absolute;
    bottom: 1rem;
    left: 1rem;
    text-align: right;
    text-shadow: -2px -2px 4px var(--beige, #fff4e6), 0px -2px 4px var(--beige, #fff4e6), 2px -2px 4px var(--beige, #fff4e6), -2px 0px 4px var(--beige, #fff4e6), 0px 0px 4px var(--beige, #fff4e6), 2px 0px 4px var(--beige, #fff4e6), -2px 2px 4px var(--beige, #fff4e6), 0px 2px 4px var(--beige, #fff4e6), 2px 2px 4px var(--beige, #fff4e6);
  }

  .header-info-title {
    margin: 0;
    font-size: 1.5em;
  }

  .header-info-text {
    margin: 0;
    font-size: 1em;
  }

  .navigation {
    background-color: var(--darkBrown, #352e23);
  }

  .navigation-list {
    display: flex;
    margin: 0;
    padding: 0;
  }

  .navigation-item {
    display: block;
  }

  .navigation-action {
    display: block;
    padding: .5rem 1rem;
    color: var(--beige, #fff4e6);
    text-decoration: none;
    font-size: .8em;
  }

  @media (min-width: /* tablet */ 768px) {
    .navigation-action {
      padding: .5rem;
    }
  }

  .main {
  }

  .main-headline {
    margin: 1rem 0 1rem;
    padding: 0 1rem;
  }

  .main section h1 {
    margin: 2rem 0 1rem;
    padding: 0 1rem;
  }

  .main section p {
    margin: 1rem 0 1rem;
    padding: 0 1rem;
  }

  .google-map {
    width: 100%;
    height: 100vw;
  }

  @media (min-width: /* tablet */ 768px) {
    .google-map {
      height: 10rem;
    }
  }

  .aside {
  }

  .aside-share {
    display: flex;
  }

  .aside-share amp-social-share {
    flex: 1;
  }

  .footer {
    padding-bottom: 2rem;
    background-color: var(--darkBrown, #352e23);
  }

  .footer-contact {
    display: block;
    padding: 1rem;
    color: var(--beige, #fff4e6);
    text-align: center;
  }

  .footer-copyright {
    margin: 0;
    padding: 1rem;
    color: var(--beige, #fff4e6);
    text-align: center;
  }

  .footer-copyright-logo {
    position: relative;
    display: inline-block;
    margin-bottom: -2px;
    width: .8em;
    height: .8em;
  }
</style>

