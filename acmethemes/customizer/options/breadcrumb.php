<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'feminine-style-breadcrumb-options', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Breadcrumb Options', 'feminine-style' ),
    'panel'             => 'feminine-style-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-breadcrumb-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-breadcrumb-options'],
    'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_breadcrumb_options();

$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-breadcrumb-options]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Breadcrumb Options', 'feminine-style' ),
	'description'		 => sprintf( 'Use any one of the plugin for Breadcrumb. %sBreadcrumb NavXT%s or %sYoast SEO%s', '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>','<a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">','</a>' ),
    'section'           => 'feminine-style-breadcrumb-options',
    'settings'          => 'feminine_style_theme_options[feminine-style-breadcrumb-options]',
    'type'	  	        => 'select'
) );
