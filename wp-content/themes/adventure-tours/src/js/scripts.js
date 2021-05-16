jQuery(document).ready(function($) {

    $(".button__content").click(function(){
        $('.button__content').removeClass('button__content__active');
        $(this).addClass('button__content__active');
    });

    $(".main__button__content").click(function(){
        $('.main__button__content').removeClass('main__button__active');
        $(this).addClass('main__button__active');
    });

    if ($('.main__wrap-buttons').length){
        $('.main__wrap-buttons .main__button').on('click', function(){
            let ClickedNav = $(this).data('count');
            console.log(ClickedNav);
            let NeedElem = $( ".main__wrap-form-list .main__wrap-form[data-count='"+ClickedNav+"']" );
            $('.main__wrap-buttons .main__button').removeClass('main__button__active');
            $(this).addClass('main__button__active');
            $('.main__wrap-form-list .main__wrap-form').removeClass('active-form');
            NeedElem.addClass('active-form');
        });
    }

    if ($('select').length){
        $(function() {
            if ($('.main__wrap-form-list').length){
                $('.main__wrap-form-list select').selectric();
            }
        });
    }



    if ($('.avia-filter').length){
        $('<div class="filter-toback"></div>').prependTo('.avia-filter .wpfMainWrapper');
        $('.avia-filter #wpfBlock_3').appendTo('.avia-filter .filter-toback');
        $('<div class="toback-icon"></div>').appendTo('.avia-filter .filter-toback');
        $('.avia-filter #wpfBlock_4').appendTo('.avia-filter .filter-toback');

        $('<div class="filter-naprav"></div>').prependTo('.avia-filter .wpfMainWrapper');
        $('.avia-filter #wpfBlock_1').appendTo('.avia-filter .filter-naprav');
        $('<div class="direct-icon"></div>').appendTo('.avia-filter .filter-naprav');
        $('.avia-filter #wpfBlock_2').appendTo('.avia-filter .filter-naprav');

        $('#wpfBlock_6 input').trigger('click');
        $('#wpfBlock_6').hide();
    }



    if ($('.charter-filter').length){
        $('<div class="filter-toback"></div>').prependTo('.charter-filter .wpfMainWrapper');
        $('.charter-filter #wpfBlock_9').appendTo('.charter-filter .filter-toback');
        $('<div class="toback-icon"></div>').appendTo('.charter-filter .filter-toback');
        $('.charter-filter #wpfBlock_10').appendTo('.charter-filter .filter-toback');

        $('<div class="filter-naprav"></div>').prependTo('.charter-filter .wpfMainWrapper');
        $('.charter-filter #wpfBlock_7').appendTo('.charter-filter .filter-naprav');
        $('<div class="direct-icon"></div>').appendTo('.charter-filter .filter-naprav');
        $('.charter-filter #wpfBlock_8').appendTo('.charter-filter .filter-naprav');

        $('#wpfBlock_12 input').trigger('click');
        $('#wpfBlock_12').hide();
    }

    if ($('.jd-filter').length){
        $('<div class="filter-toback"></div>').prependTo('.jd-filter .wpfMainWrapper');
        $('.jd-filter #wpfBlock_15').appendTo('.jd-filter .filter-toback');
        $('<div class="toback-icon"></div>').appendTo('.jd-filter .filter-toback');
        $('.jd-filter #wpfBlock_16').appendTo('.jd-filter .filter-toback');

        $('<div class="filter-naprav"></div>').prependTo('.jd-filter .wpfMainWrapper');
        $('.jd-filter #wpfBlock_13').appendTo('.jd-filter .filter-naprav');
        $('<div class="direct-icon"></div>').appendTo('.jd-filter .filter-naprav');
        $('.jd-filter #wpfBlock_14').appendTo('.jd-filter .filter-naprav');

        $('#wpfBlock_18 input').trigger('click');
        $('#wpfBlock_18').hide();
    }

    if ($('#newsletterwidget-2').length){
        $('#newsletterwidget-2 input.tnp-email').attr("placeholder", "Ваш E-male");
    }
});