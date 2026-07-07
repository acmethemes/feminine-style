<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'feminine-style-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'feminine-style' ),
    'panel'          => 'feminine-style-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-front-page-sidebar-layout'],
    'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_sidebar_layout();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-front-page-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Front/Home Sidebar Layout', 'feminine-style' ),
    'section'           => 'feminine-style-front-page-sidebar-layout',
    'settings'          => 'feminine_style_theme_options[feminine-style-front-page-sidebar-layout]',
    'type'	  	        => 'select'
) );