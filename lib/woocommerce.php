<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


function dd_woocommerce_before_widget_product_list() {
    return '';
}

function dd_woocommerce_after_widget_product_list() {
    return '';
}

add_filter( 'woocommerce_before_widget_product_list', 'dd_woocommerce_before_widget_product_list', PHP_INT_MAX  );
add_filter( 'woocommerce_after_widget_product_list', 'dd_woocommerce_after_widget_product_list', PHP_INT_MAX  );