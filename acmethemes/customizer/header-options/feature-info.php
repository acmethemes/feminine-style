<?php
/*adding sections for feature info options */
$wp_customize->add_section( 'feminine-style-feature-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Info', 'feminine-style' ),
	'panel'          => 'feminine-style-header-panel'
) );

/* basic info number*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-feature-info-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-feature-info-number'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_feature_info_number();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-feature-info-number]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Number Display', 'feminine-style' ),
	'section'           => 'feminine-style-feature-info',
	'settings'          => 'feminine_style_theme_options[feminine-style-feature-info-number]',
	'type'	  	        => 'select',
) );

/*first info*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-first-info-message]',
		array(
			'section'      => 'feminine-style-feature-info',
			'description'  => "<hr /><h2>".esc_html__('First Info','feminine-style')."</h2>",
			'settings'     => 'feminine_style_theme_options[feminine-style-first-info-message]',
			'type'	  	   => 'message',
		)
	)
);
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-first-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-first-info-icon'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Feminine_Style_Customize_Icons_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-first-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'feminine-style' ),
			'section'       => 'feminine-style-feature-info',
			'settings'      => 'feminine_style_theme_options[feminine-style-first-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-first-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-first-info-title'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-first-info-title]', array(
	'label'		            => esc_html__( 'Title', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-first-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-first-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-first-info-desc'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-first-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-first-info-desc]',
	'type'	  	            => 'text'
) );

/*Second Info*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-second-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-second-info-message]',
		array(
			'section'       => 'feminine-style-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Second Info','feminine-style')."</h2>",
			'settings'      => 'feminine_style_theme_options[feminine-style-second-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-second-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-second-info-icon'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Feminine_Style_Customize_Icons_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-second-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'feminine-style' ),
			'section'       => 'feminine-style-feature-info',
			'settings'      => 'feminine_style_theme_options[feminine-style-second-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-second-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-second-info-title'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-second-info-title]', array(
	'label'		            => esc_html__( 'Title', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-second-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-second-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-second-info-desc'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-second-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-second-info-desc]',
	'type'	  	            => 'text'
) );

/*third info*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-third-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-third-info-message]',
		array(
			'section'       => 'feminine-style-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Third Info','feminine-style')."</h2>",
			'settings'      => 'feminine_style_theme_options[feminine-style-third-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-third-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-third-info-icon'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Feminine_Style_Customize_Icons_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-third-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'feminine-style' ),
			'section'       => 'feminine-style-feature-info',
			'settings'      => 'feminine_style_theme_options[feminine-style-third-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-third-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-third-info-title'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-third-info-title]', array(
	'label'		            => esc_html__( 'Title', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-third-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-third-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-third-info-desc'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-third-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-third-info-desc]',
	'type'	  	            => 'text'
) );

/*forth info*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-forth-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-forth-info-message]',
		array(
			'section'       => 'feminine-style-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Forth Info','feminine-style')."</h2>",
			'settings'      => 'feminine_style_theme_options[feminine-style-forth-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-forth-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-forth-info-icon'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Feminine_Style_Customize_Icons_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-forth-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'feminine-style' ),
			'section'       => 'feminine-style-feature-info',
			'settings'      => 'feminine_style_theme_options[feminine-style-forth-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-forth-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-forth-info-title'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-forth-info-title]', array(
	'label'		            => esc_html__( 'Title', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-forth-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-forth-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-forth-info-desc'],
	'sanitize_callback'     => 'feminine_style_sanitize_allowed_html'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-forth-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'feminine-style' ),
	'section'               => 'feminine-style-feature-info',
	'settings'              => 'feminine_style_theme_options[feminine-style-forth-info-desc]',
	'type'	  	            => 'text'
) );