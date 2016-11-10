<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><table id="addresses" cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
	<tr>
		<td class="td" style="text-align:left; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
			<h3><?php _e( 'Billing address', 'woocommerce' ); ?></h3>

			<p class="text"><?php echo $order->get_formatted_billing_address(); ?></p>
		</td>
		<?php //this php block added by ceto checking local pickup
			$shipping_local_pickup = false;
			//if ( $order->has_shipping_method( 'local_pickup' ) ) { $shipping_local_pickup = true; }
			if ( $items_totals = $order->get_order_item_totals() ) {
			    foreach ( $items_totals as $items_total ) {
			        if ( $items_total['value'] == 'Személyes átvétel' && !$shipping_local_pickup ) $shipping_local_pickup = true;
			    }
			}
		?>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) && !$shipping_local_pickup ) : ?>
			<td class="td" style="text-align:left; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
				<h3><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

				<p class="text"><?php echo $shipping; ?></p>
			</td>
		<?php endif; ?>
	</tr>
</table>
