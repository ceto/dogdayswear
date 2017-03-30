<header class="siteheader">
  <div class="row container">
    <div class="columns">
      <a class="sitelogo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <div class="sitecart">
        <a href="<?php the_permalink(5); ?>"><i class="icon icon--cart"></i>
          <?= dd_cartcount(); ?>
        </a>
      </div>

      <?php if (has_nav_menu('primary_navigation')) : ?>
        <nav class="sitenav">
          <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--sitemenu']); ?>
        </nav>
      <?php endif; ?>

    </div>
  </div>
</header>

