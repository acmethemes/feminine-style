<?php
/*adding sections for feature image selection*/
$wp_customize->add_section( 'feminine-style-single-feature-image', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Image Option', 'feminine-style' ),
    'panel'          => 'feminine-style-single-post'
) );

/*single image size*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-single-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-single-img-size'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_get_image_sizes_options(1);
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-single-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Size', 'feminine-style' ),
	'section'   => 'feminine-style-single-feature-image',
	'settings'  => 'feminine_style_theme_options[feminine-style-single-img-size]',
	'type'	  	=> 'select'
) );