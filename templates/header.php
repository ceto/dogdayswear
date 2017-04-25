<div id="siteheadplaceholder" class="siteheadplaceholder">
  <div id="siteheadwrap" class="siteheadwrap">
    <header id="siteheader" class="siteheader">
      <div class="sitetoggler">
        <a href="#mobilereveal" data-toggle="mobilereveal"><i class="icon icon--hamburger"></i></a>
      </div>
      <a class="sitelogo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <div class="sitecart">
        <a href="<?php the_permalink(5); ?>" data-close="mobilereveal"><i class="icon icon--bag"></i>
          <?= dd_cartcount(); ?>
        </a>
      </div>
      <div class="siteacc">
        <a href="<?php the_permalink(7); ?>"><i class="icon icon--profile"></i></a>
      </div>
      <nav class="sitenav">
        <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--sitemenu']); ?>
      </nav>
    </header>
    <?php
     the_widget( 'WC_Widget_Cart',
      array(
        'hide_if_empty' => 0,
        'title' => __('Cart','woocommerce' )
      ),
      array (
        'before_widget' => '<div id="topacc" class="topacc" data-accordion data-allow-all-closed="true"><aside aria-hidden="true" style="display: none;" id="thetopcart" class="thetopcart whiteblock"><div class="row container"><div class="column large-10 large-centered xxlarge-8 %1$s">',
        'after_widget'  => '</div></div></aside></div>',
        'before_title'  => '<h3 class="thetopcart__title">',
        'after_title'   => '</h3>'
      ));
    ?>
  </div>
</div>
