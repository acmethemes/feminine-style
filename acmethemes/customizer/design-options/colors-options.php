<?php
/*Primary color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'feminine_style_theme_options[feminine-style-primary-color]',
        array(
            'label'		=> esc_html__( 'Primary Color', 'feminine-style' ),
            'section'   => 'colors',
            'settings'  => 'feminine_style_theme_options[feminine-style-primary-color]',
            'type'	  	=> 'color'
        ) )
);

/*Header TOP color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-top-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-header-top-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'feminine_style_theme_options[feminine-style-header-top-bg-color]',
        array(
            'label'		=> esc_html__( 'Header Top Background Color', 'feminine-style' ),
            'description'=> esc_html__( 'Also used as secondary color', 'feminine-style' ),
            'section'   => 'colors',
            'settings'  => 'feminine_style_theme_options[feminine-style-header-top-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/* Footer Background Color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-footer-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-footer-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'feminine_style_theme_options[feminine-style-footer-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Background Color', 'feminine-style' ),
            'section'   => 'colors',
            'settings'  => 'feminine_style_theme_options[feminine-style-footer-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Footer Bottom Background Color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-footer-bottom-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-footer-bottom-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'feminine_style_theme_options[feminine-style-footer-bottom-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Bottom Background Color', 'feminine-style' ),
            'section'   => 'colors',
            'settings'  => 'feminine_style_theme_options[feminine-style-footer-bottom-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Link color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-link-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-link-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-link-color]', array(
	'label'		=> esc_html__( 'Link Color', 'feminine-style' ),
	'section'   => 'colors',
	'settings'  => 'feminine_style_theme_options[feminine-style-link-color]',
	'type'	  	=> 'color'
) );

/*Link Hover color*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-link-hover-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-link-hover-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-link-hover-color]', array(
	'label'		=> esc_html__( 'Link Hover Color', 'feminine-style' ),
	'section'   => 'colors',
	'settings'  => 'feminine_style_theme_options[feminine-style-link-hover-color]',
	'type'	  	=> 'color'
) );