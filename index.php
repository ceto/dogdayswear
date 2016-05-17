<?php //get_template_part('templates/archive', 'header'); ?>
<main class="main" role="main">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php if (!have_posts()) : ?>
    <div class="row container ps">
      <div class="columns tablet-10 tablet-centered large-8">
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>

  <?php the_posts_navigation(); ?>
</main>
