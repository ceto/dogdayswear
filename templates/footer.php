<?php //get_template_part('templates/mailchimp','subscribe' ); ?>
<footer class="sitefooter whiteblock">
  <?php if (!is_checkout()) :?>
    <div class="sitefooter__great">
      <div class="row container">
        <div class="columns tablet-8 large-6">
          <div class="row">
            <div class="columns small-6">
              <nav class="footernav">
                <h3>Shop</h3>
                <?php wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu menu--footermenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
              </nav>
            </div>
            <div class="columns small-6">
              <nav class="footernav">
                <h3>Help & info</h3>
                <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--footermenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
              </nav>
            </div>
          </div>
        </div>
        <div class="columns tablet-4 large-3">
          <div class="row">
              <div class="columns small-6 tablet-12">
                <nav class="footernav">
                  <h3><? _e('Contact','dd') ?></h3>
                  <ul class="menu menu--footermenu vertical">
                    <li><a class="direct" href="<?php the_permalink(143); ?>"><? _e('Ask a question','dd')?></a></li>
                    <li><a class="tel" href="tel:+36308598291">+36.30.859.8291</a></li>
                    <li><a class="email" href="mailto:hello@dogdayswear.com">hello@dogdayswear.com</a></li>
                  </ul>
                </nav>
              </div>
              <div class="columns small-6 tablet-12">
                <nav class="footernav">
                  <h3><? _e('Follow us','dd') ?></h3>
                  <ul class="menu menu--footermenu vertical">
                    <li><a class="face" target="_blank" href="https://www.facebook.com/dogdaysyogawear/"><i class="icon icon--facebook"></i>Facebook</a></li>
                    <li><a class="insta" target="_blank" href="https://www.instagram.com/dogdaysyogawear/"><i class="icon icon--instagram"></i>Instagram</a></li>
                  </ul>
                </nav>
              </div>
            </div>
        </div>
        <div class="columns tablet-12 large-3">
          <?php get_template_part('templates/mailchimp','subscribe-small' ); ?>
          <img class="fslogan" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/slogan_2line-footer.svg" alt="Don't fear the sweat">
        </div>
      </div>
      <div class="row container">
        <div class="columns">
          <a class="fbarionlink" href="https://www.barion.com/hu/tajekoztato-biztonsagos-online-fizetesrol" target="_blank" title="Az online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013">
            <span data-tooltip aria-haspopup="true" class="has-tip right" data-disable-hover="false" tabindex="1" title="A kényelmes és biztonságos online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013 Bankkártya adatai áruházunkhoz nem jutnak el.">
              <img class="fbarion" width="216" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/barion-card-payment-banner.png" alt="Az online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013">
            </span>
          </a>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="sitefooter__mini">
    <div class="row container">
      <div class="columns tablet-4 text-center tablet-text-left">
        <img class="foneline" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/dogdaysyogawear.svg" alt="Dogdays Yoga Wear">
      </div>
      <div class="columns tablet-8 text-center tablet-text-right">
        <p class="copyright">&copy; <?= date('Y') ?> <strong>DogDays Yoga Wear</strong> &middot; All rights reserved &middot; Site by <a href="http://hydrogene.hu/referencia/sportruhazati-arculat-es-webaruhaz/"><strong>HYDROGENE</strong></a></p>
      </div>
    </div>
  </div>
</footer>
