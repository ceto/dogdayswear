<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>



<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="productheader pageheader">

		<div class="row container text-center">
			<div class="columns">
				<?php
					/**
					 * woocommerce_before_single_product hook
					 *
					 * @hooked wc_print_notices - 10
					 */
					 do_action( 'woocommerce_before_single_product' );

					 if ( post_password_required() ) {
					 	echo get_the_password_form();
					 	return;
					 }
				?>
				</div>
			</div>

		</header>

		<section class="productessence">

			<div class="row container">
				<div class="columns medium-7 large-6 alarge-push-6">
					<?php
						/**
						 * woocommerce_before_single_product_summary hook
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );

					?>
				</div>
				<div class="columns medium-5 large-6 alarge-pull-6">
					<div class="productsummary">
						<?php
							/**
							 * woocommerce_single_product_summary hook
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 */
							do_action( 'woocommerce_single_product_summary' );
						?>
					</div><!-- .productsummary -->
				</div>
			</div>
		</section>
		<section class="productaddinfo">
			<div class="row container">
				<div class="columns">
					<?php
							/**
							 * woocommerce_after_single_product_summary hook
							 *
							 * @hooked woocommerce_output_product_data_tabs - 10
							 * @hooked woocommerce_upsell_display - 15
							 * @hooked woocommerce_output_related_products - 20
							 */

							do_action( 'woocommerce_after_single_product_summary' );
						?>
				</div>
			</div>
		</section>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->
<footer class="productfooter">
	<div class="row container">
		<div class="columns">
			<?php do_action( 'woocommerce_after_single_product' ); ?>
		</div>
	</div>

</footer>

