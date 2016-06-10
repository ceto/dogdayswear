<?php
  $sticky = get_option( 'sticky_posts' );
  $the_stickyposts = new WP_Query( array(
    'posts_per_page'      => 1,
    'post__in'            => $sticky,
    'ignore_sticky_posts' => 1,
  )); ?>
<?php if ( $sticky[0] && $the_stickyposts->post_count>0 ) : $the_stickyposts->the_post(); ?>
  <aside class="promorow promorow--nobg ps ps--kispad darkblock">
    <div class="row container">
      <div class="columns medium-10 medium-centered tablet-12">
        <div class="row">
          <div class="columns tablet-7">
            <h3 class="promorow__title"><?php the_title(); ?></h3>
            <p class="promorow__discl"><?php the_excerpt(); ?></p>
          </div>
          <div class="columns tablet-5 tablet-text-right">
            <a href="<?php the_permalink(); ?>" class="button promorow__action">Részletek</a>
          </div>
        </div>
      </div>
    </div>
  </aside>
<?php endif; wp_reset_query(); ?>