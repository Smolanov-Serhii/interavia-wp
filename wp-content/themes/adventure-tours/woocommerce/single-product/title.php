<?php
/**
 * Single Product title
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {

} else {
    ?>
    <h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h2>
    <?php
}
?>

