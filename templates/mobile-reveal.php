<div class="reveal mobilereveal" id="mobilereveal" data-reveal>
  <?php if ( is_woocommerce() ) {
    do_action( 'dd_mobilenoti' );
  } ?>
  <nav class="mobilenav">
    <h3><?= __('Shop','dd') ?></h3>
    <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--mobilemenu vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
    <h3><?= __('Info & Help','dd') ?></h3>
    <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--mobilemenu menu--mobilemenu--small vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
  </nav>
  <footer class="reveal__footer">
    <a href="mailto:hello@dogdayswear.com">hello@dogdayswear.com</a></span><br><a href="tel:0036205954060">(+36) 20.595.4060</a>
  </footer>
</div>
<div class="dropdown-pane helpdropdown small bottom" id="help-dropdown" data-dropdown data-hover="true" data-hover-pane="true">

  <nav class="mobilenav">
   <?php wp_nav_menu(['theme_location' => 'shop_navigation', 'menu_class' => 'menu menu--mobilemenu menu--mobilemenu--tiny vertical', 'items_wrap' => '<ul id="%1$s" data-accordion-menu class="%2$s">%3$s</ul>']); ?>
  </nav>
</div>