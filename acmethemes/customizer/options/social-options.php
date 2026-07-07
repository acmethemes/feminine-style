<?php
/*adding sections for header social options */
$wp_customize->add_section( 'feminine-style-social-options', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Social Options', 'feminine-style' ),
    'panel'                 => 'feminine-style-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-social-data]', array(
	'sanitize_callback'     => 'feminine_style_sanitize_social_data',
	'default'               => $defaults['feminine-style-social-data']
) );
$wp_customize->add_control(
	new Feminine_Style_Repeater_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-social-data]',
		array(
			'label'                         => esc_html__('Social Options Selection','feminine-style'),
			'description'                   => esc_html__('Select Social Icons and enter link','feminine-style'),
			'section'                       => 'feminine-style-social-options',
			'settings'                      => 'feminine_style_theme_options[feminine-style-social-data]',
			'repeater_main_label'           => esc_html__('Social Icon','feminine-style'),
			'repeater_add_control_field'    => esc_html__('Add New Icon','feminine-style')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'feminine-style' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'feminine-style' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'feminine-style' ),
			)
		)
	)
);