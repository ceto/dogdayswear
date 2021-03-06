<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body id="thebody" <?php body_class(); ?>>
    <?php get_template_part('templates/header','toprow'); ?>
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <?php // get_template_part('templates/header','mobile'); ?>
    <div id="document" class="document" role="document">
      <?php include Wrapper\template_path(); ?>
      <?php /*if (Setup\display_sidebar()) : ?>
        <?php include Wrapper\sidebar_path(); ?>
      <?php endif; */ ?>
    </div><!-- /.document -->
    <?php get_template_part('templates/footer'); ?>

    <?php get_template_part('templates/mobile','reveal'); ?>



    <?php
      do_action('get_footer');
      wp_footer();
    ?>
  </body>
</html>
