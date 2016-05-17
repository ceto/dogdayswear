<section class="home__featprodsblock">
  <div class="row container fullwidth">
    <div class="columns">
      <div class="prod-carousel owl-carousel">
        <?php
          $args = array(
            'before_widget' => '',
            'after_widget' => '',
          );
          $wcargs =array (
            'show' => 'featured',
            'number' => '6',
          );
          the_widget('WC_Widget_Products', $wcargs, $args);
         ?>
      </div>
    </div>
  </div>
</section>