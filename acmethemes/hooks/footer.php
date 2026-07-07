<?php
/**
 * Footer content
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return null
 */
if ( ! function_exists( 'feminine_style_footer' ) ) :

	function feminine_style_footer() {

		$feminine_style_customizer_all_values = feminine_style_get_theme_options();

		$feminine_style_footer_bg_img = $feminine_style_customizer_all_values['feminine-style-footer-bg-img'];
		$style                        = '';
		if ( ! empty( $feminine_style_footer_bg_img ) ) {
			$style .= 'background-image:url(' . esc_url( $feminine_style_footer_bg_img ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
		}
		?>
		<div class="clearfix"></div>
		</div><!-- #page -->
		<footer class="site-footer" style=" <?php echo esc_attr( $style ); ?>">
			<?php
			$footer_column = 0;
			if ( is_active_sidebar( 'footer-col-one' ) ) {
				++$footer_column;
			}
			if ( is_active_sidebar( 'footer-col-two' ) ) {
				++$footer_column;
			}
			if ( is_active_sidebar( 'footer-col-three' ) ) {
				++$footer_column;
			}
			if ( is_active_sidebar( 'footer-col-four' ) ) {
				++$footer_column;
			}
			if ( 0 != $footer_column ) {
				?>
				<div class="footer-columns at-fixed-width">
					<div class="container">
						<div class="row">
							<?php
							if ( 2 == $footer_column ) {
								$footer_top_col = 'col-sm-6 init-animate';
							} elseif ( 3 == $footer_column ) {
								$footer_top_col = 'col-sm-4 init-animate';
							} elseif ( 4 == $footer_column ) {
								$footer_top_col = 'col-sm-6 col-md-6 col-lg-3 init-animate';
							} else {
								$footer_top_col = 'col-sm-12 init-animate';
							}
							$footer_top_col .= ' zoomIn';
							if ( is_active_sidebar( 'footer-col-one' ) ) :
								?>
								<div class="footer-sidebar <?php echo esc_attr( $footer_top_col ); ?>">
									<?php dynamic_sidebar( 'footer-col-one' ); ?>
								</div>
								<?php
							endif;
							if ( is_active_sidebar( 'footer-col-two' ) ) :
								?>
								<div class="footer-sidebar <?php echo esc_attr( $footer_top_col ); ?>">
									<?php dynamic_sidebar( 'footer-col-two' ); ?>
								</div>
								<?php
							endif;
							if ( is_active_sidebar( 'footer-col-three' ) ) :
								?>
								<div class="footer-sidebar <?php echo esc_attr( $footer_top_col ); ?>">
									<?php dynamic_sidebar( 'footer-col-three' ); ?>
								</div>
								<?php
							endif;
							if ( is_active_sidebar( 'footer-col-four' ) ) :
								?>
								<div class="footer-sidebar <?php echo esc_attr( $footer_top_col ); ?>">
									<?php dynamic_sidebar( 'footer-col-four' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div><!-- bottom-->
				</div>
				<div class="clearfix"></div>
				<?php
			}
			?>
			<div class="copy-right">
				<div class='container'>
					<div class="row">
						<div class="col-sm-6 init-animate">
							<div class="footer-copyright text-left">
								<?php
								if ( isset( $feminine_style_customizer_all_values['feminine-style-footer-copyright'] ) ) :
									?>
									<p class="at-display-inline-block">
										<?php echo wp_kses_post( $feminine_style_customizer_all_values['feminine-style-footer-copyright'] ); ?>
									</p>
									<?php
								endif;
								if ( 1 == $feminine_style_customizer_all_values['feminine-style-enable-footer-power-text'] ) {
									echo '<div class="site-info at-display-inline-block">';
									if ( ! empty( $feminine_style_customizer_all_values['feminine-style-footer-site-info'] ) ) {
										echo wp_kses_post( $feminine_style_customizer_all_values['feminine-style-footer-site-info'] );
									} else {
										printf( esc_html__( '%1$s by %2$s', 'feminine-style' ), 'Feminine Style', '<a href="http://www.acmethemes.com/" rel="designer">Acme Themes</a>' );
									}
									echo '</div><!-- .site-info -->';
								}
								?>
							</div>
						</div>
						<div class="col-sm-6 init-animate">
							<?php
							$feminine_style_footer_copyright_beside_option = $feminine_style_customizer_all_values['feminine-style-footer-copyright-beside-option'];
							if ( 'hide' != $feminine_style_footer_copyright_beside_option ) {
								if ( 'social' == $feminine_style_footer_copyright_beside_option ) {
									/**
									 * Social Sharing
									 * feminine_style_action_social_links
									 *
									 * @since Feminine Style 1.0.0
									 *
									 * @hooked feminine_style_social_links -  10
									 */
									echo "<div class='text-right'>";
									do_action( 'feminine_style_action_social_links' );
									echo '</div>';
								} else {
									echo "<div class='at-first-level-nav text-right'>";
									wp_nav_menu(
										array(
											'theme_location' => 'footer-menu',
											'container' => false,
											'depth'     => 1,
										)
									);
									echo '</div>';
								}
							}
							?>
						</div>
					</div>
				</div>
				<a href="#page" class="sm-up-container"><i class="fas fa-angle-up sm-up"></i></a>
			</div>
		</footer>
		<?php
	}
endif;
add_action( 'feminine_style_action_footer', 'feminine_style_footer', 10 );

/**
 * Page end
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return null
 */
if ( ! function_exists( 'feminine_style_page_end' ) ) :

	function feminine_style_page_end() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_booking_form_title    = $feminine_style_customizer_all_values['feminine-style-popup-widget-title'];
		?>
		<!-- Modal -->
		<div id="at-shortcode-bootstrap-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<?php
						if ( ! empty( $feminine_style_booking_form_title ) ) {
							?>
							<h4 class="modal-title"><?php echo esc_html( $feminine_style_booking_form_title ); ?></h4>
							<?php
						}
						?>
					</div>
					<?php
					if ( is_active_sidebar( 'popup-widget-area' ) ) :
						echo "<div class='modal-body'>";
						dynamic_sidebar( 'popup-widget-area' );
						echo '</div>';
					endif;
					?>
				</div><!--.modal-content-->
			</div>
		</div><!--#at-shortcode-bootstrap-modal-->
		<?php
	}
endif;
add_action( 'feminine_style_action_after', 'feminine_style_page_end', 10 );
