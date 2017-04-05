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

	<header class="productheader">
		<div class="row container">
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

		<section id="productessence" class="productessence">

			<div class="row container">
				<div class="columns medium-7 tablet-7 large-7 xlarge-7">
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
				<div class="columns medium-5 tablet-5 large-5 xlarge-5" data-sticky-container>
					<div class="sticky" data-sticky data-top-anchor="productessence:top" data-btm-anchor="productessence:bottom" data-margin-top="5" adata-margin-bottom="15" data-sticky-on="tablet" data-check-every="0">
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
			</div>
		</section>
		<section id="productaddinfo" class="productaddinfo">
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

	<footer class="productfooter">
		<?php do_action( 'woocommerce_after_single_product' ); ?>
	</footer>
</div><!-- #product-<?php the_ID(); ?> -->


