<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'feminine-style-wc-panel', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'WooCommerce Options', 'feminine-style' )
) );

/*
* file for shop archive
*/
require_once feminine_style_file_directory('acmethemes/customizer/wc-options/shop-archive.php');

/*
* file for single product
*/
require_once feminine_style_file_directory('acmethemes/customizer/wc-options/single-product.php');