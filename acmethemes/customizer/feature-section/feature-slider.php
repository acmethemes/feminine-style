<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'feminine-style-feature-page', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Slider Selection', 'feminine-style' ),
    'panel'          => 'feminine-style-feature-panel'
) );

/* feature parent all-slides selection */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Slider Page','feminine-style');
foreach ($slider_pages_obj as $page) {
	$slider_pages[$page->ID] = $page->post_title;
}
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-slides-data]', array(
	'sanitize_callback' => 'feminine_style_sanitize_slider_data',
	'default'           => $defaults['feminine-style-slides-data']
) );
$wp_customize->add_control(
	new Feminine_Style_Repeater_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-slides-data]',
		array(
			'label'                         => esc_html__('Slider Selection','feminine-style'),
			'description'                   => esc_html__('Select Page For Slider','feminine-style'),
			'section'                       => 'feminine-style-feature-page',
			'settings'                      => 'feminine_style_theme_options[feminine-style-slides-data]',
			'repeater_main_label'           => esc_html__('Select Slide of Slider','feminine-style'),
			'repeater_add_control_field'    => esc_html__('Add New Slide','feminine-style'),
		),
		array(
			'selectpage' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Page For Slide', 'feminine-style' ),
				'options'     => $slider_pages
			),
			'button_1_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button One Text', 'feminine-style' ),
			),
			'button_1_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button One Link', 'feminine-style' ),
			),
			'button_2_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button Two Text', 'feminine-style' ),
			),
			'button_2_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button Two Link', 'feminine-style' ),
			)
		)
	)
);

/*enable animation*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-feature-slider-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-feature-slider-enable-animation'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-feature-slider-enable-animation]', array(
    'label'		        => esc_html__( 'Enable Animation', 'feminine-style' ),
    'section'           => 'feminine-style-feature-page',
    'settings'          => 'feminine_style_theme_options[feminine-style-feature-slider-enable-animation]',
    'type'	  	        => 'checkbox',
) );

/*display-title*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-feature-slider-display-title]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-feature-slider-display-title'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-feature-slider-display-title]', array(
    'label'		            => esc_html__( 'Display Title', 'feminine-style' ),
    'section'               => 'feminine-style-feature-page',
    'settings'              => 'feminine_style_theme_options[feminine-style-feature-slider-display-title]',
    'type'	  	            => 'checkbox',
) );

/*display-excerpt*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-feature-slider-display-excerpt]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-feature-slider-display-excerpt'],
	'sanitize_callback'     => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-feature-slider-display-excerpt]', array(
	'label'		            => esc_html__( 'Display Excerpt', 'feminine-style' ),
	'section'               => 'feminine-style-feature-page',
	'settings'              => 'feminine_style_theme_options[feminine-style-feature-slider-display-excerpt]',
	'type'	  	            => 'checkbox',
) );

/*feminine-style-fs-display-options*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-fs-display-options]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['feminine-style-fs-display-options'],
    'sanitize_callback'     => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_fs_display_options();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-fs-display-options]', array(
    'choices'  	            => $choices,
    'label'		            => esc_html__( 'Feature Slider Display Options', 'feminine-style' ),
    'section'               => 'feminine-style-feature-page',
    'settings'              => 'feminine_style_theme_options[feminine-style-fs-display-options]',
    'type'	  	            => 'radio',
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-fs-image-display-options]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['feminine-style-fs-image-display-options'],
    'sanitize_callback'     => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_fs_image_display_options();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-fs-image-display-options]', array(
    'choices'  	            => $choices,
    'label'		            => esc_html__( 'Feature Slider Image Display Options', 'feminine-style' ),
    'section'               => 'feminine-style-feature-page',
    'settings'              => 'feminine_style_theme_options[feminine-style-fs-image-display-options]',
    'type'	  	            => 'radio',
) );

/*Slider Selection Text Align*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-feature-slider-text-align]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-feature-slider-text-align'],
	'sanitize_callback'     => 'feminine_style_sanitize_select',
) );
$choices = feminine_style_slider_text_align();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-feature-slider-text-align]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Slider Text Align', 'feminine-style' ),
	'section'               => 'feminine-style-feature-page',
	'settings'              => 'feminine_style_theme_options[feminine-style-feature-slider-text-align]',
	'type'	  	            => 'select',
) );

/*Slider Scroll Text*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-slider-scroll-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-slider-scroll-text'],
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-slider-scroll-text]', array(
	'label'		    => esc_html__( 'Slider Scroll Text', 'feminine-style' ),
	'section'       => 'feminine-style-feature-page',
	'settings'      => 'feminine_style_theme_options[feminine-style-slider-scroll-text]',
	'type'	  	    => 'text'
) );

/*Slider Scroll Link*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-slider-scroll-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-slider-scroll-link'],
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-slider-scroll-link]', array(
	'label'		    => esc_html__( 'Slider Scroll Link', 'feminine-style' ),
	'section'       => 'feminine-style-feature-page',
	'settings'      => 'feminine_style_theme_options[feminine-style-slider-scroll-link]',
	'type'	  	    => 'url'
) );