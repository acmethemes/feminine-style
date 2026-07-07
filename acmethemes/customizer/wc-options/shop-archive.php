<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'feminine-style-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'feminine-style' ),
	'panel'          => 'feminine-style-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_sidebar_layout();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'feminine-style' ),
	'section'   => 'feminine-style-wc-shop-archive-option',
	'settings'  => 'feminine_style_theme_options[feminine-style-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'feminine-style' ),
	'section'   => 'feminine-style-wc-shop-archive-option',
	'settings'  => 'feminine_style_theme_options[feminine-style-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'feminine-style' ),
	'section'   => 'feminine-style-wc-shop-archive-option',
	'settings'  => 'feminine_style_theme_options[feminine-style-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );