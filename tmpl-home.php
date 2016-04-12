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
          <a href="#main" class="hero__more button">Mi a DogDays Yogawear</a>
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
          <p class="imadunk">Mi, a DogDays megálmodói, imádunk melegben jógázni, sportolni és nem ijeszt meg minket, ha csatakokban folyik rólunk a verejték. Hosszú évek gyakorlása alatt, kitapasztaltuk, milyen a tökéletes jóga, illetve sportruházat és ezt, gondos tervezgetés után, meg is alkottuk számotokra. Ruháink külföldi, prémium anyagokból, Magyarországon készülnek.
          </p>
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
            <h3>Ruháink nem látszanak át</h3>
            <p>Izzasztó mozgásformáknál előfordul, hogy ruhánk csurom vizes lesz és átlátszóvá válhat. Anyagaink kiválasztásánál kölön hangsúlyt fektettünk arra, hogy ez ne fordulhasson elő.</p>
            <h3>Nem áll el a testedtől</h3>
            <p>A légáteresztő, elasztikus anyagokbó́l készült ruháink nedvesség hatására sem veszítik el formájukat, nem nehezednek a testedre, így biztosítva a szabad mozgásteret.</p>
            <h3>Különleges forma és mintázat</h3>
            <p>Nincs szebb, mint az emberi test, ezért igyekszünk belőle minél többet ízlésesen szabadon hagyni. Emellett, egyedi tervezésű mintákkal tesszük még különlegesebbé darabjainkat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="home__featprodsblock">
    <div class="row container fullwidth">
      <div class="columns">
        <div class="featprod owl-carousel">
          <?php
            $args = array(
              'before_widget' => '',
              'after_widget' => '',
            );
            $wcargs =array (
              'show' => 'featured',
              'number' => '6',
            );
            the_widget('WC_Widget_Products', $wcargs, $args);
           ?>
        </div>
      </div>
    </div>
  </section>

  <section class="ps grayblock looksec">
    <div class="row container">
      <div class="columns medium-6 medium-centered text-center">
        <h2 class="blocktitle">Galéria</h2>
          <p class="lead">Mozogj szabadon és magabiztosan hogy csak magadra koncentrálhass</p>
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
                <?= wp_get_attachment_image( $attachment_id, 'freemedium' ) ?>
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
            <h2>Megvásárolható</h2>
            <p>Hamarosan indul webáruházunk. Addig látogass el személyesen bemutatótermünkbe, ahol felpróbálhatod és megveheted ruháinkat</p>
            <h4>Bikram Jóga Központ Astoria</h4>
            <p>1075 Budapest,<br>Károly körút. 1.<br>
            Telefon: <a href="tel:+36205954060">+36 20 595 4060</a><br>
            Email: <a href="mailto:hello@dogdayswear.com">hello@dogdayswear.com</a></p>
            <p><small><em><a class="popup-gmaps" href="https://maps.google.com/maps?q=Károly+körút 1,+Budapest,+Magyarország&amp;hl=hu&amp;t=v&amp;hnear=Károly+körút 1,+Budapest,+Magyarország">Mutasd a térképen &raquo;</a></em></small></p>
            <h5>Nyitvatartás</h5>
            <p>Hétköznap 16:30-21:00</p>
          </div>
        </div>
      </div>
    </div>
  </section>


</main>
