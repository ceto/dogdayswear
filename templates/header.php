<header class="siteheader">
  <div class="row container fullwidth">
    <div class="columns medium-4">
      <a class="sitelogo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <div class="columns medium-8">
      <nav class="sitenav">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--sitemenu']);
        endif;
        ?>
      </nav>
    </div>
  </div>
</header>

