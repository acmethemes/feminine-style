<?php
if ( ! function_exists( 'feminine_style_posts_navigation' ) ) :
	/**
	 * Post navigation
	 *
	 * @since Feminine Style 1.0.0
	 *
	 * @return void
	 */
	function feminine_style_posts_navigation() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_pagination_option     = $feminine_style_customizer_all_values['feminine-style-pagination-option'];
		if ( 'default' == $feminine_style_pagination_option ) {
			// Previous/next page navigation.
			the_posts_navigation();
		} else {
			// Previous/next page navigation.
			the_posts_pagination();
		}
	}
endif;
add_action( 'feminine_style_action_posts_navigation', 'feminine_style_posts_navigation' );

/**
 * Feature Options
 *
 * @since Medical Circle 1.0.0
 *
 * @param null
 * @return string
 */
if ( ! function_exists( 'feminine_style_featured_image_display' ) ) :
	function feminine_style_featured_image_display() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_single_image_layout   = $feminine_style_customizer_all_values['feminine-style-single-img-size'];

		return $feminine_style_single_image_layout;
	}
endif;
