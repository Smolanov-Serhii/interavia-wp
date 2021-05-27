<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! AtTourHelper::beforeWCTemplateRender( __FILE__ ) ) {
	return;
}

global $product, $woocommerce_loop;


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count


global $product;
$woocommerce_loop['loop']++;
$price_html = $product->get_price_html();

if ( has_term( 'charternye-rejsy', 'product_cat' ) ) {
    ?>
    <div <?php wc_product_class('atgrid__item', $product) ?>>
        <div class="atgrid__item__top charter-item__ticket">
            <div class="atgrid__item__top__image charter-item__img"><?php echo woocommerce_get_product_thumbnail(); ?></div>
            <div class="charter-item__start">
                <div class="charter-item__start-time">
                    <?php echo $product->get_attribute('vremya-otbytiya'); ?>
                </div>
                <div class="charter-item__start-locate">
                    <?php echo $product->get_attribute('otkuda'); ?>
                </div>
                <div class="charter-item__start-date">
                    <?php echo $product->get_attribute('data-otbytiya'); ?>
                </div>
            </div>
            <div class="charter-item__midle">
                <div class="row">
                    <span class="direct-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" data-test-element="icon" class="icon_cbe9250 segment-route__path-endpoint-icon" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.954 9.793l-2.719 1.268c-2-.64-4.862-1.236-7.398-2.056l-1.201.55c1.32 1.029 3.135 2.33 4.52 3.408L7.439 14.23c-1.173-.248-2.418-.338-3.349-.532-.506-.106-.816.339-.338.71 2.256 1.759 3.159 2.469 3.159 2.469.392.305.875.497 1.343.283l12.445-5.803c.906-.46.871-1.106.64-1.629-.547-1.173-2.049-1.003-4.384.064z"></path></svg>
                    </span>
                    <span class="direct-put">
                        В дороге: <?php echo $product->get_attribute('vremya-v-puti'); ?>
                    </span>
                    <span class="direct-end">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" data-test-element="icon" class="icon_cbe9250 segment-route__path-endpoint-icon" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.109 14.02l-2.719-1.268c-.795-1.945-2.178-4.52-3.18-6.99l-1.193-.567c.06 1.674.23 3.9.295 5.655l-2.72-1.268c-.564-1.058-1.295-2.069-1.744-2.907-.245-.456-.785-.408-.762.198.103 2.858.14 4.006.14 4.006.018.497.182.99.646 1.21l12.445 5.804c.935.398 1.407-.043 1.659-.557.547-1.173-.549-2.214-2.867-3.317z"></path></svg>
                    </span>
                </div>
            </div>
            <div class="charter-item__finish">
                <div class="charter-item__start-time">
                    <?php echo $product->get_attribute('vremya-pribytiya'); ?>
                </div>
                <div class="charter-item__start-locate">
                    <?php echo $product->get_attribute('kuda'); ?>
                </div>
                <div class="charter-item__start-date">
                    <?php echo $product->get_attribute('data-pribytiya'); ?>
                </div>
            </div>

        </div>
    </div>
    <?php
} else {
    ?>
    <div <?php wc_product_class('atgrid__item', $product) ?>>
        <div class="atgrid__item__top">
            <a href="<?php the_permalink(); ?>" class="atgrid__item__top__image"><?php echo woocommerce_get_product_thumbnail(); ?></a>
            <?php if ( $product->is_on_sale() ) { ?>
                <div class="atgrid__item__angle-wrap"><div class="atgrid__item__angle"><?php esc_html_e( 'On Sale', 'adventure-tours' ); ?></div></div>
            <?php } ?>
            <div class="atgrid__item__price">
                <?php if ( $price_html ) {
                    printf( '<a href="%s" class="atgrid__item__price__button">%s</a>',
                        esc_url( get_permalink() ),
                        $price_html
                    );
                } ?>
            </div>
        </div>
        <div class="atgrid__item__content">
            <h3 class="atgrid__item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="atgrid__item__description"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?></div>
        </div>
        <div class="item-attributes">
            <?php adventure_tours_render_product_attributes(array(
                'before_each' => '<div class="item-attributes__item">',
                'after_each' => '</div>',
                'limit' => 3,
            )) ?>
            <div class="item-attributes__item"><a href="<?php the_permalink(); ?>" class="item-attributes__link"><?php esc_html_e('view', 'adventure-tours'); ?><i class="fa fa-long-arrow-right"></i></a></div>
        </div>
    </div>
    <?php

}
?>

