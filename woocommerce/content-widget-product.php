<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see   http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $product; ?>
<div class="productsquare item">
	<a class="productsquare__imagelink" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
    <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		<?php // echo $product->get_image('shop_catalog'); ?>
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