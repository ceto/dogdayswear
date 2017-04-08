<?php get_template_part('templates/mailchimp','subscribe' ); ?>
<footer class="sitefooter">
  <div class="row container">
    <div class="columns large-4 text-center">
      <img class="flogo" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo_footer.svg" alt="Dogdays Yoga Wear">
      <ul class="fsocials">
        <li><a class="face" target="_blank" href="https://www.facebook.com/dogdaysyogawear/"><i class="icon icon--facebook"></i>facebook</a></li>
        <li><a class="insta" target="_blank" href="https://www.instagram.com/dogdaysyogawear/"><i class="icon icon--instagram"></i>instagram</a></li>
        <li><a class="tel" href="tel:+36205954060"><i class="icon icon--telephone"></i>06.20.595.4060</a></li>
      </ul>
    </div>
    <div class="columns large-8">
      <div class="row">
        <div class="columns medium-6">
          <nav class="footernav">
            <h3>Shop</h3>
            <?php wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu menu--footermenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
          </nav>
        </div>
        <div class="columns medium-6">
          <nav class="footernav">
            <h3>És még&hellip;</h3>
            <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--footermenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
          </nav>
        </div>
      </div>
      <!--  <p class="flinks"><a href="<?php the_permalink(540); ?>">Adatvédelem</a> &middot; <a href="<?php the_permalink(529); ?>">ÁSZF</a> &middot; <a href="<?php the_permalink(542); ?>">Szállítás és Garancia</a> </p> -->

    </div>
  </div>
  <div class="sitefooter__mini">
    <div class="row container">
      <div class="columns tablet-6 text-center tablet-text-left large-5">
        <img class="foneline" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/dogdaysyogawear.svg" alt="Dogdays Yoga Wear">
      </div>
      <div class="columns tablet-6 text-center tablet-text-right large-7">
        <p class="copyright">&copy; <?= date('Y') ?> <strong>DogDays Yoga Wear</strong> &middot; All rights reserved &middot; Site by <a href="http://hydrogene.hu"><strong>HYDROGENE</strong></a></p>
      </div>
    </div>
  </div>
</footer>

<?php //dynamic_sidebar('sidebar-footer'); ?>