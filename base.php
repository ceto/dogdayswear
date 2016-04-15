<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php get_template_part('templates/header','toprow'); ?>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas-content" data-off-canvas-content>
          <?php get_template_part('templates/header','mobile'); ?>
          <div class="document" role="document">
            <?php include Wrapper\template_path(); ?>

            <?php /*if (Setup\display_sidebar()) : ?>
              <?php include Wrapper\sidebar_path(); ?>
            <?php endif; */ ?>
          </div><!-- /.document -->
          <?php get_template_part('templates/footer'); ?>
        </div><!-- /.off-canvas-content -->
        <div class="off-canvas off-canvas-right position-right" id="offCanvasRight" data-off-canvas data-position="right">
          <?php
            do_action('get_header');
            get_template_part('templates/header');
          ?>
        </div><!-- /.off-canvas-right -->
      </div><!-- /.off-canvas-wrapper-inner -->
    </div><!-- /.off-canvas-wrapper -->
    <?php
      do_action('get_footer');
      wp_footer();
    ?>
  </body>
</html>
