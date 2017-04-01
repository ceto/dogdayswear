
<aside class="toprow">
  <div class="toprow__first">
    <span class="callnow"><i class="icon icon--facebook"></i> <a href="mailto:hello@dogdayswear.com">hello@dogdayswear.com</a></span> | <span class="callnow"><i class="icon icon--phone"></i> <a href="tel:0036205954060">(+36) 20.595.4060</a></span>
  </div>
  <div class="toprow__sec">
    <span class="callnow"><a href="#" data-toggle="help-dropdown"><?= __('Help','dd') ?> <i class="icon icon--chevron-down"></i></a></span>
    <div class="dropdown-pane helpdropdown small bottom" id="help-dropdown" data-dropdown data-hover="true" data-hover-pane="true">
       <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--help vertical']); ?>
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

