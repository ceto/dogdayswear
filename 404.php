<main class="main" role="main">
  <?php get_template_part('templates/post', 'header'); ?>
  <div class="row container">
    <div class="columns tablet-10 tablet-centered large-8">
      <div class="ps postcontent">

        <div class="alert alert-warning">
          <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
        </div>

        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('templates/block', 'featprods' ); ?>