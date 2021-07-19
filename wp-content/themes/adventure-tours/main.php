<?php
/**
 * Template Name: Главная
 *
 */

get_header();

?>

    <section class="main">
        <div class="main__bg">
            <picture>
                <source media="(min-width: 500px)"
                        srcset="<?php the_field('kartinka_v_shapku', 3311)?>">
                <img src="<?php the_field('kartinka_v_shapku_mobajl', 3311)?>" alt="">
            </picture>
        </div>
        <div class="conteiner column">
            <div class="wrap-h1">
                <h1>
                    <?php echo the_field('zagolovok_v_shapku', 3311) ?>
                </h1>
            </div>
            <div class="column">
                <?php
                $current_user = wp_get_current_user();
                if (user_can($current_user, 'administrator')) {
                    $disabled = "enabled";
                } else $disabled = "disabled-item";;
                ?>
                <div class="main__wrap-buttons">
                    <div class="main__button" data-count="2">
                        <div class="main__button__content main__button__active">
                            <span>Чартерные рейсы</span>
                        </div>
                    </div>
                    <div class="main__button" data-count="1">
                        <div class="main__button__content">
                            <span>Авиа билеты</span>
                        </div>
                    </div>
                    <div class="main__button <?php echo $disabled; ?>" data-count="3">
                        <div class="main__button__content">
                            <span>ЖД билеты</span>
                        </div>
                    </div>
                    <div class="main__button <?php echo $disabled; ?>" data-count="4">
                        <div class="main__button__content">
                            <span>Автобусы</span>
                        </div>
                    </div>
                    <div class="main__button <?php echo $disabled; ?>" data-count="5">
                        <div class="main__button__content">
                            <span>Туры</span>
                        </div>
                    </div>
                </div>
                <div class="main__wrap-form-list">
                    <div class="main__wrap-form avia-filter" data-count="1">
                        <?php echo do_shortcode('[tp_search_shortcodes id="1"]') ?>
                    </div>
                    <div class="main__wrap-form charter-filter active-form" data-count="2">
                        <?php echo do_shortcode('[wpf-filters id=2]') ?>
                    </div>
                    <div class="main__wrap-form jd-filter" data-count="3">

                    </div>
                    <div class="main__wrap-form bus-filter" data-count="4">
                        <script src="https://c45.travelpayouts.com/content?promo_id=1809&shmarker=321113&trs=130415&tab1=1&tab2=1&tab3=&tab4=&tabDef=1&color_scheme=basic_white&hide_logo=true&hide_logo_tab=true&powered_by=false"
                                charset="utf-8" async="true"></script>
                    </div>
                    <div class="main__wrap-form turs-filter" data-count="5">
                        <?php echo do_shortcode('[wpf-filters id=5]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="result__tickets">

        <script src="https://c45.travelpayouts.com/content?promo_id=2959&shmarker=321113&trs=130415&bus_from=&bus_to=&bus_sug1=&bus_sug2=&bus_sug3=&bus_sug4=&color_theme=basic_white&show_logo_tab=false&show_logo=false"
                charset="utf-8" async></script>
    </section>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="page-single">
            <main class="page-single__content" role="main">
                <?php
                $thumb = adventure_tours_get_the_post_thumbnail(null, 'thumb_single');
                if ($thumb) {
                    printf('<div class="margin-bottom">%s</div>', $thumb);
                }
                the_content();
                ?>
            </main>
        </div>
    <?php } ?>
<?php else : ?>
    <?php get_template_part('content', 'none'); ?>
<?php endif; ?>
    <section class="schedule">
        <div class="conteiner column">
            <div class="schedule__wrap-h2">
                <h2><?php echo the_field('zvgolovok_raspisanie_charternyh_rejsov', 3311) ?></h2>
            </div>
            <div class="schedule__charter">
                <?php
                $products = get_posts($product_args);
                $queried_object = get_queried_object();
                $term_id = $queried_object->term_id;
                $args = array(
                    'showposts' => 10,
                    'post_type' => 'product',
                    'product_cat' => '',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $query = new WP_Query($args);
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="schedule__charter-item">
                        <div class="part-block">
                            <div class="time">
                                <div class="time-start">
                                    <?php echo $product->get_attribute('vremya-otbytiya'); ?>
                                </div>
                                &nbsp;→&nbsp;
                                <div class="time-end">
                                    <?php echo $product->get_attribute('vremya-pribytiya'); ?>
                                </div>
                            </div>
                            <div class="company">
                                <?php the_post_thumbnail(); ?>
                                <?php echo $product->get_attribute('aviakompaniya'); ?>
                            </div>
                        </div>
                        <div class="abr">
                            <div class="top">
                                <div class="start-abr">
                                    <?php echo $product->get_attribute('iso-start'); ?>
                                </div>
                                &nbsp-&nbsp
                                <div class="end-abr">
                                    <?php echo $product->get_attribute('iso-end'); ?>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="start-abr">
                                    <?php echo $product->get_attribute('otkuda'); ?>
                                </div>
                                &nbsp-&nbsp
                                <div class="end-abr">
                                    <?php echo $product->get_attribute('kuda'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="right-block">
                            <div class="day">
                            <span class="day-item">
                                <?php echo $product->get_attribute('den-nedeli'); ?>
                            </span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="schedule__charter-lnk">
                                подробнее
                            </a>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <section class="schedule">
        <div class="conteiner column">
            <div class="schedule__wrap-h2">
                <h2><?php echo the_field('zagolovok_raspisanie_aviarejsov', 3311) ?></h2>
            </div>
            <script src="//tp.media/content?promo_id=2811&shmarker=321113&campaign_id=100&trs=130415&color_button=%23FF0000&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&powered_by=false&airline=&non_direct_flights=true&min_lines=5&border_radius=0&color_background=%23FFFFFF&color_text=%23000000&color_border=%23FFFFFF&destination=BKK&origin=MSQ"
                    charset="utf-8"></script>
        </div>
    </section>
    <section class="mailing">
        <div class="conteiner flex">
            <div class="wrap__svg-letter">
                <img src="<?php echo get_template_directory_uri() ?>/images/letter.svg">
            </div>
            <div class="wrap__tx-form column">
                <?php if (is_active_sidebar('sidebar_mailing')) : ?>
                    <div id="mailing" class="mailing">
                        <?php dynamic_sidebar('sidebar_mailing'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="reviewes">
        <h2 class="reviewes__title">
            Отзывы
        </h2>
        <div class="reviewes__content conteiner">
            <?php echo do_shortcode('[testimonial_view id="1"]') ?>
        </div>
    </section>
<!--    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>-->

<?php get_footer(); ?>