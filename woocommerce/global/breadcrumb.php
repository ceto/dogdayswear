<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) : ?>
<nav class="breadnav" aria-label="You are here:" role="navigation">
	<ul class="breadcrumbs">
		<?php
			foreach ( $breadcrumb as $key => $crumb ) {
				echo '<li>';
				if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
					echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
				} else {
					echo '<span class="show-for-sr">Current: </span>' . esc_html( $crumb[0] );
				}
				echo '</li>';
				if ( ($key+2) ==  sizeof( $breadcrumb ) ) {break;}
			}
		?>
	</ul>
</nav>
<?php endif; ?>
