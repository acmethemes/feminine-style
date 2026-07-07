<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_featured_slider' ) ) :

	function feminine_style_featured_slider() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();

		$feminine_style_enable_feature = $feminine_style_customizer_all_values['feminine-style-enable-feature'];
		if ( is_front_page() && 1 == $feminine_style_enable_feature && ! is_home() ) :
			do_action( 'feminine_style_action_feature_slider' );

		endif;
	}
endif;
add_action( 'feminine_style_action_front_page', 'feminine_style_featured_slider', 10 );

if ( ! function_exists( 'feminine_style_front_page' ) ) :

	function feminine_style_front_page() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();

		$feminine_style_hide_front_page_content = $feminine_style_customizer_all_values['feminine-style-hide-front-page-content'];

		/*show widget in front page, now user are not force to use front page*/
		if ( is_active_sidebar( 'feminine-style-home' ) && ! is_home() ) {
			dynamic_sidebar( 'feminine-style-home' );
		}
		if ( 'posts' == get_option( 'show_on_front' ) ) {
			include get_home_template();
		} elseif ( 1 != $feminine_style_hide_front_page_content ) {
				include get_page_template();
		}
	}
endif;
add_action( 'feminine_style_action_front_page', 'feminine_style_front_page', 20 );
