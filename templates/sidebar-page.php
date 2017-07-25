<aside class="sidebar sidebar--page">
  <div class="row small-up-1 medium-up-2 tablet-up-1">
    <?php if (has_nav_menu('side_navigation')) : ?>
      <section class="column widget">
        <nav class="sidenav">
          <h3 class="widget__title"><?php _e('Help', 'sage') ?></h3>
          <?php wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'menu menu--sidemenu']); ?>
        </nav>
      </section>
    <?php endif; ?>
    <?php dynamic_sidebar('sidebar-page'); ?>
  </div>
</aside>