<?php global $product; ?>
<div class="featprod__item item">
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
		<h3 class="featprod__item__title"><?php echo $product->get_title(); ?></h3>
	</a>
  <div class="featprod__item__addinfo">
    <?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
    <?php echo $product->get_price_html(); ?>
  </div>
</div>