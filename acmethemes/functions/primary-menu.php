<?php
/**
 * Display Primary Menu
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_primary_menu' ) ) :

	function feminine_style_primary_menu() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		?>
		<div class="search-woo">
			<?php
			$feminine_style_menu_right_button_link_options = $feminine_style_customizer_all_values['feminine-style-menu-right-button-options'];
			$feminine_style_button_title                   = $feminine_style_customizer_all_values['feminine-style-menu-right-button-title'];
			$feminine_style_button_link                    = $feminine_style_customizer_all_values['feminine-style-menu-right-button-link'];
			if ( 'disable' != $feminine_style_menu_right_button_link_options ) {
				$feminine_style_button_title = ! empty( $feminine_style_button_title ) ? $feminine_style_button_title : esc_html__( 'Book Table', 'feminine-style' );
				if ( 'booking' == $feminine_style_menu_right_button_link_options ) {
					?>
					<a class="featured-button btn btn-primary" href="#" data-toggle="modal" data-target="#at-shortcode-bootstrap-modal"><?php echo esc_html( $feminine_style_button_title ); ?></a>
					<?php
				} else {
					?>
					<a class="featured-button btn btn-primary" href="<?php echo esc_url( $feminine_style_button_link ); ?>"><?php echo esc_html( $feminine_style_button_title ); ?></a>
					<?php
				}
			}
			$feminine_style_enable_woo_cart = $feminine_style_customizer_all_values['feminine-style-enable-cart-icon'];

			if ( 1 == $feminine_style_enable_woo_cart && class_exists( 'WooCommerce' ) ) {
				$cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
				?>
				<div class="cart-wrap desktop-only">
					<div class="acme-cart-views">
						<a href="<?php echo esc_url( $cart_url ); ?>" class="cart-contents">
							<i class="fas fa-shopping-cart"></i>
							<span class="cart-value"><?php echo wp_kses_post( WC()->cart->cart_contents_count ); ?></span>
						</a>
					</div>
					<?php the_widget( 'WC_Widget_Cart', '' ); ?>
				</div>
				<?php
			}
			?>
		</div>
		<div class="main-navigation navbar-collapse collapse">
			<?php
			if ( is_front_page() && ! is_home() && has_nav_menu( 'one-page' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'one-page',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav navbar-nav  acme-one-page',
						'container'      => false,
					)
				);
			} else {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav navbar-nav  acme-normal-page',
						'container'      => false,
					)
				);
			}
			?>
		</div><!--/.nav-collapse -->
		<?php
	}
endif;
