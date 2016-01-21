<section class="ps">
  <div class="row container">
    <div class="columns large-8 large-centered">
      <?php the_content(); ?>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </div>
  </div>
</section>