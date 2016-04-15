<aside class="toprow">
  <div class="row container">
    <div class="columns">
      <?php /* if (has_nav_menu('shop_navigation')) :?>
        <nav class="shopnav">
            <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--shopmenu']); ?>
        </nav>
      <?php endif; */ ?>
      <span class="callnow"><i class="icon icon--phone"></i><?php _e('Hívj most','dd') ?>: <a href="tel:06.20.595.4060">06.20.595.4060</a></span> | <a href="<?php the_permalink(7); ?>" class="myacc"><i class="icon icon--user"></i> Fiókom</a>
      <span class="cartindex">
        <a href="<?php the_permalink(5); ?>">Kosár <i class="icon icon--cart"></i></a>
      </span>

    </div>
  </div>
</aside>
