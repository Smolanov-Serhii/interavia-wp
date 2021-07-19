<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! AtTourHelper::beforeWCTemplateRender( __FILE__ ) ) {
    return;
}

global $woocommerce_loop;

get_header( 'shop' );

ob_start();
do_action( 'woocommerce_sidebar' );
$sidebar_content = ob_get_clean();

$is_wc_older_than_330 = version_compare( WC_VERSION, '3.3.0', '<');
?>

<?php ob_start(); ?>
<?php
/**
 * woocommerce_before_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
$counter = 0;
?>
<?php
$product_ids_on_sale = wc_get_product_ids_on_sale();
$flag = 0;
$args = array(
    'post_type' => 'product',
    'post__in' => array_merge( array( 0 ), $product_ids_on_sale )
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();
        $flag++;
    endwhile;
}
wp_reset_postdata();
?>
<?php
    if($flag > 0){
        ?>
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>
            <?php //if ( woocommerce_product_loop() ) : // since WooCommerce 3.4.0 ?>

            <?php if ( $is_wc_older_than_330 ) {
                $columns = $sidebar_content ? 2 : 3;
                $woocommerce_loop['columns'] = $columns;

                woocommerce_product_subcategories(array(
                    'before' => '<div class="row product-categories">',
                    'after' => '</div>',
                ));
            } ?>
            <div class="row<?php echo 'both' == adventure_tours_get_shop_page_display_mode() ? ' atgrid-sorting': ''; ?>"><div class="col-xs-12"><?php do_action( 'woocommerce_before_shop_loop' ); ?></div></div>
            <?php
            if ( ! $is_wc_older_than_330 ) {
                // $columns = isset( $woocommerce_loop['columns'] ) ? $woocommerce_loop['columns'] : 2;
                $columns = $sidebar_content ? 2 : 3;
                $woocommerce_loop['columns'] = $columns;
            }
            $coll_class = 'atgrid__item-wrap atgrid__item-wrap--product col-xs-6 col-md-' . round(12 / $columns);

            ?>
            <?php woocommerce_product_loop_start(); ?>
            <?php if ( $is_wc_older_than_330 || wc_get_loop_prop( 'total' ) ) : ?>

                <div class="atgrid">
                    <?php
                    $product_ids_on_sale = wc_get_product_ids_on_sale();

                    $args = array(
                        'post_type' => 'product',
                        'post__in' => array_merge( array( 0 ), $product_ids_on_sale )
                    );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            if ( $counter > 0 && $counter % $columns == 0 ) {
                                echo '<div class="atgrid__row-separator atgrid__row-separator--product clearfix hidden-sm hidden-xs"></div>';
                            }
                            if ( $counter > 0 && $counter % 2 == 0 ) {
                                echo '<div class="atgrid__row-separator atgrid__row-separator--product clearfix visible-sm visible-xs"></div>';
                            }
                            $counter++;
                            do_action( 'woocommerce_shop_loop' );
                            ?>
                            <div class="<?php echo esc_attr( $coll_class ); ?>">
                                <?php wc_get_template_part( 'content', 'product' ); ?>
                            </div>
                        <?php
                        endwhile;
                    } else {
                        echo __( 'Продуктов не найдено' );
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
            <?php woocommerce_product_loop_end(); ?>
            <?php do_action( 'woocommerce_after_shop_loop' ); ?>
        <?php elseif ( ! woocommerce_product_subcategories( array( 'force_display' => true, 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
            <?php do_action( 'woocommerce_no_products_found' ); ?>
        <?php endif; ?>
        <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
        ?>
        <?php $primary_content = ob_get_clean();  ?>

        <?php
    }
?>
<?php

    if($counter < 1){
        echo '<div class="no-products">
<svg width="263" height="263" viewBox="0 0 263 263" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0)">
<path d="M45 91.2202C46.21 88.6002 47.07 85.7402 48.7 83.4102C52.15 78.4702 57.34 76.3402 63.15 75.3402C76.98 72.9702 90.8 70.4902 104.62 68.0502C117.67 65.7502 130.72 63.4602 143.76 61.1602C156.25 58.9602 168.75 56.7902 181.24 54.5402C186.89 53.5202 192.31 53.7502 197.36 56.8302C202.29 59.8402 204.97 64.3002 205.84 69.9602C206.28 72.7902 206.72 75.6202 207.34 78.4202C207.5 79.1702 208.16 80.0002 208.82 80.4202C214.74 84.2302 218.04 89.4502 218.03 96.6302C218 117.29 217.83 137.96 218.1 158.62C218.24 168.93 210.71 176.38 202.04 178.03C200.17 178.38 198.24 178.53 196.34 178.53C153.27 178.56 110.2 178.54 67.12 178.56C60.84 178.56 55.23 176.89 50.7 172.38C47.15 168.85 45.34 164.56 45.35 159.51C45.36 139.24 45.36 118.97 45.34 98.7002C45.34 98.0002 45.12 97.3102 45.01 96.6202C45 94.8202 45 93.0202 45 91.2202ZM131.66 167.93C153.11 167.93 174.56 167.93 196.01 167.93C196.69 167.93 197.36 167.95 198.04 167.89C203.8 167.44 207.42 164.13 207.43 159.09C207.47 138.31 207.44 117.54 207.45 96.7602C207.45 93.0102 205.66 90.3402 202.26 89.0502C200.32 88.3102 198.11 87.9602 196.03 87.9602C153.18 87.9002 110.34 87.9102 67.49 87.9202C66.31 87.9202 65.13 88.0002 63.96 88.1502C59.16 88.7302 56.05 92.2102 56.03 97.0002C56.01 102.63 56.03 108.26 56.03 113.89C56.03 128.87 56.02 143.84 56.03 158.82C56.03 163.18 58.13 166.06 62.33 167.26C63.87 167.7 65.54 167.89 67.15 167.89C88.64 167.94 110.15 167.93 131.66 167.93ZM114.81 77.0802C114.81 77.1502 114.8 77.2202 114.8 77.2902C141.91 77.2902 169.02 77.2902 196.29 77.2902C195.88 75.0102 195.46 72.8202 195.1 70.6202C194.69 68.1102 193.21 66.5002 190.99 65.4502C188.46 64.2502 185.87 64.5302 183.23 65.0102C172.68 66.9002 162.13 68.7402 151.57 70.6002C139.32 72.7502 127.07 74.9202 114.81 77.0802Z" fill="#092C6D"/>
<path d="M156.6 126.14C154.87 125.17 153.57 124.42 152.26 123.7C147.39 121.01 142.51 118.34 137.64 115.65C136.08 114.79 136.15 114.36 137.18 112.97C139.42 109.93 141.86 109.28 145.59 110.68C151.56 112.93 157.82 114.42 163.93 116.29C164.81 116.56 165.34 116.46 165.97 115.77C168.2 113.31 170.43 110.84 172.8 108.51C175.96 105.39 180.85 106.51 182 110.56C182.64 112.84 181.91 114.78 180.24 116.38C178.08 118.44 175.94 120.52 173.69 122.49C172.68 123.38 172.44 124.16 172.85 125.49C175.04 132.56 177.1 139.68 179.27 146.76C179.59 147.82 179.54 148.54 178.68 149.28C177.78 150.05 177 150.94 176.15 151.77C174.79 153.09 174.28 153.03 173.37 151.38C170.24 145.72 167.13 140.06 164.01 134.4C163.71 133.86 163.4 133.34 163.04 132.7C162.69 132.98 162.37 133.18 162.11 133.44C159.38 136.12 156.62 138.78 153.97 141.54C153.5 142.03 153.25 143.01 153.34 143.72C153.54 145.44 154 147.13 154.35 148.84C154.6 150.02 152.79 152.8 151.58 152.92C151.17 152.96 150.62 152.63 150.3 152.3C145.78 147.82 141.29 143.31 136.78 138.82C135.97 138.02 136.05 137.41 136.75 136.52C138.08 134.83 139.57 134.17 141.66 135.01C144.99 136.34 147.61 135.7 149.93 132.67C151.74 130.29 154.22 128.42 156.6 126.14Z" fill="#092C6D"/>
<path d="M92.4102 96.1099C95.9202 96.1099 99.2802 96.1099 102.76 96.1099C102.76 99.1399 102.76 102.1 102.76 105.17C99.3202 105.17 95.9202 105.17 92.4102 105.17C92.4102 102.17 92.4102 99.2099 92.4102 96.1099Z" fill="#092C6D"/>
<path d="M102.82 114.34C102.82 117.36 102.82 120.26 102.82 123.28C99.3502 123.28 95.9502 123.28 92.4302 123.28C92.4302 120.35 92.4302 117.41 92.4302 114.34C95.8202 114.34 99.2102 114.34 102.82 114.34Z" fill="#092C6D"/>
<path d="M102.81 132.57C102.81 135.55 102.81 138.44 102.81 141.46C99.3802 141.46 95.9802 141.46 92.4502 141.46C92.4502 138.57 92.4502 135.63 92.4502 132.57C95.8002 132.57 99.2002 132.57 102.81 132.57Z" fill="#092C6D"/>
<path d="M102.84 150.79C102.84 153.8 102.84 156.66 102.84 159.66C99.3599 159.66 95.9199 159.66 92.3999 159.66C92.3999 156.73 92.3999 153.83 92.3999 150.79C95.8199 150.79 99.2499 150.79 102.84 150.79Z" fill="#092C6D"/>
</g>
<path fill-rule="evenodd" clip-rule="evenodd" d="M131.5 253C198.603 253 253 198.603 253 131.5C253 64.3974 198.603 10 131.5 10C64.3974 10 10 64.3974 10 131.5C10 198.603 64.3974 253 131.5 253ZM131.5 263C204.125 263 263 204.125 263 131.5C263 58.8746 204.125 0 131.5 0C58.8746 0 0 58.8746 0 131.5C0 204.125 58.8746 263 131.5 263Z" fill="#FF0000"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M220 219L44 43L51.0711 35.9289L227.071 211.929L220 219Z" fill="#FF0000"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M44 219L220 43L227.071 50.0711L51.0711 226.071L44 219Z" fill="#FF0000"/>
<defs>
<clipPath id="clip0">
<rect width="173.1" height="124.56" fill="white" transform="translate(45 54)"/>
</clipPath>
</defs>
</svg>
<p>Извините, рейсов в данном направлении не существует</p>
</div>';
    }

?>
<?php adventure_tours_render_template_part('templates/layout', '', array(
    'content' => $primary_content,
    'sidebar' => $sidebar_content,
)); ?>

<?php get_footer( 'shop' ); ?>
