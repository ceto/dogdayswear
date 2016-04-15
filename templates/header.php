<header class="siteheader">
  <div class="row container">
    <div class="columns tablet-4">
      <a class="sitelogo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <div class="columns tablet-8">
      <?php if (has_nav_menu('primary_navigation')) : ?>
        <nav class="sitenav">
          <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--sitemenu']); ?>
        </nav>
      <?php endif; ?>
    </div>
  </div>
</header>

