<?php
/**
 * Added by Ceto. Not part of core
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
	$loop = 0;
	?>
	<div class="catalogthumbs owl-carousel"><?php

		foreach ( $attachment_ids as $attachment_id ) {

			$image_class = implode( ' ', $classes );
			$props       = wc_get_product_attachment_props( $attachment_id, $post );

			if ( ! $props['url'] ) {
				continue;
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '
				<div class="item"><a href="%s" class="%s" title="%s">%s</a></div>',
					esc_url( get_the_permalink() ),
					esc_attr( $image_class ),
					esc_attr( get_the_title() ),
					wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), 0, $props )
					),
					$attachment_id,
					$post->ID,
					esc_attr( $image_class )
					);

			if ($loop++ == 1) {
				break;
			}
		}

	?></div>
	<?php
}
