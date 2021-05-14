jQuery(document).ready(function($) {

    $(".button__content").click(function(){
        $('.button__content').removeClass('button__content__active');
        $(this).addClass('button__content__active');
    });

    $(".main__button__content").click(function(){
        $('.main__button__content').removeClass('main__button__active');
        $(this).addClass('main__button__active');
    });

});