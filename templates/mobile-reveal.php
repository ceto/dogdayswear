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

<div class="dropdown-pane localizationdropdown bottom" id="localization-dropdown" data-dropdown data-hover="true" data-hover-pane="true">
  <h3 class="dropdown-pane__title"><?php _e('Country & language setup','sage') ?></h3>
  <p><small><?php _e('Prices & currencies will be recalculated when you change destination country.','sage') ?></small></p>
  <h3 class="dropdown-pane__subtitle"><?php _e('Show content in','sage') ?></h3>
  <?php do_action('wpml_add_language_selector'); ?>
  <h3 class="dropdown-pane__subtitle"><?php _e('Shipping destination','sage') ?></h3>
  <?php do_action('wcpbc_manual_country_selector'); ?>


</div>