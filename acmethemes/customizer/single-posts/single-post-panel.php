<?php
/*ading theme options panel*/
$wp_customize->add_panel( 'feminine-style-single-post', array(
	'priority'       => 85,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Post Option', 'feminine-style' )
) );

/*
* file for entry meta
*/
require_once feminine_style_file_directory('acmethemes/customizer/single-posts/header-title.php');

/*
* file for feature-image
*/
require_once feminine_style_file_directory('acmethemes/customizer/single-posts/feature-image.php');