<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part('templates/post', 'header' ); ?>
    <div class="row container">
      <div class="columns tablet-10 tablet-centered large-8">
        <div class="ps postcontent">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <footer class="row container">
     <div class="columns tablet-10 tablet-centered large-8">
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </div>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
