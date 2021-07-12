<?php
/**
 * Single Product Meta
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = count( $product->get_category_ids() );
$tag_count = count( $product->get_tag_ids() );

$is_sku = ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) ? true : false;

if ( version_compare( WC_VERSION, '2.7', '>' ) ) {
	$product_categories = wc_get_product_category_list( $product->get_id(), ', ', '', '' ) ;
	$product_tags = wc_get_product_tag_list( $product->get_id(), ', ', '', '' );
} else {
	$product_categories = $product->get_categories( ', ', '', '' );
	$product_tags = $product->get_tags( ', ', '', '' );
}

$is_product_meta = ( $is_sku || $product_categories || $product_tags) ? true : false;

?>
<?php

if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {

} else {

}

?>
<?php  ?>