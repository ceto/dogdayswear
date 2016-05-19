<aside class="toprow">
  <div class="row container">
    <div class="columns">
      <?php /* if (has_nav_menu('shop_navigation')) :?>
        <nav class="shopnav">
            <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--shopmenu']); ?>
        </nav>
      <?php endif; */ ?>

      <span class="callnow"><i class="icon icon--phone"></i><span class="show-for-medium"><?php _e('Hívj most','dd') ?>:</span> <a href="tel:06.20.595.4060">06.20.595.4060</a></span> | <a href="<?php the_permalink(7); ?>" class="myacc"><i class="icon icon--user"></i> Fiókom</a>
      <span class="cartindex">
        <a id="csiki" href="<?php the_permalink(5); ?>"><i class="icon icon--cart"></i>
          <?= dd_carttotal(); ?>
          <?= dd_cartcount(); ?>
        </a>
      </span>

    </div>
  </div>
</aside>


<?php
   the_widget( 'WC_Widget_Cart',
    array(
      'hide_if_empty' => 0,
      'title' => __('Cart','woocommerce' )
    ),
    array (
      'before_widget' => '<div class="topacc" data-accordion data-allow-all-closed="true"><aside aria-hidden="true" style="display: none;" id="thetopcart" class="thetopcart darkblock"><div class="row container"><div class="column large-10 large-centered xxlarge-8 %1$s">',
      'after_widget'  => '</div></div></aside></div>',
      'before_title'  => '<h3 class="thetopcart__title">',
      'after_title'   => '</h3>'
    ));
?>

