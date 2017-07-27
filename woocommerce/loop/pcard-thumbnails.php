<?php
/**
 * Added by Ceto. Not part of the wc core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();

if ( has_post_thumbnail() ) {
 $attachment_ids = array_merge( array(get_post_thumbnail_id()) , $attachment_ids );
}


if ( $attachment_ids && has_post_thumbnail() ) {
	$loop = 0;
	?>
	<div class="catalogthumbs owl-carousel">
		<?php

		foreach ( $attachment_ids as $attachment_id ) {
			$attributes = array(
				'title'                   => get_post_field( 'post_title', $attachment_id ),
				'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);

			$html  = '<div class="item"><a href="' . esc_url( get_the_permalink() ) . '" title="'. esc_attr( get_the_title() ) .'">';
			$html .= wp_get_attachment_image( $attachment_id, 'shop_catalog', false, $attributes );
 			$html .= '</a></div>';

			echo $html;

			if ($loop++ == 1) {
				break;
			}
		}

	?></div>
	<?php
}
