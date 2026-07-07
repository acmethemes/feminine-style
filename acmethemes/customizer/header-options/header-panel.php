<?php
/*adding header options panel*/
$wp_customize->add_panel( 'feminine-style-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Options', 'feminine-style' ),
    'description'    => esc_html__( 'Customize your awesome site header ', 'feminine-style' )
) );

/*
* file for header top options
*/
require feminine_style_file_directory('acmethemes/customizer/header-options/header-top.php');

/*
* file for feature info
*/
require feminine_style_file_directory('acmethemes/customizer/header-options/feature-info.php');

/*
* file for header logo options
*/
require feminine_style_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
 * file for menu options
*/
require feminine_style_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
* file for booking form
*/
require feminine_style_file_directory('acmethemes/customizer/header-options/popup-widgets.php');

/* feature section height*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-height]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-header-height'],
    'sanitize_callback' => 'feminine_style_sanitize_number'
) );

$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-header-height]', array(
    'type'              => 'range',
    'priority'          => 100,
    'section'           => 'header_image',
    'label'		        => esc_html__( 'Inner Page Header Section Height', 'feminine-style' ),
    'description'       => esc_html__( 'Control the height of Header section. The minimum height is 100px and maximium height is 500px', 'feminine-style' ),
    'input_attrs'       => array(
        'min'           => 100,
        'max'           => 500,
        'step'          => 1,
        'class'         => 'feminine-style-header-height',
        'style'         => 'color: #0a0',
    ),
    'active_callback'   => 'feminine_style_if_header_bg_image'
) );

/*Header Image Display*/
$choices = feminine_style_header_image_display();
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-image-display]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['feminine-style-header-image-display'],
	'sanitize_callback'         => 'feminine_style_sanitize_select'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-header-image-display]', array(
	'choices'  	                => $choices,
	'priority'                  => 1,
	'label'		                => esc_html__( 'Header Image Display', 'feminine-style' ),
	'section'                   => 'header_image',
	'settings'                  => 'feminine_style_theme_options[feminine-style-header-image-display]',
	'type'	  	                => 'select'
) );

/*check if header bg*/
if ( !function_exists('feminine_style_if_header_bg_image') ) :
	function feminine_style_if_header_bg_image() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 'bg-image' == $feminine_style_customizer_all_values['feminine-style-header-image-display'] ){
			return true;
		}
		return false;
	}
endif;