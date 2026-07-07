<?php
/*adding sections for design options panel*/
$wp_customize->add_section( 'feminine-style-animation', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Animation', 'feminine-style' ),
    'panel'          => 'feminine-style-design-panel'
) );

/*enable disable animation*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-enable-animation'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-animation]', array(
    'label'		        => esc_html__( 'Disable animation', 'feminine-style' ),
    'description'       => esc_html__( 'Check this to disable overall site animation effect provided by theme', 'feminine-style' ),
    'section'           => 'feminine-style-animation',
    'settings'          => 'feminine_style_theme_options[feminine-style-enable-animation]',
    'type'	  	        => 'checkbox'
) );