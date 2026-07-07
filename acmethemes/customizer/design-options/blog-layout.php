<?php
/*active callback function for excerpt*/
if ( !function_exists('feminine_style_active_callback_content_from_excerpt') ) :
	function feminine_style_active_callback_content_from_excerpt() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if( 'excerpt' == $feminine_style_customizer_all_values['feminine-style-blog-archive-content-from'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for blog layout options*/
$wp_customize->add_section( 'feminine-style-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'feminine-style' ),
    'panel'          => 'feminine-style-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-blog-archive-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-blog-archive-img-size'],
    'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_get_image_sizes_options(1);
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-blog-archive-img-size]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Blog/Archive Feature Image Size', 'feminine-style' ),
    'section'       => 'feminine-style-design-blog-layout-option',
    'settings'      => 'feminine_style_theme_options[feminine-style-blog-archive-img-size]',
    'type'	  	    => 'select'
) );

/*blog content from*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-blog-archive-content-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-blog-archive-content-from'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_blog_archive_content_from();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-blog-archive-content-from]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Blog/Archive Content From', 'feminine-style' ),
	'section'       => 'feminine-style-design-blog-layout-option',
	'settings'      => 'feminine_style_theme_options[feminine-style-blog-archive-content-from]',
	'type'	  	    => 'select'
) );

/*Excerpt Length*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-blog-archive-excerpt-length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-blog-archive-excerpt-length'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-blog-archive-excerpt-length]', array(
	'label'		        => esc_html__( 'Except Length', 'feminine-style' ),
	'section'           => 'feminine-style-design-blog-layout-option',
	'settings'          => 'feminine_style_theme_options[feminine-style-blog-archive-excerpt-length]',
	'type'	  	        => 'number',
	'active_callback'   => 'feminine_style_active_callback_content_from_excerpt'
) );

/*Read More Text*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-blog-archive-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['feminine-style-blog-archive-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-blog-archive-more-text]', array(
    'label'		=> esc_html__( 'Read More Text', 'feminine-style' ),
    'section'   => 'feminine-style-design-blog-layout-option',
    'settings'  => 'feminine_style_theme_options[feminine-style-blog-archive-more-text]',
    'type'	  	=> 'text'
) );

/*Pagination Options*/
$wp_customize->add_setting( 'feminine_style_theme_options[feminine-style-pagination-option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['feminine-style-pagination-option'],
	'sanitize_callback' => 'feminine_style_sanitize_select'
) );
$choices = feminine_style_pagination_options();
$wp_customize->add_control( 'feminine_style_theme_options[feminine-style-pagination-option]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Pagination Options', 'feminine-style' ),
	'description'   => esc_html__( 'Blog and Archive Pages Pagination', 'feminine-style' ),
	'section'       => 'feminine-style-design-blog-layout-option',
	'settings'      => 'feminine_style_theme_options[feminine-style-pagination-option]',
	'type'	  	    => 'select'
) );