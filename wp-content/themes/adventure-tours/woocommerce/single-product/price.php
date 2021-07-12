<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$price_html = $product->get_price_html();
    if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {

    } else {
    ?>

<?php
}
?>

