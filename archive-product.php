<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php //get_template_part('templates/promorow'); ?>
<header class="bannerheader">
	<div class="row container collapse">
		<div class="columns">
			<div class="bannerheader__ill">
				<?php
					global $wp_query;
				  $cat = $wp_query->get_queried_object();
				  $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
				  $banner = wp_get_attachment_image( $thumbnail_id , 'narrowbanner');
				  if ( $banner ) {
					    echo $banner;
					}
				?>
			</div>
		</div>
	</div>
</header>


<nav class="filternav">
	<div class="row container">
		<div class="columns">
			<?php
				$filterreset = $_SERVER['REQUEST_URI'];
				$filterreset = strtok($filterreset, '?');
				$cre = "/filter_szin=[\d]*[%2C]*[,]*[\d]*[&]*/";
				$sre = "/filter_meret=[\d]*[%2C]*[,]*[\d]*[&]*/";
				$colorreseturl=preg_replace($cre,'',$_SERVER['REQUEST_URI']);
				$sizereseturl=preg_replace($sre,'',$_SERVER['REQUEST_URI']);
			?>
			<a href="<?= $colorreseturl; ?>" class="filterreset">Összes szín</a>
			<?php
			    $args = array(
            'before_widget' => '<div class="filterblock filterblock--colors %1$s">',
            'after_widget' => '</div>',
          	'before_title'  => '<h3 class="filterblock__title">',
    				'after_title'   => '</h3>'
          );
			    $wcargs =array (
			    	'title' => __('Szín','dd'),
			      'attribute' => 'szin',
			      'query_type' => 'or'
			    );
			    the_widget('WC_Widget_Layered_Nav', $wcargs, $args);
			  ?>
			  <a href="<?= $sizereseturl; ?>" class="filterreset">Minden méret</a>
			  <?php
			    $args = array(
            'before_widget' => '<div class="filterblock filterblock--size %1$s">',
            'after_widget' => '</div>',
          	'before_title'  => '<h3 class="filterblock__title">',
    				'after_title'   => '</h3>'
          );
			    $wcargs =array (
			    	'title' => __('Méret','dd'),
			      'attribute' => 'meret',
			      'query_type' => 'and'
			    );
			    the_widget('WC_Widget_Layered_Nav', $wcargs, $args);

			?>
		</div>
	</div>
</nav>


<?php //dynamic_sidebar('sidebar-primary'); ?>

<main class="main" role="main">
	<div class="row container">
		<div class="columns">
			<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
		</div>
	</div>

	<header class="archiveheader">
		<div class="row container text-center">
			<div class="columns large-8 large-centered">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="pagetitle"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
        <?php get_template_part('templates/listersubnav' ); ?>

				<?php
					/**
					 * woocommerce_archive_description hook
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' )
				?>

			</div>
		</div>

	</header>

	<?php if ( have_posts() ) : ?>
	<div class="row container">
		<div class="columns">
				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					//do_action( 'woocommerce_before_shop_loop' );
				?>
		</div>
	</div>

	<?php woocommerce_product_loop_start(); ?>
		<?php woocommerce_product_subcategories(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'product' ); ?>
		<?php endwhile; // end of the loop. ?>


	<?php woocommerce_product_loop_end(); ?>


	<div class="row container">
		<div class="columns">
			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		</div>
	</div>

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
	<div class="row container">
		<div class="columns">
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		</div>
	</div>

	<?php endif; ?>

	<div class="row container">
		<div class="columns">
			<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		</div>
	</div>

</main>
