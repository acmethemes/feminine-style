<?php
/*adding footer options panel*/
$wp_customize->add_panel( 'feminine-style-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'feminine-style' ),
    'description'    => esc_html__( 'Customize your awesome site footer ', 'feminine-style' )
) );

/*
* file for background image
*/
require feminine_style_file_directory('acmethemes/customizer/footer-options/footer-bg-img.php');

/*
* file for footer logo options
*/
require feminine_style_file_directory('acmethemes/customizer/footer-options/footer-copyright.php');