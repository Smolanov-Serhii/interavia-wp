<?php
/**
 * Single Product tabs
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( empty($tabs) ) {
	return;
}
$tab_keys = array_keys( $tabs );
$active_tab_key = array_shift( $tab_keys );
if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {

} else {


}
?>


