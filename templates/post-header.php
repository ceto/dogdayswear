<?php use Roots\Sage\Titles; ?>
<header class="bannerheader">
  <div class="row container collapse">
    <div class="columns">
      <div class="bannerheader__ill"></div>
      <div class="bannerheader__text">
        <h1 class="bannerheader__title"><?= Titles\title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      </div>
    </div>
  </div>
</header>
