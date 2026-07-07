<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 * @since Feminine Style 1.0.0
 */
get_header();

/**
 * feminine_style_action_front_page hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_featured_slider -  10
 * @hooked feminine_style_front_page -  20
 */
do_action( 'feminine_style_action_front_page' );

get_footer();