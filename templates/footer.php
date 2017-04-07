<?php get_template_part('templates/mailchimp','subscribe' ); ?>
<footer class="sitefooter">
  <div class="row container">
    <div class="columns large-4 text-center">
      <img class="flogo" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo_footer.svg" alt="Dogdays Yoga Wear">
      <p class="copyright">&copy; <?= date('Y') ?> <strong>DogDays Yoga Wear</strong> &middot; All rights reserved &middot; Site by <a href="http://hydrogene.hu"><strong>HYDROGENE</strong></a></p>
      <ul class="fsocials">
        <li><a class="face" target="_blank" href="https://www.facebook.com/dogdaysyogawear/"><i class="icon icon--facebook"></i>facebook</a></li>
        <li><a class="insta" target="_blank" href="https://www.instagram.com/dogdaysyogawear/"><i class="icon icon--instagram"></i>instagram</a></li>
        <li><a class="tel" href="tel:+36205954060"><i class="icon icon--telephone"></i>06.20.595.4060</a></li>
      </ul>
    </div>
    <div class="columns large-8">
      <div class="row">
        <div class="columns medium-6">
        <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--mobilemenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
      </div>
      <div class="columns medium-6">
      <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--mobilemenu menu--mobilemenu--small vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
    </div>
  </div>
  <p class="flinks"><a href="<?php the_permalink(540); ?>">Adatvédelem</a> &middot; <a href="<?php the_permalink(529); ?>">ÁSZF</a> &middot; <a href="<?php the_permalink(542); ?>">Szállítás és Garancia</a> </p>
</div>
</div>
</footer>
<?php //dynamic_sidebar('sidebar-footer'); ?>