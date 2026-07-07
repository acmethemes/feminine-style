<?php
/**
 * Header Image Display Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_menu_display_options
 *
 */
if ( !function_exists('feminine_style_menu_display_options') ) :
	function feminine_style_menu_display_options() {
		$feminine_style_menu_display_options =  array(
			'header-default'      => esc_html__( 'Default', 'feminine-style' ),
			'menu-classic'      => esc_html__( 'Classic', 'feminine-style' ),
		);
		return apply_filters( 'feminine_style_menu_display_options', $feminine_style_menu_display_options );
	}
endif;

/**
 * Menu and Logo Display Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_header_image_display
 *
 */
if ( !function_exists('feminine_style_header_image_display') ) :
	function feminine_style_header_image_display() {
		$feminine_style_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'feminine-style' ),
			'bg-image'          => esc_html__( 'Background Image', 'feminine-style' ),
			'normal-image'      => esc_html__( 'Normal Image', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_header_image_display', $feminine_style_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_menu_right_button_link_options
 *
 */
if ( !function_exists('feminine_style_menu_right_button_link_options') ) :
	function feminine_style_menu_right_button_link_options() {
		$feminine_style_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'feminine-style' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'feminine-style' ),
			'link'          => esc_html__( 'One Link', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_menu_right_button_link_options', $feminine_style_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_header_top_display_selection
 *
 */
if ( !function_exists('feminine_style_header_top_display_selection') ) :
	function feminine_style_header_top_display_selection() {
		$feminine_style_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'feminine-style' ),
			'left'          => esc_html__( 'on Top Left', 'feminine-style' ),
			'right'         => esc_html__( 'on Top Right', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_header_top_display_selection', $feminine_style_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $feminine_style_slider_text_align
 *
 */
if ( !function_exists('feminine_style_slider_text_align') ) :
	function feminine_style_slider_text_align() {
		$feminine_style_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'feminine-style' ),
			'text-left'     => esc_html__( 'Left', 'feminine-style' ),
			'text-right'    => esc_html__( 'Right', 'feminine-style' ),
			'text-center'   => esc_html__( 'Center', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_slider_text_align', $feminine_style_slider_text_align );
	}
endif;

/**
 * Featured Slider Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_fs_display_options
 *
 */
if ( !function_exists('feminine_style_fs_display_options') ) :
	function feminine_style_fs_display_options() {
		$feminine_style_fs_image_display_options =  array(
			'at-feature-banner' => esc_html__( 'Feature Banner', 'feminine-style' ),
			'at-normal-banner' => esc_html__( 'Normal Banner', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_fs_display_options', $feminine_style_fs_image_display_options );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_fs_image_display_options
 *
 */
if ( !function_exists('feminine_style_fs_image_display_options') ) :
	function feminine_style_fs_image_display_options() {
		$feminine_style_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'feminine-style' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_fs_image_display_options', $feminine_style_fs_image_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_feature_info_number
 *
 */
if ( !function_exists('feminine_style_feature_info_number') ) :
	function feminine_style_feature_info_number() {
		$feminine_style_feature_info_number =  array(
			1               => esc_html__( '1', 'feminine-style' ),
			2               => esc_html__( '2', 'feminine-style' ),
			3               => esc_html__( '3', 'feminine-style' ),
			4               => esc_html__( '4', 'feminine-style' ),
		);
		return apply_filters( 'feminine_style_feature_info_number', $feminine_style_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_footer_copyright_beside_option
 *
 */
if ( !function_exists('feminine_style_footer_copyright_beside_option') ) :
	function feminine_style_footer_copyright_beside_option() {
		$feminine_style_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'feminine-style' ),
			'social'        => esc_html__( 'Social Links', 'feminine-style' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_footer_copyright_beside_option', $feminine_style_footer_copyright_beside_option );
	}
endif;

/**
 * Button design options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_button_design
 *
 */
if ( !function_exists('feminine_style_button_design') ) :
	function feminine_style_button_design() {
		$feminine_style_button_design =  array(
			'rectangle'         => esc_html__( 'Rectangle', 'feminine-style' ),
			'rounded-rectangle' => esc_html__( 'Rounded Rectangle', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_button_design', $feminine_style_button_design );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_sidebar_layout
 *
 */
if ( !function_exists('feminine_style_sidebar_layout') ) :
    function feminine_style_sidebar_layout() {
        $feminine_style_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'feminine-style' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'feminine-style' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'feminine-style' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'feminine-style' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'feminine-style' )
        );
        return apply_filters( 'feminine_style_sidebar_layout', $feminine_style_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_blog_archive_feature_layout
 *
 */
if ( !function_exists('feminine_style_blog_archive_feature_layout') ) :
    function feminine_style_blog_archive_feature_layout() {
        $feminine_style_blog_archive_feature_layout =  array(
            'left-image'    => esc_html__( 'Show Image', 'feminine-style' ),
            'no-image'      => esc_html__( 'No Image', 'feminine-style' )
        );
        return apply_filters( 'feminine_style_blog_archive_feature_layout', $feminine_style_blog_archive_feature_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_blog_archive_content_from
 *
 */
if ( !function_exists('feminine_style_blog_archive_content_from') ) :
	function feminine_style_blog_archive_content_from() {
		$feminine_style_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'feminine-style' ),
			'content'    => esc_html__( 'Content', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_blog_archive_content_from', $feminine_style_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_get_image_sizes_options
 *
 */
if ( !function_exists('feminine_style_get_image_sizes_options') ) :
	function feminine_style_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'feminine-style' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'feminine-style' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'feminine_style_get_image_sizes_options', $choices );
	}
endif;

/**
 * Pagination Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array feminine_style_pagination_options
 *
 */
if ( !function_exists('feminine_style_pagination_options') ) :
	function feminine_style_pagination_options() {
		$feminine_style_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'feminine-style' ),
			'numeric'  => esc_html__( 'Numeric', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_pagination_options', $feminine_style_pagination_options );
	}
endif;

/**
 * Breadcrumb Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array feminine_style_breadcrumb_options
 *
 */
if ( !function_exists('feminine_style_breadcrumb_options') ) :
	function feminine_style_breadcrumb_options() {
		$feminine_style_breadcrumb_options =  array(
			'hide'  => esc_html__( 'Hide', 'feminine-style' ),
		);
		if ( function_exists('yoast_breadcrumb') ) {
			$feminine_style_breadcrumb_options['yoast'] = esc_html__( 'Yoast', 'feminine-style' );
		}
		if ( function_exists('bcn_display') ) {
			$feminine_style_breadcrumb_options['bcn'] = esc_html__( 'Breadcrumb NavXT', 'feminine-style' );
		}
		return apply_filters( 'feminine_style_pagination_options', $feminine_style_breadcrumb_options );
	}
endif;