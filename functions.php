<?php
/**
 * Feminine Style functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */


/**
 * Default Theme layout options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_theme_layout
 */
if ( ! function_exists( 'feminine_style_get_default_theme_options' ) ) :
	function feminine_style_get_default_theme_options() {

		$default_theme_options = array(

			/*logo and site title*/
			'feminine-style-display-site-logo'             => '',
			'feminine-style-display-site-title'            => 1,
			'feminine-style-display-site-tagline'          => 1,

			/*header height*/
			'feminine-style-header-height'                 => 300,
			'feminine-style-header-image-display'          => 'normal-image',

			/*header top*/
			'feminine-style-enable-header-top'             => '',
			'feminine-style-header-top-menu-display-selection' => 'right',
			'feminine-style-header-top-info-display-selection' => 'left',
			'feminine-style-header-top-social-display-selection' => 'right',

			/*menu options*/
			'feminine-style-menu-display-options'          => 'header-default',
			'feminine-style-enable-sticky'                 => '',
			'feminine-style-menu-right-button-options'     => 'disable',
			'feminine-style-menu-right-button-title'       => esc_html__( 'View More', 'feminine-style' ),
			'feminine-style-menu-right-button-link'        => '',
			'feminine-style-enable-cart-icon'              => '',

			/*feature section options*/
			'feminine-style-enable-feature'                => '',
			'feminine-style-slides-data'                   => '',
			'feminine-style-feature-slider-enable-animation' => 1,
			'feminine-style-feature-slider-display-title'  => 1,
			'feminine-style-feature-slider-display-excerpt' => 1,
			'feminine-style-fs-display-options'            => 'at-feature-banner',
			'feminine-style-fs-image-display-options'      => 'full-screen-bg',
			'feminine-style-feature-slider-text-align'     => 'text-left',
			'feminine-style-slider-scroll-text'            => '',
			'feminine-style-slider-scroll-link'            => '',

			/*basic info*/
			'feminine-style-feature-info-number'           => 4,
			'feminine-style-first-info-icon'               => 'fas fa-calendar',
			'feminine-style-first-info-title'              => esc_html__( 'Send Us a Mail', 'feminine-style' ),
			'feminine-style-first-info-desc'               => esc_html__( 'domain@example.com ', 'feminine-style' ),
			'feminine-style-second-info-icon'              => 'fas fa-map-marker',
			'feminine-style-second-info-title'             => esc_html__( 'Our Location', 'feminine-style' ),
			'feminine-style-second-info-desc'              => esc_html__( 'Elmonte California', 'feminine-style' ),
			'feminine-style-third-info-icon'               => 'fas fa-phone',
			'feminine-style-third-info-title'              => esc_html__( 'Call Us', 'feminine-style' ),
			'feminine-style-third-info-desc'               => esc_html__( '01-23456789-10', 'feminine-style' ),
			'feminine-style-forth-info-icon'               => 'fas fa-envelope-o',
			'feminine-style-forth-info-title'              => esc_html__( 'Office Hours', 'feminine-style' ),
			'feminine-style-forth-info-desc'               => esc_html__( '8 hours per day', 'feminine-style' ),

			/*footer options*/
			'feminine-style-footer-copyright'              => esc_html__( '&copy; All right reserved', 'feminine-style' ),
			'feminine-style-footer-copyright-beside-option' => 'footer-menu',
			'feminine-style-enable-footer-power-text'      => 1,
			'feminine-style-footer-site-info'              => '',
			'feminine-style-footer-bg-img'                 => '',

			/*layout/design options*/
			'feminine-style-pagination-option'             => 'numeric',

			'feminine-style-enable-animation'              => '',

			'feminine-style-single-sidebar-layout'         => 'right-sidebar',
			'feminine-style-front-page-sidebar-layout'     => 'right-sidebar',
			'feminine-style-archive-sidebar-layout'        => 'right-sidebar',

			'feminine-style-blog-archive-img-size'         => 'full',
			'feminine-style-blog-archive-content-from'     => 'excerpt',
			'feminine-style-blog-archive-excerpt-length'   => 42,
			'feminine-style-blog-archive-more-text'        => esc_html__( 'Read More', 'feminine-style' ),

			'feminine-style-primary-color'                 => '#E590B5',
			'feminine-style-header-top-bg-color'           => '#323232',
			'feminine-style-footer-bg-color'               => '#323232',
			'feminine-style-footer-bottom-bg-color'        => '',
			'feminine-style-link-color'                    => '#E590B5',
			'feminine-style-link-hover-color'              => '#D580A5',

			'feminine-style-hide-front-page-content'       => '',
			'feminine-style-hide-front-page-header'        => '',

			/*woocommerce*/
			'feminine-style-wc-shop-archive-sidebar-layout' => 'no-sidebar',
			'feminine-style-wc-product-column-number'      => 4,
			'feminine-style-wc-shop-archive-total-product' => 16,
			'feminine-style-wc-single-product-sidebar-layout' => 'no-sidebar',

			/*single post*/
			'feminine-style-single-header-title'           => esc_html__( 'Blog', 'feminine-style' ),
			'feminine-style-single-img-size'               => 'full',

			/*theme options*/
			'feminine-style-popup-widget-title'            => esc_html__( 'Booking Table', 'feminine-style' ),
			'feminine-style-breadcrumb-options'            => 'hide',
			'feminine-style-search-placeholder'            => esc_html__( 'Search', 'feminine-style' ),
			'feminine-style-social-data'                   => '',

		);
		return apply_filters( 'feminine_style_default_theme_options', $default_theme_options );
	}
endif;

/**
 * Get theme options
 *
 * @since Feminine Style 1.0.0
 *
 * @return array feminine_style_theme_options
 */
if ( ! function_exists( 'feminine_style_get_theme_options' ) ) :
	function feminine_style_get_theme_options() {
		static $cached_theme_options = null;

		// Don't use cache if in Customizer.
		if ( null !== $cached_theme_options && ! is_customize_preview() ) {
			return $cached_theme_options;
		}

		$feminine_style_default_theme_options = feminine_style_get_default_theme_options();
		$feminine_style_get_theme_options     = get_theme_mod( 'feminine_style_theme_options' );

		if ( is_array( $feminine_style_get_theme_options ) ) {
			$cached_theme_options = array_merge( $feminine_style_default_theme_options, $feminine_style_get_theme_options );
		} else {
			$cached_theme_options = $feminine_style_default_theme_options;
		}

		return $cached_theme_options;
	}
endif;

/**
 * Require init.
 */
require trailingslashit( get_template_directory() ) . 'acmethemes/init.php';
