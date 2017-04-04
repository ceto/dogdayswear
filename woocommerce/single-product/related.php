<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

//$related = $product->get_related( $posts_per_page );
$related = $product->get_cross_sells();
if ( sizeof( $related ) == 0 ) {
	$related = $product->get_related( $posts_per_page );
}


if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<aside class="productrelated">
				<h2 class="sectitle">
					<?php // _e( 'Related Products', 'woocommerce' ); ?>
					<?php _e( 'You may also like&hellip;', 'woocommerce' ) ?>
				</h2>

    <div class="row container fullwidth">
      <div class="columns">
        <div class="prod-carousel owl-carousel">
					<?php //woocommerce_product_loop_start(); ?>
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<?php wc_get_template_part( 'content-widget', 'product' ); ?>
					<?php endwhile; // end of the loop. ?>
					<?php //woocommerce_product_loop_end(); ?>
				</div>
			</div>
		</div>
	</aside>

<?php endif;

wp_reset_postdata();
