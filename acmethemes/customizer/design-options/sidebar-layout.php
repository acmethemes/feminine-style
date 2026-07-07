<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'feminine-style-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Page/Post Sidebar Layout', 'feminine-style' ),
    'panel'          => 'feminine-style-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-single-sidebar-layout'],
    'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_sidebar_layout();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-single-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Default Page/Post Sidebar Layout', 'feminine-style' ),
    'description'       => esc_html__( 'Single Page/Post Sidebar', 'feminine-style' ),
    'section'           => 'feminine-style-design-sidebar-layout-option',
    'settings'          => 'feminine_style_theme_options[feminine-style-single-sidebar-layout]',
    'type'	  	        => 'select'
) );