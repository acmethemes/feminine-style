<?php
/*active callback function for front-page-header*/
if ( !function_exists('feminine_style_active_callback_front_page_header') ) :
    function feminine_style_active_callback_front_page_header() {
        $feminine_style_customizer_all_values = feminine_style_get_theme_options();
        if( 1 != $feminine_style_customizer_all_values['feminine-style-hide-front-page-content'] ){
            return true;
        }
        return false;
    }
endif;

/*adding sections for front page content */
$wp_customize->add_section( 'feminine-style-front-page-content', array(
    'priority'          => 10,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Front Page Content Options', 'feminine-style' ),
    'panel'             => 'feminine-style-design-panel'

) );

/*hide front page content*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-hide-front-page-content'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox',
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-hide-front-page-content]', array(
    'label'		        => esc_html__( 'Hide Front Page Content', 'feminine-style' ),
    'description'       => esc_html__( 'You may want to hide front page content and want to show only Feature section and Home Widgets. Check this to hide front page content.', 'feminine-style' ),
    'section'           => 'feminine-style-front-page-content',
    'settings'          => 'feminine_style_theme_options[feminine-style-hide-front-page-content]',
    'type'	  	        => 'checkbox'
) );

/*hide front page header*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-hide-front-page-header]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-hide-front-page-header'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox',
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-hide-front-page-header]', array(
    'label'		        => esc_html__( 'Hide Front Page Header', 'feminine-style' ),
    'description'       => esc_html__( 'You may want to hide front page header and want to show only Feature section and Home Widgets. Check this to hide front page Header.', 'feminine-style' ),
    'section'           => 'feminine-style-front-page-content',
    'settings'          => 'feminine_style_theme_options[feminine-style-hide-front-page-header]',
    'type'	  	        => 'checkbox',
    'active_callback'   => 'feminine_style_active_callback_front_page_header'
) );