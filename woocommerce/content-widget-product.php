<?php global $product; ?>
<div class="productquare item">
	<a class="productsquare__imagelink" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image('shop_catalog'); ?>
	</a>
  <div class="productsquare__infolayer">
    <div class="productsquare__infolayer__data">
      <h3><?php echo $product->get_title(); ?></h3>
      <?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
      <span class="price"><?php echo $product->get_price_html(); ?></span>
      <?php wc_get_template_part( 'loop/add-to-cart'); ?>
    </div>
  </div>
</div>