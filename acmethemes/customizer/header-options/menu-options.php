<?php
/*check for feminine-style-menu-right-button-options*/
if ( !function_exists('feminine_style_menu_right_button_if_not_disable') ) :
	function feminine_style_menu_right_button_if_not_disable() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 'disable' != $feminine_style_customizer_all_values['feminine-style-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('feminine_style_menu_right_button_if_booking') ) :
	function feminine_style_menu_right_button_if_booking() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 'booking' == $feminine_style_customizer_all_values['feminine-style-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('feminine_style_menu_right_button_if_link') ) :
	function feminine_style_menu_right_button_if_link() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 'link' == $feminine_style_customizer_all_values['feminine-style-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

/*Button Link Options*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-menu-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-menu-display-options'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_menu_display_options();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-menu-display-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Menu Display Options', 'feminine-style' ),
	'section'       => 'feminine-style-menu-options',
	'settings'      => 'feminine_style_theme_options[feminine-style-menu-display-options]',
	'type'	  	    => 'select'
) );

/*Menu Section*/
$wp_customize->add_section( 'feminine-style-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Menu Options', 'feminine-style' ),
    'panel'          => 'feminine-style-header-panel'
) );


/*enable sticky*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-enable-sticky'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );

$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-sticky]', array(
    'label'		=> esc_html__( 'Enable Sticky Menu', 'feminine-style' ),
    'section'   => 'feminine-style-menu-options',
    'settings'  => 'feminine_style_theme_options[feminine-style-enable-sticky]',
    'type'	  	=> 'checkbox'
) );

if( feminine_style_is_woocommerce_active() ){
	/*enable cart*/
	$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-cart-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['feminine-style-enable-cart-icon'],
		'sanitize_callback' => 'feminine_style_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-cart-icon]', array(
		'label'		=> esc_html__( 'Enable Cart', 'feminine-style' ),
		'section'   => 'feminine-style-menu-options',
		'settings'  => 'feminine_style_theme_options[feminine-style-enable-cart-icon]',
		'type'	  	=> 'checkbox'
	) );
}

/*Button Right Message*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-menu-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-menu-right-button-message]',
		array(
			'section'       => 'feminine-style-menu-options',
			'description'   => "<hr /><h2>".esc_html__('Special Button On Menu Right','feminine-style')."</h2>",
			'settings'      => 'feminine_style_theme_options[feminine-style-menu-right-button-message]',
			'type'	  	    => 'message'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-menu-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-menu-right-button-options'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_menu_right_button_link_options();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-menu-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Button Options', 'feminine-style' ),
	'section'       => 'feminine-style-menu-options',
	'settings'      => 'feminine_style_theme_options[feminine-style-menu-right-button-options]',
	'type'	  	    => 'select'
) );

/*Button title*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-menu-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-menu-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-menu-right-button-title]', array(
	'label'		        => esc_html__( 'Button Title', 'feminine-style' ),
	'section'           => 'feminine-style-menu-options',
	'settings'          => 'feminine_style_theme_options[feminine-style-menu-right-button-title]',
	'type'	  	        => 'text',
	'active_callback'   => 'feminine_style_menu_right_button_if_not_disable'
) );

/*Button Right booking Message*/
$wp_customize->add_setting('feminine_style_theme_options[feminine-style-menu-right-button-booking-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));
$description = sprintf( esc_html__( '%1$sAdd Popup Widget from here%2$s ', 'feminine-style' ), '<a class="at-customizer" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Feminine_Style_Customize_Message_Control(
		$wp_customize,
		'feminine_style_theme_options[feminine-style-menu-right-button-booking-message]',
		array(
			'section'           => 'feminine-style-menu-options',
			'description'       => $description,
			'settings'          => 'feminine_style_theme_options[feminine-style-menu-right-button-booking-message]',
			'type'	  	        => 'message',
            'priority'	  	    => 100,
			'active_callback'   => 'feminine_style_menu_right_button_if_booking'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-menu-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-menu-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-menu-right-button-link]', array(
	'label'		        => esc_html__( 'Button Link', 'feminine-style' ),
	'section'           => 'feminine-style-menu-options',
	'settings'          => 'feminine_style_theme_options[feminine-style-menu-right-button-link]',
	'type'	  	        => 'url',
	'active_callback'   => 'feminine_style_menu_right_button_if_link'
) );