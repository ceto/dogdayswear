<?php //get_template_part('templates/mailchimp','subscribe' ); ?>
<footer class="sitefooter">
  <?php if (!is_checkout()) :?>
    <div class="sitefooter__great">
      <div class="row container">
        <div class="columns tablet-6">
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
        <div class="columns tablet-6 large-3">
          <div class="row">
              <div class="columns small-6 large-12">
                <nav class="footernav">
                  <h3><? _e('Contact','dd') ?></h3>
                  <ul class="menu menu--footermenu vertical">
                    <li><a class="direct" href="<?php the_permalink(143); ?>"><i class="icon icon--play"></i><? _e('Ask a question','dd')?></a></li>
                    <li><a class="tel" href="tel:+36205954060"><i class="icon icon--telephone"></i>06.20.595.4060</a></li>
                    <li><a class="email" href="mailto:hello@dogdayswear.com"><i class="icon icon--play"></i>hello@dogdayswear.com</a></li>
                  </ul>
                </nav>
              </div>
              <div class="columns small-6 large-12">
                <nav class="footernav">
                  <h3><? _e('You can find us','dd') ?></h3>
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
    </div>
  <?php endif; ?>
  <div class="sitefooter__mini">
    <div class="row container">
      <div class="columns tablet-4 text-center tablet-text-left">
        <img class="foneline" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/dogdaysyogawear.svg" alt="Dogdays Yoga Wear">
      </div>
      <div class="columns tablet-8 text-center tablet-text-right">
        <p class="copyright">&copy; <?= date('Y') ?> <strong>DogDays Yoga Wear</strong> &middot; All rights reserved &middot; Site by <a href="http://hydrogene.hu"><strong>HYDROGENE</strong></a></p>
      </div>
    </div>
  </div>
</footer>
<?php //dynamic_sidebar('sidebar-footer'); ?>