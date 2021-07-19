<?php
/**
 * Page header template part for the search field rendering.
 *
 * @author    Themedelight
 * @package   Themedelight/AdventureTours
 * @version   1.0.0
 */

if ( ! adventure_tours_get_option( 'show_header_search' ) ) {
	return '';
}
// as in this case link tag will be placed to body withou property='stylesheet' attribute
// that makes html validation error
// wp_enqueue_style( 'magnific-popup' );
// wp_enqueue_script( 'magnific-popup' );
TdJsClientScript::addScript( 'initSerchFormPopup', 'Theme.initSerchFormPopup('. wp_json_encode(array(
	'placeholder_text' => esc_html__( 'Type in your request...', 'adventure-tours' ),
)).');' );
?>
<!--<div class="header__info__item header__info__item--delimiter header__info__item--search"><a href="#search-form-header" class="popup-search-form" data-effect="mfp-zoom-in"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--            <path d="M15.8047 14.862L11.2547 10.312C12.1361 9.22334 12.6667 7.84 12.6667 6.33334C12.6667 2.84134 9.82535 0 6.33334 0C2.84132 0 0 2.84131 0 6.33331C0 9.82531 2.84136 12.6667 6.33337 12.6667C7.84003 12.6667 9.22338 12.136 10.312 11.2547L14.8621 15.8047C14.9921 15.9347 15.1627 16 15.3334 16C15.5041 16 15.6748 15.9347 15.8048 15.8047C16.0654 15.544 16.0654 15.1227 15.8047 14.862ZM6.33337 11.3333C3.57602 11.3333 1.33335 9.09066 1.33335 6.33331C1.33335 3.57597 3.57602 1.33331 6.33337 1.33331C9.09073 1.33331 11.3334 3.57597 11.3334 6.33331C11.3334 9.09066 9.0907 11.3333 6.33337 11.3333Z" fill="white"/>-->
<!--        </svg>-->
<!--    </a></div>-->
<!---->
<!--<div id="search-form-header" class="search-form-popup search-form-popup--hide mfp-with-anim mfp-hide ">-->
<!--	--><?php //get_search_form(); ?>
<!--</div>-->
