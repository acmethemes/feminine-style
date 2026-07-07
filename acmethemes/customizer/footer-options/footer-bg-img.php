<?php
/*adding sections for footer background image*/
$wp_customize->add_section( 'feminine-style-footer-bg-img', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Background Image', 'feminine-style' ),
    'panel'          => 'feminine-style-footer-panel',
) );

/*footer background image*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-footer-bg-img]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-footer-bg-img'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'feminine_style_theme_options[feminine-style-footer-bg-img]',
        array(
            'label'		=> esc_html__( 'Footer Background Image', 'feminine-style' ),
            'section'   => 'feminine-style-footer-bg-img',
            'settings'  => 'feminine_style_theme_options[feminine-style-footer-bg-img]',
            'type'	  	=> 'image'
        )
    )
);