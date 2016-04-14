<?php

// add related products selector to product edit screen
function dd_select_colvariants_products() {
  global $post, $woocommerce;
  $product_ids = array_filter( array_map( 'absint', (array) get_post_meta( $post->ID, '_colvariants_ids', true ) ) );
  ?>
  <div class="options_group">
    <p class="form-field">
      <label for="colvariants_ids"><?php _e( 'Color Variants', 'woocommerce' ); ?></label>
      <input type="hidden" class="wc-product-search" style="width: 50%;" id="colvariants_ids" name="colvariants_ids" data-placeholder="<?php _e( 'Search for a product&hellip;', 'woocommerce' ); ?>" data-action="woocommerce_json_search_products" data-multiple="true" data-selected="<?php
        $json_ids = array();
        foreach ( $product_ids as $product_id ) {
          $product = wc_get_product( $product_id );
          if ( is_object( $product ) ) {
            $json_ids[ $product_id ] = wp_kses_post( html_entity_decode( $product->get_formatted_name(), ENT_QUOTES, get_bloginfo( 'charset' ) ) );
          }
        }

        echo esc_attr( json_encode( $json_ids ) );
      ?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> <?php echo wc_help_tip( __( 'Color variants are products which are diplayed and linked on product page as a color selector field. Please included current color variant also.', 'dd' ) ); ?>
    </p>
  </div>
  <?php
}
add_action('woocommerce_product_options_related', 'dd_select_colvariants_products');

// save related products selector on product edit screen
function dd_save_colvariants_products( $post_id, $post ) {
  global $woocommerce;
  if ( isset( $_POST['colvariants_ids'] ) ) {
    $colvariant = isset( $_POST['colvariants_ids'] ) ? array_filter( array_map( 'intval', explode( ',', $_POST['colvariants_ids'] ) ) ) : array();
    update_post_meta( $post_id, '_colvariants_ids', $colvariant );
  } else {
    delete_post_meta( $post_id, '_colvariants_ids' );
  }
}
add_action( 'woocommerce_process_product_meta', 'dd_save_colvariants_products', 10, 2 );


/** Change number of related products on product page **/
function dd_related_products_limit($args) {
  $args['posts_per_page'] = 6;
  return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'dd_related_products_limit' );


/****** Number of Products on lists *******/
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9999;' ), 20 );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


/*** Featured Prod List Mods (Remove UL & LI tags)****/

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


//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
//add_action( 'woocommerce_before_single_product', 'woocommerce_template_single_title', 15 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 15);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20);


/****** Remove some tabs on product Page ****/

add_filter( 'woocommerce_product_tabs', 'dd_remove_product_tabs', 98 );
function dd_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );        // Remove the description tab
    //unset( $tabs['reviews'] );      // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

/*** Move long description under to prod summary ***/
function dd_template_product_description() {
  wc_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'dd_template_product_description', 20 );




/* Remove Woocommerce User Fields */
add_filter( 'woocommerce_checkout_fields' , 'dd_override_checkout_fields' );
add_filter( 'woocommerce_billing_fields' , 'dd_override_billing_fields' );
add_filter( 'woocommerce_shipping_fields' , 'dd_override_shipping_fields' );

function dd_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_company']);
  // unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  // unset($fields['billing']['billing_postcode']);
  // unset($fields['billing']['billing_city']);
  unset($fields['shipping']['shipping_state']);
  // unset($fields['shipping']['shipping_country']);
  // unset($fields['shipping']['shipping_company']);
  // unset($fields['shipping']['shipping_address_1']);
  unset($fields['shipping']['shipping_address_2']);
  // unset($fields['shipping']['shipping_postcode']);
  // unset($fields['shipping']['shipping_city']);


  $order = array(
    'billing_first_name',
    'billing_last_name',
    'billing_email',
    'billing_phone',
    'billing_city',
    'billing_postcode',
    'billing_address_1'
  );
  foreach($order as $field) {
        $ordered_fields[$field] = $fields['billing'][$field];
    }

  $fields['billing'] = $ordered_fields;

  return $fields;
}
function dd_override_billing_fields( $fields ) {
  unset($fields['billing_state']);
  unset($fields['billing_country']);
  unset($fields['billing_company']);
  // unset($fields['billing_address_1']);
  unset($fields['billing_address_2']);
  // unset($fields['billing_postcode']);
  // unset($fields['billing_city']);
  return $fields;
}
function dd_override_shipping_fields( $fields ) {
  unset($fields['shipping_state']);
  unset($fields['shipping_country']);
  unset($fields['shipping_company']);
  // unset($fields['shipping_address_1']);
  unset($fields['shipping_address_2']);
  // unset($fields['shipping_postcode']);
  // unset($fields['shipping_city']);
  return $fields;
}
/* End - Remove Woocommerce User Fields */

/* Make Woocommerce Phone Field Not Required  */
// add_filter( 'woocommerce_billing_fields', 'dd_npr_filter_phone', 10, 1 );
// function dd_npr_filter_phone( $address_fields ) {
//   $address_fields['billing_phone']['required'] = false;
//   return $address_fields;
// }
/* End - Make Woocommerce Phone Field Not Required  */



// add_filter('woocommerce_checkout_fields', 'dd_order_fields');

// function dd_order_fields($fields) {

//     $order = array(
//         'billing_first_name',
//         'billing_last_name',
//         'billing_email',
//         'billing_phone',
//         'billing_city',
//         'billing_postcode',
//         'billing_address_1'

//     );
//     foreach($order as $field)
//     {
//         $ordered_fields[$field] = $fields['billing'][$field];
//     }

//     $fields['billing'] = $ordered_fields;
//     //$fields['shipping'] = $ordered_fields;
//     return $fields;

// }


