<?php
/*Site Logo*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-display-site-logo'],
	'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'feminine-style' ),
	'section'   => 'title_tagline',
	'settings'  => 'feminine_style_theme_options[feminine-style-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-display-site-title'],
	'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'feminine-style' ),
	'section'   => 'title_tagline',
	'settings'  => 'feminine_style_theme_options[feminine-style-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-display-site-tagline'],
	'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'feminine-style' ),
	'section'   => 'title_tagline',
	'settings'  => 'feminine_style_theme_options[feminine-style-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );