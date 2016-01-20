<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="product__tabswrapper">
		<ul class="tabs product__tabs" data-tabs id="product__tabs">
			<?php $firstab=true; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab tabs-title <?= $firstab?'is-active':''; ?>">
					<a href="#tab--<?php echo esc_attr( $key ); ?>" <?php echo $firstab?'aria-selected="true"':''; $firstab=false; ?>><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="tabs-content product__tabs-content" data-tabs-content="product__tabs">
			<?php $firstab=true; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="tabs-panel <?php echo $firstab?'is-active':''; $firstab=false; ?>" id="tab--<?php echo esc_attr( $key ); ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
