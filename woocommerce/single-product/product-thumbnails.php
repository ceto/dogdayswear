<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( has_post_thumbnail() ) {
 $attachment_ids = array_merge( array(get_post_thumbnail_id()) , $attachment_ids );
}


if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="prodthumbswrap">
	<div data-sticky-container>
	<div class="sticky" data-sticky data-top-anchor="productimages:top" data-btm-anchor="productimages:bottom" data-margin-top="4.5" data-margin-btm="0" data-sticky-on="tablet" data-check-every="0">
	<ul class="prodthumbs <?php echo 'prodthumbs--columns-' . $columns; ?>"><?php

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_class = implode( ' ', $classes );
			$props       = wc_get_product_attachment_props( $attachment_id, $post );

			if ( ! $props['url'] ) {
				continue;
			}

			$swapimage = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), 0, $props );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '
				<li class="prodthumbs__item"><a href="%s" class="%s" title="%s" data-swapimage="%s" data-rel="prettyPhoto[product-gallery]">%s</a></li>',
					esc_url( $props['url'] ),
					esc_attr( $image_class ),
					esc_attr( $props['caption'] ),
					esc_attr($swapimage),
					wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), 0, $props )
					),
					$attachment_id,
					$post->ID,
					esc_attr( $image_class )
					);

			$loop++;
		}

	?></ul>
	</div>
	</div>
	</div>
	<?php
}
