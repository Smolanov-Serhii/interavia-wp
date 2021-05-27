<?php
/**
 * Product Loop Start
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.3.0
 */

if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {
    $producttrigger = "charter";
} else {
    $producttrigger = "";
}

?>

<div class="row <?php echo $producttrigger;?>">