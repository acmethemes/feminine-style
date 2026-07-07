<?php
/*adding sections for header title*/
$wp_customize->add_section( 'feminine-style-single-header-title', array(
	'priority'              => 20,
	'capability'            => 'edit_theme_options',
	'title'                 => esc_html__( 'Single Header Title', 'feminine-style' ),
	'panel'                 => 'feminine-style-single-post',
) );

/*header title*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-single-header-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-single-header-title'],
	'sanitize_callback'     => 'sanitize_text_field'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-single-header-title]', array(
	'label'		            => esc_html__( 'Header Title', 'feminine-style' ),
	'section'               => 'feminine-style-single-header-title',
	'settings'              => 'feminine_style_theme_options[feminine-style-single-header-title]',
	'type'	  	            => 'text'
) );