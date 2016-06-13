<?php use Roots\Sage\Titles; ?>
<header class="pageheader">
  <div class="row container">
    <div class="columns tablet-10 tablet-centered text-center">
      <?php get_template_part('templates/entry-meta'); ?>
      <h1 class="pageheader__title"><?= Titles\title(); ?></h1>
      <?php
        $the_post_array=get_extended($post->post_content);
        if ($the_post_array[extended]!=='') :?>
        <p class="lead pageheader__lead">
          <?php echo $the_post_array[main]; ?>
        </p>
      <?php endif; ?>
      <?php if (has_post_thumbnail() ) :?>
        <figure class="pageheader__fig">
          <?php the_post_thumbnail( $size, $attr ); ?>
        </figure>
      <?php endif; ?>
    </div>
  </div>
</header>
