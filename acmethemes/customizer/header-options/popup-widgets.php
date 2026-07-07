<?php
/*Title*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-popup-widget-title]', array(
	'label'		        => esc_html__( 'Popup Main Title', 'feminine-style' ),
	'section'           => 'feminine-style-menu-options',
	'settings'          => 'feminine_style_theme_options[feminine-style-popup-widget-title]',
	'type'	  	        => 'text',
    'active_callback'   => 'feminine_style_menu_right_button_if_booking'
) );