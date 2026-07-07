<?php
if ( ! function_exists( 'feminine_style_gutenberg_setup' ) ) :
	/**
	 * Making theme gutenberg compatible
	 */
	function feminine_style_gutenberg_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'feminine_style_gutenberg_setup' );

function feminine_style_dynamic_editor_styles(){

	$feminine_style_customizer_all_values = feminine_style_get_theme_options();
	$custom_css = '';

	$custom_css .= "
            .edit-post-visual-editor, 
			.edit-post-visual-editor p {
               color: #666;
            }";

	$custom_css .= "
	        .wp-block .wp-block-heading h1, 
	        .wp-block .wp-block-heading h1 a,
	        .wp-block .wp-block-heading h2,
	        .wp-block .wp-block-heading h2 a,
	        .wp-block .wp-block-heading h3, 
	        .wp-block .wp-block-heading h3 a,
	        .wp-block .wp-block-heading h4, 
	        .wp-block .wp-block-heading h4 a,
	        .wp-block .wp-block-heading h5, 
	        .wp-block .wp-block-heading h5 a,
	        .wp-block .wp-block-heading h6,
	        .wp-block .wp-block-heading h6 a{
	            color: #3a3a3a;
	        }";

	if( isset($feminine_style_customizer_all_values['feminine-style-link-color'])){
        $feminine_style_link_color               = esc_attr( $feminine_style_customizer_all_values['feminine-style-link-color'] );
        $custom_css .= "
	        .wp-block a{
	            color: {$feminine_style_link_color};
	        }";
    }
	if( isset($feminine_style_customizer_all_values['feminine-style-link-hover-color'])){
        $feminine_style_link_hover_color         = esc_attr( $feminine_style_customizer_all_values['feminine-style-link-hover-color'] );
        $custom_css .= "
	        .wp-block a:hover,
	        .wp-block a:active,
	        .wp-block a:focus{
	            color: {$feminine_style_link_hover_color};
	        }";
    }
	return wp_strip_all_tags( $custom_css );
}

/**
 * Enqueue block editor style
 */
function feminine_style_block_editor_styles() {
	wp_enqueue_style( 'feminine-style-googleapis', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Work+Sans:100,200,300,400,500,600,700,800,900', array(), null );
	wp_enqueue_style( 'feminine-style-block-editor-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-edit.css', false, '1.0' );

	/**
	 * Styles from the customizer
	 */
	wp_add_inline_style( 'feminine-style-block-editor-styles', feminine_style_dynamic_editor_styles() );
}
add_action( 'enqueue_block_editor_assets', 'feminine_style_block_editor_styles',99 );

function feminine_style_gutenberg_scripts() {
	wp_enqueue_style( 'feminine-style-block-front-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-front.css', false, '1.0' );
	wp_style_add_data( 'feminine-style-block-front-styles', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'feminine_style_gutenberg_scripts' );