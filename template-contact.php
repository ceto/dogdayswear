<?php
/**
 * Template Name: Contact Page with Form & Left Sidebar
 */
?>
<!-- <header class="bannerheader">
  <div class="row collapse">
    <div class="columns">
      <div class="bannerheader__ill">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'narrowbanner'); } ?>
      </div>
    </div>
  </div>
</header> -->
<?php get_template_part('templates/promorow'); ?>
<?php use Roots\Sage\Titles; ?>
<main class="main" role="main">
  <div class="ps ps--kispad">
    <?php while (have_posts()) : the_post(); ?>

      <div class="row container">
        <div class="columns tablet-3">
          <?php get_template_part('templates/sidebar','page'); ?>
        </div>
        <div class="columns tablet-9">

          <div class="row">
            <div class="columns medium-8 medium-centered tablet-10 xlarge-8">
              <header class="sidedhead">
                <h1 class="pagetitle"><?= Titles\title(); ?></h1>
              </header>
              <div class="pagecontent">
                <?php the_content(); ?>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
              </div>
              <?php get_template_part('templates/contact','form');  ?>
            </div>

          </div>
        </div>


      </div>
    <?php endwhile; ?>
  </div>
</main>
