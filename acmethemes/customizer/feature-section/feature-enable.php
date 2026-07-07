<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'feminine-style-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Enable Feature Section', 'feminine-style' ),
    'panel'          => 'feminine-style-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-enable-feature'],
    'sanitize_callback' => 'feminine_style_sanitize_checkbox'
) );

$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-enable-feature]', array(
    'label'		        => esc_html__( 'Enable Feature Section', 'feminine-style' ),
    'description'	    => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Slider and Feature Column.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'feminine-style' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'           => 'feminine-style-enable-feature',
    'settings'          => 'feminine_style_theme_options[feminine-style-enable-feature]',
    'type'	  	        => 'checkbox'
) );