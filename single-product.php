<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<main class="main" role="main">
  <div class="productbefore">
<!--     <div class="row container">
      <div class="columns"> -->
        <nav class="prevnextnav">
          <ul>
            <li><?php previous_post_link( '%link', __('Previous', 'dd'), true, '', 'product_cat' ); ?></li>
            <li><?php next_post_link( '%link', __('Next', 'dd'), true, '', 'product_cat' ); ?></li>
          </ul>
        </nav>
        <?php
          /**
           * woocommerce_before_main_content hook.
           *
           * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
           * @hooked woocommerce_breadcrumb - 20
           */
          do_action( 'woocommerce_before_main_content' );
        ?>

<!--       </div>
    </div> -->
  </div>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php wc_get_template_part( 'content', 'single-product' ); ?>
	<?php endwhile; // end of the loop. ?>

  <div class="row container">
    <div class="columns">
      <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
      ?>
    </div>
  </div>
</main>

<?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    //do_action( 'woocommerce_sidebar' );
  ?>