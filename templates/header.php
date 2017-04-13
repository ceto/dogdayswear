<div id="headsticker"></div>
<div data-sticky-container>
  <header id="siteheader" class="siteheader sticky" data-sticky data-margin-top="0" data-sticky-on="small" data-check-every="0" data-top-anchor="headsticker:bottom">
    <div class="sitetoggler">
      <a href="#mobilereveal" data-toggle="mobilereveal"><i class="icon icon--arrow-down-circle"></i></a>
    </div>
    <a class="sitelogo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <div class="sitecart">
      <a href="<?php the_permalink(5); ?>" data-close="mobilereveal"><i class="icon icon--cart"></i>
        <?= dd_cartcount(); ?>
      </a>
    </div>
    <div class="siteacc">
      <a href="<?php the_permalink(7); ?>"><i class="icon icon--user"></i></a>
    </div>
    <nav class="sitenav">
      <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--sitemenu']); ?>
    </nav>
  </header>
</div>
