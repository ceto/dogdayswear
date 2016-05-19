<?php
/**
 * Template Name: Home Page Template
 */
?>
<header class="hero hero--home" role="banner" data-magellan data-threshold="0">
  <div class="row container">
    <div class="columns medium-10 medium-centered large-centered large-10 xlarge-8 xxlarge-6">
      <div class="hero__content">
          <h1 class="hero__title">Jóga és sportruházat a legizzasztóbb mozgásformákhoz.</h1>
          <a href="<?= get_permalink( woocommerce_get_page_id( 'shop' ) )?>" class="hero__more button">Vásárlás</a>
      </div>
    </div>
  </div>
</header>

<main id="main" class="main" role="main" data-magellan-target="main">

  <section class="ps inverseblock">
    <div class="row container">
      <div class="columns medium-4 large-4">
        <img class="slog2" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/slogan_2line.svg" alt="Don't fear the sweat">
      </div>
      <div class="columns medium-8 large-8">
          <div class="imadunk"><?= apply_filters('the_content', get_post_meta( get_the_ID(), 'home_dontfear', TRUE ) ); ?></div>
      </div>
    </div>
  </section>


  <section class="featblock">
    <div class="row container">
      <div class="columns medium-4 large-6">
        <figure class="featblock__ill">
          <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/reszlet.jpg" alt="Jógapóz DogDays cuccban">
          <a class="yt-start popup-youtube" href="https://www.youtube.com/watch?v=HYqMix5gbYs"><i class="icon icon--play"></i></a>
        </figure>
      </div>
      <div class="columns medium-8 medium-pull-4 large-6 large-pull-6">
        <div class="featblock__text">
          <div class="featblock__text__inner">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('templates/block', 'featprods' ); ?>

  <section class="ps grayblock looksec">
    <div class="row container">
      <div class="columns medium-6 medium-centered text-center">
        <h2 class="blocktitle">Galéria</h2>
          <p class="lead">Mozogj szabadon és magabiztosan, hogy csak magadra koncentrálhass!</p>
          <br>
      </div>
    </div>
    <div class="row container thelookbook">
      <div class="columns">

        <div class="lookbookgrid">
          <div class="grid-sizer"></div>
          <?php
            $gitems = get_post_meta( get_the_ID(), 'home_gallery', TRUE );
            foreach ( (array) $gitems as $attachment_id => $attachment_url ) : ?>
            <?php $targetimg = wp_get_attachment_image_src( $attachment_id, 'full' ) ?>

            <div class="grid-item">
              <a href="<?= $targetimg[0]; ?>">
                <?= wp_get_attachment_image( $attachment_id, 'shop_single' ) ?>
              </a>
            </div>
            <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>






  <section class="featblock featblock--taska ainverseblock">
    <div class="row container">
      <div class="columns medium-4 large-6">
        <figure class="featblock__ill">
          <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/taska.jpg" alt="Vásárlás">
        </figure>
      </div>
      <div class="columns medium-8 medium-pull-4 large-6 large-pull-6">
        <div class="featblock__text">
          <div class="featblock__text__inner">
            <?= apply_filters('the_content', get_post_meta( get_the_ID(), 'home_showroom', TRUE ) ); ?>
          </div>
        </div>
      </div>
    </div>
  </section>


</main>
