<main class="main" role="main">
<?php while (have_posts()) : the_post(); ?>
  <?php //if ( !is_cart() && !is_checkout() && !is_account_page() ) : ?>
    <?php get_template_part('templates/page', 'header'); ?>
  <?php //endif;  ?>
  <div class="pagecontent">
    <div class="row container">
      <div class="columns">
        <?php the_content(); ?>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</main>
