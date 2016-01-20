<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


/*** Featured Prod List Mods ****/

function dd_woocommerce_before_widget_product_list() { return ''; }
function dd_woocommerce_after_widget_product_list() { return ''; }

add_filter( 'woocommerce_before_widget_product_list', 'dd_woocommerce_before_widget_product_list', PHP_INT_MAX  );
add_filter( 'woocommerce_after_widget_product_list', 'dd_woocommerce_after_widget_product_list', PHP_INT_MAX  );




/*** Single Product Page Mods ****/

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


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action( 'woocommerce_before_single_product', 'woocommerce_template_single_title', 15 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 15);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20);