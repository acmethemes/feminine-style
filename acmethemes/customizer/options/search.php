<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'feminine-style-search', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Search', 'feminine-style' ),
    'panel'             => 'feminine-style-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-search-placeholder]', array(
    'label'		        => esc_html__( 'Search Placeholder', 'feminine-style' ),
    'section'           => 'feminine-style-search',
    'settings'          => 'feminine_style_theme_options[feminine-style-search-placeholder]',
    'type'	  	        => 'text'
) );