<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'feminine-style-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'feminine-style' ),
	'panel'          => 'feminine-style-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_sidebar_layout();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'feminine-style' ),
	'section'   => 'feminine-style-wc-single-product-options',
	'settings'  => 'feminine_style_theme_options[feminine-style-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );