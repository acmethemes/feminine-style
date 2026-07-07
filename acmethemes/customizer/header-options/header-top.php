<?php
/*check if enable header top*/
if ( !function_exists('feminine_style_is_enable_header_top') ) :
	function feminine_style_is_enable_header_top() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 1 == $feminine_style_customizer_all_values['feminine-style-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'feminine-style-header-top-option', array(
    'priority'                  => 10,
    'capability'                => 'edit_theme_options',
    'title'                     => esc_html__( 'Header Top', 'feminine-style' ),
    'panel'                     => 'feminine-style-header-panel',
) );

/*header top enable*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-header-top]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['feminine-style-enable-header-top'],
    'sanitize_callback'         => 'feminine_style_sanitize_checkbox',
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-header-top]', array(
    'label'		                => esc_html__( 'Enable Header Top Options', 'feminine-style' ),
    'section'                   => 'feminine-style-header-top-option',
    'settings'                  => 'feminine_style_theme_options[feminine-style-enable-header-top]',
    'type'	  	                => 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-header-top-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-header-top-message]',
		array(
			'section'           => 'feminine-style-header-top-option',
			'description'       => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','feminine-style')."</h2>",
			'settings'          => 'feminine_style_theme_options[feminine-style-header-top-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'feminine_style_is_enable_header_top'
		)
	)
);

/*Top Menu Display*/
$choices = feminine_style_header_top_display_selection();
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-top-menu-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['feminine-style-header-top-menu-display-selection'],
	'sanitize_callback'         => 'feminine_style_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'feminine-style' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-header-top-menu-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Menu Display', 'feminine-style' ),
	'description'		        => $description,
	'section'                   => 'feminine-style-header-top-option',
	'settings'                  => 'feminine_style_theme_options[feminine-style-header-top-menu-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'feminine_style_is_enable_header_top'
) );

/*Top Info display*/
$description = sprintf( esc_html__( 'Add/Edit Info Items from %1$s here%2$s', 'feminine-style' ), '<a class="at-customizer button button-primary" data-section="feminine-style-feature-info" style="cursor: pointer">','</a>' );
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-top-info-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['feminine-style-header-top-info-display-selection'],
	'sanitize_callback'         => 'feminine_style_sanitize_select'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-header-top-info-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Info Display', 'feminine-style' ),
	'description'		        => $description,
	'section'                   => 'feminine-style-header-top-option',
	'settings'                  => 'feminine_style_theme_options[feminine-style-header-top-info-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'feminine_style_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-header-top-social-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['feminine-style-header-top-social-display-selection'],
	'sanitize_callback'         => 'feminine_style_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'feminine-style' ), '<a class="at-customizer button button-primary" data-section="feminine-style-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-header-top-social-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Social Display', 'feminine-style' ),
	'description'               => $description,
	'section'                   => 'feminine-style-header-top-option',
	'settings'                  => 'feminine_style_theme_options[feminine-style-header-top-social-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'feminine_style_is_enable_header_top'
) );