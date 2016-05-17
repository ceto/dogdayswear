<article <?php post_class('ps ps--kispad row container'); ?>>
  <div class="columns tablet-10 tablet-centered xlarge-9 xxlarge-8">
    <header class="">
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </div>
</article>
