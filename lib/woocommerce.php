<?php

add_filter('woocommerce_get_availability', 'dd_custom_get_availability');

function dd_custom_get_availability($availability) {
  if ($availability['availability'] == "Elfogyott" ) {
    $availability['availability'] = 'Nincs készleten <small><a class="ooscontactlink" href="'.get_permalink(143).'">Értesítést kérek, ha van raktáron!</a></small>';
  }
  return $availability;
}

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


/*** Home Featured Prod List Mods (Remove UL & LI tags)****/

function dd_woocommerce_before_widget_product_list() { return ''; }
function dd_woocommerce_after_widget_product_list() { return ''; }

add_filter( 'woocommerce_before_widget_product_list', 'dd_woocommerce_before_widget_product_list', PHP_INT_MAX  );
add_filter( 'woocommerce_after_widget_product_list', 'dd_woocommerce_after_widget_product_list', PHP_INT_MAX  );


/*** Product Loop Item Mods *****/
/**
  * woocommerce_before_shop_loop_item_title hook
  *
  * @hooked woocommerce_show_product_loop_sale_flash - 10
  * @hooked woocommerce_template_loop_product_thumbnail - 10
  */

// Akciós label átrakva az név után elé
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 5 );


/*** Single Product Page Mods ****/

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */

add_action( 'dd_mobilenoti', 'woocommerce_breadcrumb', 10 );
/**
 * woocommerce_before_single_product_summary hook
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 4 );

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

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 7 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6 );

//remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10);
//add_action( 'woocommerce_before_main_content', 'wc_print_notices', 25 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 15);

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20);



/** productaddinfo block
 * woocommerce_after_single_product_summary hook
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */

/****** Remove some tabs on product Page ****/
add_filter( 'woocommerce_product_tabs', 'dd_remove_product_tabs', 98 );
function dd_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );        // Remove the description tab
    //unset( $tabs['reviews'] );      // Remove the reviews tab
    //unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


/*** Move long description under to prod summary ***/
function dd_template_product_description() {
  wc_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'dd_template_product_description', 7 );







add_filter( 'woocommerce_variation_is_active', 'dd_grey_out_variations_when_out_of_stock', 10, 2 );
function dd_grey_out_variations_when_out_of_stock( $grey_out, $variation ) {
    if ( ! $variation->is_in_stock() )
        return false;
    return true;
}




/* Remove Woocommerce User Fields */
add_filter( 'woocommerce_checkout_fields' , 'dd_override_checkout_fields' );

function dd_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_state']);
  //unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_company']);
  // unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  // unset($fields['billing']['billing_postcode']);
  // unset($fields['billing']['billing_city']);
  unset($fields['shipping']['shipping_state']);
  // unset($fields['shipping']['shipping_country']);
  unset($fields['shipping']['shipping_company']);
  // unset($fields['shipping']['shipping_address_1']);
  unset($fields['shipping']['shipping_address_2']);
  // unset($fields['shipping']['shipping_postcode']);
  // unset($fields['shipping']['shipping_city']);


  $order = array(
    'billing_last_name',
    'billing_first_name',
    'billing_email',
    'billing_phone',
    'billing_country',
    'billing_city',
    'billing_postcode',
    'billing_address_1'
  );
  $fields['billing']['billing_last_name']['class']=['form-row-first'];
  $fields['billing']['billing_last_name']['clear']=false;
  $fields['billing']['billing_first_name']['class']=['form-row-last'];
  $fields['billing']['billing_first_name']['clear']=true;
  $fields['shipping']['shipping_postcode']['class']=['form-row-wide'];
  $fields['shipping']['shipping_postcode']['clear']=true;


  foreach($order as $field) {
        $ordered_fields[$field] = $fields['billing'][$field];
  }

  $fields['billing'] = $ordered_fields;

  return $fields;
}
/* End - Remove Woocommerce User Fields */



/****** Chande Add To Cart Button text *****/
add_filter( 'woocommerce_product_add_to_cart_text' , 'dd_woocommerce_product_add_to_cart_text' );
/**
 * custom_woocommerce_template_loop_add_to_cart
*/
function dd_woocommerce_product_add_to_cart_text() {
  global $product;

  $product_type = $product->product_type;

  switch ( $product_type ) {
    case 'external':
      return __( 'Buy product', 'woocommerce' );
    break;
    case 'grouped':
      return __( 'View products', 'woocommerce' );
    break;
    case 'simple':
      return __( 'Add to cart', 'woocommerce' );
    break;
    case 'variable':
      return __( 'Read more', 'woocommerce' );
    break;
    default:
      return __( 'Read more', 'woocommerce' );
  }

}


/**** Variaiton List default option text ***/
// add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'dd_remove_select_text');
// function dd_remove_select_text( $args ){
//   global $product;
//   $args['show_option_none'] = __( 'Válassz méretet', 'dd' );;
//   return $args;
// }


/******* Email Utánvét Szöveg ****/

add_action( 'woocommerce_email_before_order_table', 'dd_utanvet_content', 20, 2 );
function dd_utanvet_content($order,  $is_admin_email ) {
  if ( ($order->get_shipping_method() == 'Személyes átvétel') && (!$is_admin_email) )  {
    echo '<p>' . $order->get_shipping_method() . '</p>';
    echo '<h2>Személyes átvétel helyszíne</h2>';
    echo '<p><strong>Bikram Jóga Központ Astoria</strong><br>1075 Budapest, Károly krt. 1.</p>
    <p><strong>Nyitvatartás*</strong><br>H-Cs: 17:00-21:00<br>P: 15:00-19:00<br><a href="http://www.bikram.hu">www.bikram.hu</a></p>
    <p><em>*Rendelésed jóváhagyása után e-mailben értesítünk, hogy melyik naptól tudod átvenni a csomagodat.</em></p>';
  }
}



/**
 * Hide shipping flat_rate rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function ddnew_hide_shipping_when_free_is_available( $rates ) {
  $free = array();
  $filteringisneeded=FALSE;
  foreach ( $rates as $rate_id => $rate ) {
    if ( $rate->method_id === 'free_shipping' ) {
      $filteringisneeded=TRUE;
      break;
    }
  }
  if ($filteringisneeded) {
    foreach ( $rates as $rate_id => $rate ) {
       if ( $rate->method_id !== 'flat_rate' ) {
        $free[ $rate_id ] = $rate;
       }
    }
    return $free;
  } else {
    return $rates;
  }
}

add_filter( 'woocommerce_package_rates', 'ddnew_hide_shipping_when_free_is_available', 100 );



/** Custom Palceholder **/
add_action( 'init', 'custom_fix_thumbnail' );

function custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

  function custom_woocommerce_placeholder_img_src( $src ) {

  $src = get_stylesheet_directory_uri().'/dist/images/placeholder.png';

  return $src;
  }
}

