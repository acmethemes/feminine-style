<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'feminine-style-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Category/Archive Sidebar Layout', 'feminine-style' ),
    'panel'          => 'feminine-style-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-archive-sidebar-layout'],
    'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_sidebar_layout();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-archive-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Category/Archive Sidebar Layout', 'feminine-style' ),
    'description'       => esc_html__( 'Sidebar Layout for listing pages like category, author etc', 'feminine-style' ),
    'section'           => 'feminine-style-archive-sidebar-layout',
    'settings'          => 'feminine_style_theme_options[feminine-style-archive-sidebar-layout]',
    'type'	  	        => 'select'
) );