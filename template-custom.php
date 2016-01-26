<?php
/**
 * Template Name: Info Page with Left Sidebar
 */
?>
<?php use Roots\Sage\Titles; ?>
<main class="main" role="main">
<?php while (have_posts()) : the_post(); ?>

  <div class="row container">
    <div class="columns tablet-9 tablet-push-3">
      <header class="sidedhead">
        <h1 class="pagetitle"><?= Titles\title(); ?></h1>
      </header>
      <div class="pagecontent">
        <?php the_content(); ?>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </div>
    </div>
    <div class="columns tablet-3 tablet-pull-9">
      <?php get_template_part('templates/sidebar','page'); ?>
    </div>

  </div>
<?php endwhile; ?>
</main>
