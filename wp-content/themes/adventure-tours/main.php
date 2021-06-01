<?php
/**
 * Template Name: Главная
 *
 */

get_header();

?>

<section class="main" style="background-image: url(<?php echo the_field('kartinka_v_shapku', 3311)?>">
    <div class="conteiner column">
        <div class="wrap-h1">
            <h1>
                <?php echo the_field('zagolovok_v_shapku', 3311)?>
            </h1>
        </div>
        <div class="column">
            <?php
            $current_user = wp_get_current_user();
            if (user_can( $current_user, 'administrator' )) {
                $disabled = "enabled";
            } else $disabled = "disabled-item";;
            ?>
            <div class="main__wrap-buttons">
                <div class="main__button" data-count="1">
                    <div class="main__button__content main__button__active">
                        <span>Авиа билеты</span>
                    </div>
                </div>
                <div class="main__button" data-count="2">
                    <div class="main__button__content">
                        <span>Чартерные рейсы</span>
                    </div>
                </div>
                <div class="main__button <?php echo $disabled;?>" data-count="3">
                    <div class="main__button__content">
                        <span>ЖД билеты</span>
                    </div>
                </div>
                <div class="main__button <?php echo $disabled;?>" data-count="4">
                    <div class="main__button__content">
                        <span>Автобусы</span>
                    </div>
                </div>
                <div class="main__button <?php echo $disabled;?>" data-count="5">
                    <div class="main__button__content">
                        <span>Туры</span>
                    </div>
                </div>
            </div>
            <div class="main__wrap-form-list">
                <div class="main__wrap-form avia-filter active-form" data-count="1">
                    <?php echo do_shortcode('[tp_search_shortcodes id="1"]')?>
                </div>
                <div class="main__wrap-form charter-filter" data-count="2">
                    <?php echo do_shortcode('[wpf-filters id=2]')?>
                </div>
                <div class="main__wrap-form jd-filter" data-count="3">

                </div>
                <div class="main__wrap-form bus-filter" data-count="4">
                    <script src="https://c45.travelpayouts.com/content?promo_id=1809&shmarker=321113&trs=130415&tab1=1&tab2=1&tab3=&tab4=&tabDef=1&color_scheme=basic_white&hide_logo=true&hide_logo_tab=true&powered_by=false" charset="utf-8" async="true"></script>
                </div>
                <div class="main__wrap-form turs-filter" data-count="5">
                    <?php echo do_shortcode('[wpf-filters id=5]')?>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="result__tickets">

        <script src="https://c45.travelpayouts.com/content?promo_id=2959&shmarker=321113&trs=130415&bus_from=&bus_to=&bus_sug1=&bus_sug2=&bus_sug3=&bus_sug4=&color_theme=basic_white&show_logo_tab=false&show_logo=false" charset="utf-8" async></script>
    </section>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) { the_post(); ?>
        <div class="page-single">
            <main class="page-single__content" role="main">
                <?php
                $thumb = adventure_tours_get_the_post_thumbnail( null, 'thumb_single' );
                if ( $thumb ) {
                    printf( '<div class="margin-bottom">%s</div>', $thumb );
                }
                the_content();
                ?>
            </main>
        </div>
    <?php } ?>
<?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>
<section class="schedule">
    <div class="conteiner column">
        <div class="schedule__wrap-h2">
            <h2><?php echo the_field('zvgolovok_raspisanie_charternyh_rejsov', 3311)?></h2>
        </div>
        <div class="popular">
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=MOW" charset="utf-8"></script>
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=MSQ" charset="utf-8"></script>
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=SIP" charset="utf-8"></script>
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=LED" charset="utf-8"></script>
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=LED" charset="utf-8"></script>
            <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=321113&campaign_id=100&trs=130415&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&limit=6&powered_by=false&destination=LED" charset="utf-8"></script>
        </div>

        <div class="schedule__wrap__big-but">
<!--            <a href="--><?php //echo the_field('ssylka_na_knopku', 3311)?><!--">-->
<!--                <div class="big__button">-->
<!--                    <span class="big-small__but_content">--><?php //echo the_field('nadpis_na_knopke', 3311)?><!--</span>-->
<!--                </div>-->
<!--            </a>-->
        </div>
    </div>
</section>
<section class="mailing">
    <div class="conteiner flex">
        <div class="wrap__svg-letter">
            <img src="<?php echo get_template_directory_uri()?>/images/letter.svg">
        </div>
        <div class="wrap__tx-form column">
            <?php if ( is_active_sidebar( 'sidebar_mailing' ) ) : ?>
                <div id="mailing" class="mailing">
                    <?php dynamic_sidebar( 'sidebar_mailing' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="schedule">
    <div class="conteiner column">
        <div class="schedule__wrap-h2">
            <h2><?php echo the_field('zagolovok_raspisanie_aviarejsov', 3311)?></h2>
        </div>
    <script src="//tp.media/content?promo_id=2811&shmarker=321113&campaign_id=100&trs=130415&color_button=%23FF0000&target_host=avia.interaviacentr.ru%2Fflights&locale=ru&powered_by=false&airline=&non_direct_flights=true&min_lines=5&border_radius=0&color_background=%23FFFFFF&color_text=%23000000&color_border=%23FFFFFF&destination=BKK&origin=MSQ" charset="utf-8"></script>
        <div class="schedule__wrap__big-but">
<!--            <a href="--><?php //echo the_field('ssylka_na_knopku_raspisanie_aviarejsov', 3311)?><!--">-->
<!--                <div class="big__button">-->
<!--                    <span class="big-small__but_content">--><?php //echo the_field('nadpis_na_knopke_raspisanie_aviarejsov', 3311)?><!--</span>-->
<!--                </div>-->
<!--            </a>-->
        </div>
    </div>
</section>
    <section class="reviewes">
        <h2 class="reviewes__title">
            Отзывы
<!--            --><?php //the_field('zagolovok_bloka_otzyvy', 12);?>
        </h2>
        <div class="reviewes__content container">
            <?php echo do_shortcode('[testimonial_view id="1"]')?>
        </div>
<!--        <div class="reviewes__lnk">-->
<!--            <a class="brown-button" href="--><?php //echo get_home_url(); ?><!--/otzyvy/" target="_blank">Ещё отзывы</a>-->
<!--        </div>-->
    </section>




<?php get_footer(); ?>