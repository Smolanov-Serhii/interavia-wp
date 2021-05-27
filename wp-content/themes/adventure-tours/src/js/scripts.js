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







    if ($('.charter-filter').length){
        $('<div class="filter-toback"></div>').prependTo('.charter-filter .wpfMainWrapper');
        $('.charter-filter #wpfBlock_3').appendTo('.charter-filter .filter-toback');
        $('<div class="toback-icon"></div>').appendTo('.charter-filter .filter-toback');
        $('.charter-filter #wpfBlock_4').appendTo('.charter-filter .filter-toback');

        $('<div class="filter-naprav"></div>').prependTo('.charter-filter .wpfMainWrapper');
        $('.charter-filter #wpfBlock_1').appendTo('.charter-filter .filter-naprav');
        $('<div class="direct-icon"></div>').appendTo('.charter-filter .filter-naprav');
        $('.charter-filter #wpfBlock_2').appendTo('.charter-filter .filter-naprav');

        $('#wpfBlock_6 input').trigger('click');
        $('#wpfBlock_6').hide();
    }

    if ($('.term-charternye-rejsy #wpfBlock_8').length){

        $('.term-charternye-rejsy #wpfBlock_8 input').trigger('click');
        $('.term-charternye-rejsy #wpfBlock_8').hide();
    }


    if ($('#newsletterwidget-2').length){
        $('#newsletterwidget-2 input.tnp-email').attr("placeholder", "Ваш E-male");
    }


});