<?php use Roots\Sage\Titles; ?>
<header class="pageheader">
  <div class="row container">
    <div class="columns tablet-10 tablet-centered large-8 text-center">
      <h1><?= Titles\title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
  </div>
</header>
