<?php //get_template_part('templates/archive', 'header' ); ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part('templates/post', 'header' ); ?>
    <div class="row container">
      <div class="columns tablet-10 tablet-centered xlarge-9 xxlarge-8">
        <div class="postcontent">
          <?php the_content('', true); ?>
        </div>
      </div>
    </div>
    <footer class="row container">
     <div class="columns tablet-10 tablet-centered xlarge-9 xxlarge-8">
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </div>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
