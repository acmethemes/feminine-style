<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'feminine-style-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Featured Section Options', 'feminine-style' ),
    'description'    => esc_html__( 'Customize your awesome site feature section ', 'feminine-style' )
) );

/*
* file for feature section enable
*/
require feminine_style_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require feminine_style_file_directory('acmethemes/customizer/feature-section/feature-slider.php');