<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
  return;
}

$actclmeta = substr($product->get_sku(),0,4);


// $related = get_post_meta( $product->id, '_colvariants_ids', true );

//if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
  'post_type'            => 'product',
  'ignore_sticky_posts'  => 1,
  'no_found_rows'        => 1,
  'posts_per_page'       => 0,
  'orderby'              => 'name',
  'order'                => 'ASC',
  'meta_key'             => '_sku',
  'meta_value'           => $actclmeta,
  'meta_compare'          => 'LIKE'
  //'post__in'             => $related,
  //'post__not_in'         => array( $product->id )
) );

$relproducts = new WP_Query( $args );


if ( $relproducts->have_posts() ) : ?>


  <div class="colorvariations">

    <label><?php _e('Szín','dd'); ?></label>
    <ul class="colvariants">
      <?php while ( $relproducts->have_posts() ) : $relproducts->the_post(); ?>
        <?php
          $cl = array_shift( wc_get_product_terms( get_the_id(), 'pa_szin', array( 'fields' => 'names' ) ) );
        ?>
        <li class="colvariant colvariant--<?= sanitize_title($cl); ?><?= ($product->id==get_the_id())?' actual':''; ?>">
          <a href="<?php the_permalink(); ?>"><? echo $cl; ?></a>
        </li>
     <?php endwhile; // end of the loop. ?>
    </ul>

  </div>

<?php endif;

wp_reset_postdata();
?>
