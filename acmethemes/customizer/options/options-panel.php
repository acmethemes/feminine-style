<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'feminine-style-options', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'feminine-style' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'feminine-style' )
) );

/*
* file for header breadcrumb options
*/
require feminine_style_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require feminine_style_file_directory('acmethemes/customizer/options/search.php');

/*
* file for social options
*/
require feminine_style_file_directory('acmethemes/customizer/options/social-options.php');