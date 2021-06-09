<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!AtTourHelper::beforeWCTemplateRender(__FILE__)) {
    return;
}

global $product;
?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
global $product;
$price_html = $product->get_price_html();
?>
<div class="single-product-ticket__header">
    <div class="single-product-ticket__tittle"><span class="result">Результаты поиска</span>Бронирование</div>
    <?php
    if ( $price_html ) {
        printf( '<p class="price">%s</p>', $price_html );
    }
    ?>
</div>


<div class="single-product-ticket">
    <div class="atgrid__item__top__image charter-item__img"><?php the_post_thumbnail(); ?></div>
    <div class="atgrid__item__top charter-item__ticket">
        <div class="charter-item__start">
            <div class="charter-item__start-time">
                <?php echo $product->get_attribute('vremya-otbytiya'); ?>
            </div>
            <div class="charter-item__start-date">
                <?php echo $product->get_attribute('data-otbytiya'); ?>
            </div>
            <div class="charter-item__start-locate">
                <?php echo $product->get_attribute('otkuda'); ?>
            </div>
        </div>
        <div class="charter-item__midle">
            <div class="row">
                    <span class="direct-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg" data-test-element="icon"
                             class="icon_cbe9250 segment-route__path-endpoint-icon" aria-hidden="true"><path
                                    fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.954 9.793l-2.719 1.268c-2-.64-4.862-1.236-7.398-2.056l-1.201.55c1.32 1.029 3.135 2.33 4.52 3.408L7.439 14.23c-1.173-.248-2.418-.338-3.349-.532-.506-.106-.816.339-.338.71 2.256 1.759 3.159 2.469 3.159 2.469.392.305.875.497 1.343.283l12.445-5.803c.906-.46.871-1.106.64-1.629-.547-1.173-2.049-1.003-4.384.064z"></path></svg>
                    </span>
                <span class="direct-put">
                        В дороге: <?php echo $product->get_attribute('vremya-v-puti'); ?>
                    </span>
                <span class="direct-end">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg" data-test-element="icon"
                             class="icon_cbe9250 segment-route__path-endpoint-icon" aria-hidden="true"><path
                                    fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.109 14.02l-2.719-1.268c-.795-1.945-2.178-4.52-3.18-6.99l-1.193-.567c.06 1.674.23 3.9.295 5.655l-2.72-1.268c-.564-1.058-1.295-2.069-1.744-2.907-.245-.456-.785-.408-.762.198.103 2.858.14 4.006.14 4.006.018.497.182.99.646 1.21l12.445 5.804c.935.398 1.407-.043 1.659-.557.547-1.173-.549-2.214-2.867-3.317z"></path></svg>
                    </span>
            </div>
            <div class="row">

                <span class="direct-peres">
                        Кол-во пересадок: <?php echo $product->get_attribute('kol-vo-peresadok'); ?>
                    </span>
            </div>
        </div>
        <div class="charter-item__finish">
            <div class="charter-item__start-time">
                <?php echo $product->get_attribute('vremya-pribytiya'); ?>
            </div>
            <div class="charter-item__start-date">
                <?php echo $product->get_attribute('data-pribytiya'); ?>
            </div>
            <div class="charter-item__start-locate">
                <?php echo $product->get_attribute('kuda'); ?>
            </div>
        </div>
    </div>
</div>
<div itemscope itemtype="<?php echo adventure_tours_woocommerce_get_product_schema(); ?>"
     id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

    <div class="product-box product-box--page-single padding-all">
        <div class="row">
            <div class="">
                <?php
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
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>
    </div>

    <?php
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    add_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15, 2);

    /**
     * woocommerce_after_single_product_summary hook
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary', -1, 3);
    ?>

    <meta itemprop="url" content="<?php the_permalink(); ?>"/>

</div>
<div class="current-ticket-lnk">
    <a href="<?php the_permalink(); ?>">Заказать билет</a>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
