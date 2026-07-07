<?php
/**
 * Feminine Style Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */

/*
* file for upgrade to pro
*/
require feminine_style_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');

/*
* file for customizer core functions
*/
require feminine_style_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require feminine_style_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function feminine_style_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = feminine_style_get_theme_options();

    /*defaults options*/
    $defaults = feminine_style_get_default_theme_options();

    /*custom controls*/
    require feminine_style_file_directory('acmethemes/customizer/custom-controls.php');
	require feminine_style_file_directory('acmethemes/customizer/customizer-repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
    require feminine_style_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
    require feminine_style_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
    require feminine_style_file_directory('acmethemes/customizer/footer-options/footer-panel.php');

    /*
    * file for design/layout panel
    */
    require feminine_style_file_directory('acmethemes/customizer/design-options/design-panel.php');

	/*
   * file for single panel
   */
	require feminine_style_file_directory('acmethemes/customizer/single-posts/single-post-panel.php');

    /*
     * file for options panel
     */
    require feminine_style_file_directory('acmethemes/customizer/options/options-panel.php');

	/*woocommerce options*/
	if ( feminine_style_is_woocommerce_active() ) :
		require_once feminine_style_file_directory('acmethemes/customizer/wc-options/wc-panel.php');
	endif;

    /*sorting core and widget for ease of theme use*/
    $wp_customize->get_section( 'static_front_page' )->priority = 10;
    
    $feminine_style_home_section = $wp_customize->get_section( 'sidebar-widgets-feminine-style-home' );
    if ( ! empty( $feminine_style_home_section ) ) {
        $feminine_style_home_section->panel         = '';
        $feminine_style_home_section->title         = esc_html__( 'Home Main Content Area ', 'feminine-style' );
        $feminine_style_home_section->priority      = 80;
    }

    /*customizing default colors section and adding new controls-setting too*/
    $wp_customize->get_section( 'colors' )->panel = 'feminine-style-design-panel';
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'feminine-style' );
    $wp_customize->get_section( 'background_image' )->priority = 100;

    /*Background Image*/
    $wp_customize->get_section( 'background_image' )->panel = 'feminine-style-design-panel';
    $wp_customize->get_section( 'background_image' )->priority = 60;

    /*adding header image inside this panel*/
    $wp_customize->get_section( 'header_image' )->panel = 'feminine-style-header-panel';
    $wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'feminine-style' );

    /*TODO 5.8 WP*/
    /*$feminine_style_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
    if ( ! empty( $feminine_style_popup_widget_area ) ) {
        $feminine_style_popup_widget_area->panel = 'feminine-style-header-panel';
        $feminine_style_popup_widget_area->title = esc_html__( 'Popup Widgets', 'feminine-style' );
        $feminine_style_popup_widget_area->priority = 999;

        $feminine_style_popup_widget_title = $wp_customize->get_control( 'feminine_style_theme_options[feminine-style-popup-widget-title]' );
        if ( ! empty( $feminine_style_popup_widget_title ) ) {
            $feminine_style_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
            $feminine_style_popup_widget_title->priority = -1;
        }
    }*/
}
add_action( 'customize_register', 'feminine_style_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function feminine_style_customize_preview_js() {
    wp_enqueue_script( 'feminine-style-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'feminine_style_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function feminine_style_customize_controls_scripts() {
    wp_enqueue_script( 'feminine-style-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'feminine_style_customize_controls_scripts' );