<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas off-canvas-left position-left" id="offCanvasLeft" data-off-canvas>
          <!--[if IE]>
            <div class="alert alert-warning">
              <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
            </div>
          <![endif]-->
          <?php
            do_action('get_header');
            get_template_part('templates/header');
          ?>
        </div><!-- /.off-canvas-left -->
        <div class="off-canvas-content" data-off-canvas-content>
          <?php get_template_part('templates/header','mobile'); ?>
          <div class="document" role="document">
            <?php include Wrapper\template_path(); ?>

            <?php /*if (Setup\display_sidebar()) : ?>
              <?php include Wrapper\sidebar_path(); ?>
            <?php endif; */ ?>
          </div><!-- /.document -->
          <?php
            do_action('get_footer');
            get_template_part('templates/footer');
            wp_footer();
          ?>
        </div><!-- /.off-canvas-content -->
      </div><!-- /.off-canvas-wrapper-inner -->
    </div><!-- /.off-canvas-wrapper -->
  </body>
</html>
