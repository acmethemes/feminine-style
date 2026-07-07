<?php
/**
 * Sanitize choices
 * @since Feminine Style 1.0.0
 * @param null
 * @return string $feminine_style_about_column_number
 *
 */
if ( ! function_exists( 'feminine_style_sanitize_choice_options' ) ) :
	function feminine_style_sanitize_choice_options( $value, $choices, $default ) {
		$input = wp_kses_post( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 *
 * @return array $feminine_style_about_column_number
 *
 */
if ( ! function_exists( 'feminine_style_background_options' ) ) :
	function feminine_style_background_options() {
		$feminine_style_about_column_number = array(
			'default'   => esc_html__( 'Default', 'feminine-style' ),
			'gray'      => esc_html__( 'Gray', 'feminine-style' )
		);

		return apply_filters( 'feminine_style_background_options', $feminine_style_about_column_number );
	}
endif;

/**
 * Column Number
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 *
 * @return array $feminine_style_about_column_number
 *
 */
if ( ! function_exists( 'feminine_style_widget_column_number' ) ) :
	function feminine_style_widget_column_number() {
		$feminine_style_about_column_number = array(
			1 => esc_html__( '1', 'feminine-style' ),
			2 => esc_html__( '2', 'feminine-style' ),
			3 => esc_html__( '3', 'feminine-style' ),
			4 => esc_html__( '4', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_widget_column_number', $feminine_style_about_column_number );
	}
endif;

/**
 * Widget Image Popup Type
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array $feminine_style_gallery_image_popup
 *
 */
if ( !function_exists('feminine_style_gallery_image_popup') ) :
	function feminine_style_gallery_image_popup() {
		$feminine_style_gallery_image_popup =  array(
			'gallery'   => esc_html__( 'Gallery', 'feminine-style' ),
			'single'    => esc_html__( 'Single', 'feminine-style' ),
			'disable'   => esc_html__( 'Disable', 'feminine-style' ),
		);
		return apply_filters( 'feminine_style_gallery_image_popup', $feminine_style_gallery_image_popup );
	}
endif;

/**
 * Content From
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 *
 * @return array $feminine_style_content_from
 *
 */
if ( ! function_exists( 'feminine_style_content_from' ) ) :
	function feminine_style_content_from() {
		$feminine_style_about_column_number = array(
			'excerpt' => esc_html__( 'Excerpt', 'feminine-style' ),
			'content' => esc_html__( 'Content', 'feminine-style' )
		);
		return apply_filters( 'feminine_style_content_from', $feminine_style_about_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function feminine_style_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'feminine-style' ),
        'id'            => 'feminine-style-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( is_customize_preview() ) {
        $feminine_style_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'feminine-style' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $feminine_style_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'feminine-style' );
    }
    register_sidebar(array(
        'name'          => esc_html__('Home Main Content Area', 'feminine-style'),
        'id'            => 'feminine-style-home',
        'description'	=> $feminine_style_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title init-animate zoomIn"><span>',
        'after_title'   => '</span></h2>',
    ));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'feminine-style' ),
		'id'            => 'feminine-style-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name'          => esc_html__('Footer Column One', 'feminine-style'),
        'id'            => 'footer-col-one',
        'description'   => esc_html__('Displays items on top footer section.', 'feminine-style'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Two', 'feminine-style'),
        'id'            => 'footer-col-two',
        'description'   => esc_html__('Displays items on top footer section.', 'feminine-style'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Three', 'feminine-style'),
        'id'            => 'footer-col-three',
        'description'   => esc_html__('Displays items on top footer section.', 'feminine-style'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Four', 'feminine-style'),
        'id'            => 'footer-col-four',
        'description'   => esc_html__('Displays items on top footer section.', 'feminine-style'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

	register_sidebar(array(
		'name'          => esc_html__('Popup Widget Area', 'feminine-style'),
		'id'            => 'popup-widget-area',
		'description'   => esc_html__('Displays items on Pop up', 'feminine-style'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));


	/*Widgets*/
	register_widget( 'Feminine_Style_About' );
	register_widget( 'Feminine_Style_Posts_Col' );
	register_widget( 'Feminine_Style_Contact' );
	register_widget( 'Feminine_Style_Gallery' );
	register_widget( 'Feminine_Style_Advanced_Image_Logo' );
	register_widget( 'Feminine_Style_Feature' );
	register_widget( 'Feminine_Style_Service' );
	register_widget( 'Feminine_Style_Testimonial' );

}
add_action( 'widgets_init', 'feminine_style_widgets_init' );

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'feminine_style_get_edit_post_link' );
function feminine_style_get_edit_post_link(){
    if( isset( $_GET['id'] ) ){
	    $id = absint( $_GET['id'] );
	    if( get_edit_post_link( $id ) ){
		    ?>
            <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
			    <?php esc_html_e('Full Edit','feminine-style');?>
            </a>
		    <?php
	    }
	    else{
		    echo 0;
	    }
	    exit;
    }
}