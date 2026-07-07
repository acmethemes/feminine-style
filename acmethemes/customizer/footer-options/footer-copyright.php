<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'feminine-style-footer-copyright-option', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Bottom Copyright Section', 'feminine-style' ),
    'panel'                 => 'feminine-style-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-footer-copyright]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['feminine-style-footer-copyright'],
    'sanitize_callback'     => 'wp_kses_post'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-footer-copyright]', array(
    'label'		            => esc_html__( 'Copyright Text', 'feminine-style' ),
    'section'               => 'feminine-style-footer-copyright-option',
    'settings'              => 'feminine_style_theme_options[feminine-style-footer-copyright]',
    'type'	  	            => 'text'
) );

/*footer copyright beside*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-footer-copyright-beside-option]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['feminine-style-footer-copyright-beside-option'],
	'sanitize_callback'     => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_footer_copyright_beside_option();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-footer-copyright-beside-option]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Footer Copyright Beside Option', 'feminine-style' ),
	'section'               => 'feminine-style-footer-copyright-option',
	'settings'              => 'feminine_style_theme_options[feminine-style-footer-copyright-beside-option]',
	'type'	  	            => 'select'
) );

/*footer got to top enable-disable */
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-footer-power-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-enable-footer-power-text'],
	'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-footer-power-text]', array(
	'label'		=> esc_html__( ' Enable Theme Name And Powered By Text ', 'feminine-style' ),
	'section'   => 'feminine-style-footer-copyright-option',
	'settings'  => 'feminine_style_theme_options[feminine-style-enable-footer-power-text]',
	'type'	  	=> 'checkbox'
) );