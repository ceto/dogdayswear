<?php //get_template_part('templates/archive', 'header'); ?>
<main class="main" role="main">
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="row container ps">
      <div class="columns tablet-10 tablet-centered large-8">
        <div class="alert alert-warning">
          <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      </div>
    </div>
</main>
<?php get_template_part('templates/block', 'featprods' ); ?>