<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_set_global' ) ) :
	function feminine_style_set_global() {
		/*Getting saved values start*/
		$feminine_style_saved_theme_options              = feminine_style_get_theme_options();
		$GLOBALS['feminine_style_customizer_all_values'] = $feminine_style_saved_theme_options;
		/*Getting saved values end*/
	}
endif;
add_action( 'feminine_style_action_before_head', 'feminine_style_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_doctype' ) ) :
	function feminine_style_doctype() {
		?><!DOCTYPE html><html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'feminine_style_action_before_head', 'feminine_style_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_before_wp_head' ) ) :

	function feminine_style_before_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="profile" href="//gmpg.org/xfn/11">
		<?php
	}
endif;
add_action( 'feminine_style_action_before_wp_head', 'feminine_style_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array
 */
if ( ! function_exists( 'feminine_style_body_class' ) ) :

	function feminine_style_body_class( $feminine_style_body_classes ) {

		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_enable_animation      = $feminine_style_customizer_all_values['feminine-style-enable-animation'];

		$feminine_style_menu_display_position = $feminine_style_customizer_all_values['feminine-style-menu-display-options'];
		$feminine_style_body_classes[]        = esc_attr( $feminine_style_menu_display_position );

		$feminine_style_enable_header_top = $feminine_style_customizer_all_values['feminine-style-enable-header-top'];
		/*wow animation*/
		if ( 1 != $feminine_style_enable_animation ) {
			$feminine_style_body_classes[] = 'acme-animate';
		}
		$feminine_style_body_classes[] = feminine_style_sidebar_selection();

		$feminine_style_enable_feature = $feminine_style_customizer_all_values['feminine-style-enable-feature'];

		if ( 1 == $feminine_style_enable_header_top ) {
			$feminine_style_body_classes[] = 'header-enable-top';
		}

		if ( 1 != $feminine_style_enable_feature && is_front_page() ) {
			$feminine_style_body_classes[] = 'at-front-no-feature';
		}

		/*feature/normal slider*/
		$feminine_style_body_classes[] = esc_attr( $feminine_style_customizer_all_values['feminine-style-fs-display-options'] );

		/*header image*/
		$feminine_style_body_classes[] = 'at-header-image-' . esc_attr( $feminine_style_customizer_all_values['feminine-style-header-image-display'] );

		return $feminine_style_body_classes;
	}
endif;
add_action( 'body_class', 'feminine_style_body_class', 10, 1 );

/**
 * Start site div
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return null
 */
if ( ! function_exists( 'feminine_style_site_start' ) ) :

	function feminine_style_site_start() {
		?>
		<div class="site" id="page">
		<?php
	}
endif;
add_action( 'feminine_style_action_before', 'feminine_style_site_start', 20 );

/**
 * Skip to content
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_skip_to_content' ) ) :

	function feminine_style_skip_to_content() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'feminine-style' ); ?></a>
		<?php
	}
endif;
add_action( 'feminine_style_action_before_header', 'feminine_style_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_header' ) ) :
	function feminine_style_header() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_enable_header_top     = $feminine_style_customizer_all_values['feminine-style-enable-header-top'];
		$feminine_style_nav_class             = '';
		$feminine_style_enable_sticky         = $feminine_style_customizer_all_values['feminine-style-enable-sticky'];
		if ( 1 == $feminine_style_enable_sticky ) {
			$feminine_style_nav_class .= ' feminine-style-sticky';
		}

		if ( 1 == $feminine_style_enable_header_top ) {
			?>
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 text-left">
							<?php
								$feminine_style_header_top_menu_display_selection   = $feminine_style_customizer_all_values['feminine-style-header-top-menu-display-selection'];
								$feminine_style_header_top_info_display_selection   = $feminine_style_customizer_all_values['feminine-style-header-top-info-display-selection'];
								$feminine_style_header_top_social_display_selection = $feminine_style_customizer_all_values['feminine-style-header-top-social-display-selection'];

							if ( 'left' == $feminine_style_header_top_menu_display_selection ) {
								do_action( 'feminine_style_action_top_menu' );
							}
							if ( 'left' == $feminine_style_header_top_social_display_selection ) {
								do_action( 'feminine_style_action_social_links' );
							}
							if ( 'left' == $feminine_style_header_top_info_display_selection ) {
								do_action( 'feminine_style_action_feature_info' );
							}
							?>
						</div>
						<div class="col-sm-6 text-right">
							<?php
							if ( 'right' == $feminine_style_header_top_menu_display_selection ) {
								do_action( 'feminine_style_action_top_menu' );
							}
							if ( 'right' == $feminine_style_header_top_social_display_selection ) {
								do_action( 'feminine_style_action_social_links' );
							}
							if ( 'right' == $feminine_style_header_top_info_display_selection ) {
								do_action( 'feminine_style_action_feature_info' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<div class="navbar at-navbar <?php echo esc_attr( $feminine_style_nav_class ); ?>" id="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="menu-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
					<span class="logo">                      
				   
						<?php
						$feminine_style_display_site_logo    = $feminine_style_customizer_all_values['feminine-style-display-site-logo'];
						$feminine_style_display_site_title   = $feminine_style_customizer_all_values['feminine-style-display-site-title'];
						$feminine_style_display_site_tagline = $feminine_style_customizer_all_values['feminine-style-display-site-tagline'];

						if ( 1 == $feminine_style_display_site_logo || 1 == $feminine_style_display_site_title || 1 == $feminine_style_display_site_tagline ) :
							if ( 1 == $feminine_style_display_site_logo && function_exists( 'the_custom_logo' ) ) :
								the_custom_logo();
							endif;
							if ( 1 == $feminine_style_display_site_title ) :
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									</h1>
								<?php else : ?>
									<p class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									</p>
									<?php
								endif;
							endif;
							if ( 1 == $feminine_style_display_site_tagline ) :
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $description ); ?></p>
									<?php
								endif;
							endif;
						endif;
						?>
					</span>
				</div>
				<div class="at-beside-navbar-header">
					
					<?php
					feminine_style_primary_menu();
					?>
				</div>
				<!--.at-beside-navbar-header-->
			</div>
		</div>
		<?php
	}
endif;
add_action( 'feminine_style_action_header', 'feminine_style_header', 10 );
