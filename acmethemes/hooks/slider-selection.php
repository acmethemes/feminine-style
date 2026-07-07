<?php
if ( ! function_exists( 'feminine_style_scroll_text' ) ) :
	function feminine_style_scroll_text() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		if ( ! empty( $feminine_style_customizer_all_values['feminine-style-slider-scroll-text'] ) ) {
			$link = $feminine_style_customizer_all_values['feminine-style-slider-scroll-link'];
			?>
			<div class="scroll-box">
				<span>
				<?php
				if ( ! empty( $link ) ) {
					?>
					<a href="<?php echo esc_url( $link ); ?>">
						<?php
				}
					echo esc_html( $feminine_style_customizer_all_values['feminine-style-slider-scroll-text'] );
				if ( ! empty( $link ) ) {
					?>
					</a>
					<?php
				}
				?>
				</span>
			</div>
			<?php
		}
	}
endif;

/**
 * Display default slider
 *
 * @since Feminine Style 1.0.0
 *
 * @param int $post_id
 * @return void
 */
if ( ! function_exists( 'feminine_style_default_slider' ) ) :
	function feminine_style_default_slider() {
		$bg_image_style = '';
		if ( get_header_image() ) :
			$bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
		else :
			$bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri() . '/assets/img/default-image.jpg' ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
		endif; // End header image check.

		$text_align = 'text-left';
		$animation1 = 'init-animate';
		$animation2 = 'init-animate';
		?>
		<div class="image-slider-wrapper home-fullscreen ">
			<div class="featured-slider">
				<div class="item" style="<?php echo esc_attr( $bg_image_style ); ?>">
					<div class="slider-content <?php echo esc_attr( $text_align ); ?>">
						<div class="container">
							<div class="banner-title <?php echo esc_attr( $animation1 ); ?>">
								<?php esc_html_e( 'Feminine Style - Feminine WordPress Theme', 'feminine-style' ); ?>
							</div>
							<div class="image-slider-caption <?php echo esc_attr( $animation2 ); ?>">
								<p><?php esc_html_e( 'Beautifully designed, Feminine touches and Multipurpose ', 'feminine-style' ); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="acme-banner-shape">

					<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">    
						<path class="path1" d="M1920,435.1H0V49c32.8,32,92.7,82.1,180,108.3C486.8,249.6,554.4-28.5,918,9.1C1152.9,33.4,1328.5,180,1602,176 c137.7-2,248.9-43,318-75C1920,229.7,1920,306.4,1920,435.1z"></path>
						<path class="path2" d="M1920,288.1c-228,42-357.8,100.5-489,54c-254.1-90-325.1-324.6-603-315C619.8,34.3,532.8,150,280.5,228.8	c-136.7,42.7-178-42.7-280.5-48.6v255h1920V288.1z"></path>
						<path class="path3" d="M1920,435.1H0v-215c81,5,135,77,243,41c199.3-66.4,294.5-143.1,405-162c315-54,384.2,131.1,585,207 c165,62.4,385,129,687-120C1920,236.1,1920,385.1,1920,435.1z"></path>    
					</svg>
			</div>
		</div>
		<?php
	}
endif;

function feminine_style_slider_from_page() {
	$feminine_style_customizer_all_values = feminine_style_get_theme_options();

	$feminine_style_slides_data               = json_decode( $feminine_style_customizer_all_values['feminine-style-slides-data'] );
	$feminine_style_feature_slider_text_align = $feminine_style_customizer_all_values['feminine-style-feature-slider-text-align'];

	$feminine_style_feature_slider_enable_animation = $feminine_style_customizer_all_values['feminine-style-feature-slider-enable-animation'];
	$feminine_style_feature_slider_image_only       = $feminine_style_customizer_all_values['feminine-style-feature-slider-display-title'];
	$feminine_style_feature_slider_image_excerpt    = $feminine_style_customizer_all_values['feminine-style-feature-slider-display-excerpt'];
	$feminine_style_fs_image_display_options        = $feminine_style_customizer_all_values['feminine-style-fs-image-display-options'];

	$post_in           = array();
	$slides_other_data = array();
	if ( is_array( $feminine_style_slides_data ) ) {
		foreach ( $feminine_style_slides_data as $slides_data ) {
			if ( isset( $slides_data->selectpage ) && ! empty( $slides_data->selectpage ) ) {
				$post_in[]                                     = $slides_data->selectpage;
				$slides_other_data[ $slides_data->selectpage ] = array(
					'button-1-text' => $slides_data->button_1_text,
					'button-1-link' => $slides_data->button_1_link,
					'button-2-text' => $slides_data->button_2_text,
					'button-2-link' => $slides_data->button_2_link,
				);
			}
		}
	}

	if ( ! empty( $post_in ) && is_array( $post_in ) ) :
		$feminine_style_child_page_args = array(
			'post__in'       => $post_in,
			'orderby'        => 'post__in',
			'posts_per_page' => count( $post_in ),
			'post_type'      => 'page',
			'no_found_rows'  => true,
			'post_status'    => 'publish',
		);
		$slider_query                   = new WP_Query( $feminine_style_child_page_args );
		/*The Loop*/
		if ( $slider_query->have_posts() ) :
			?>
			<div class="image-slider-wrapper home-fullscreen <?php echo esc_attr( $feminine_style_fs_image_display_options ); ?>">
				<div class="featured-slider">
					<?php
					$slider_index = 1;
					$text_align   = '';
					$animation1   = '';
					$animation2   = '';
					$animation4   = '';
					$animation5   = '';

					$bg_image_style = '';
					if ( 'alternate' != $feminine_style_feature_slider_text_align ) {
						$text_align = $feminine_style_feature_slider_text_align;
					}
					if ( 1 == $feminine_style_feature_slider_enable_animation ) {
						$animation1 = 'init-animate fadeInDown';
						$animation2 = 'init-animate fadeInDown';
						$animation4 = 'init-animate fadeInDown';
						$animation5 = 'init-animate fadeInDown';
					}
					while ( $slider_query->have_posts() ) :
						$slider_query->the_post();

						if ( 'alternate' == $feminine_style_feature_slider_text_align ) {
							if ( 1 == $slider_index ) {
								$text_align = 'text-left';
							} elseif ( 2 == $slider_index ) {
								$text_align = 'text-center';
							} else {
								$text_align = 'text-right';
							}
						}
						if ( has_post_thumbnail() ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						} else {
							$image_url[0] = get_template_directory_uri() . '/assets/img/default-image.jpg';
						}
						if ( 'full-screen-bg' == $feminine_style_fs_image_display_options ) {
							$bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						}
						$slides_single_data = $slides_other_data[ get_the_ID() ];
						?>
						<div class="item" style="<?php echo esc_attr( $bg_image_style ); ?>">
							<?php
							if ( 'responsive-img' == $feminine_style_fs_image_display_options ) {
								echo '<img src="' . esc_url( $image_url[0] ) . '"/>';
							}
							?>
							<div class="slider-content <?php echo esc_attr( $text_align ); ?>">
								<div class="container">
									<?php
									if ( 1 == $feminine_style_feature_slider_image_only ) {
										?>
										<div class="banner-title <?php echo esc_attr( $animation1 ); ?>"><?php the_title(); ?></div>
										<?php
									}
									if ( 1 == $feminine_style_feature_slider_image_excerpt ) {
										?>
										<div class="image-slider-caption <?php echo esc_attr( $animation2 ); ?>">
											<?php the_excerpt(); ?>
										</div>
										<?php
									}
									if ( ! empty( $slides_single_data['button-1-text'] ) ) {
										?>
										<a href="<?php echo esc_url( $slides_single_data['button-1-link'] ); ?>" class="<?php echo esc_attr( $animation4 ); ?> btn btn-primary btn-reverse outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-1-text'] ); ?>
											<i class="fas fa-angle-right"></i>
										</a>
										<?php
									}
									if ( ! empty( $slides_single_data['button-2-text'] ) ) {
										?>
										<a href="<?php echo esc_url( $slides_single_data['button-2-link'] ); ?>" class="<?php echo esc_attr( $animation5 ); ?> btn btn-primary outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-2-text'] ); ?>
											<i class="fas fa-angle-right"></i>
										</a>
										<?php
									}
									?>
								</div>
							</div>
						</div>
						<?php
						++$slider_index;
						if ( 3 < $slider_index ) {
							$slider_index = 1;
						}
					endwhile;

					?>
				</div><!--acme slick carousel-->

				<div class="acme-banner-shape">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 435" preserveAspectRatio="none">    
						<path class="path1" d="M1920,435.1H0V49c32.8,32,92.7,82.1,180,108.3C486.8,249.6,554.4-28.5,918,9.1C1152.9,33.4,1328.5,180,1602,176 c137.7-2,248.9-43,318-75C1920,229.7,1920,306.4,1920,435.1z"></path>
						<path class="path2" d="M1920,288.1c-228,42-357.8,100.5-489,54c-254.1-90-325.1-324.6-603-315C619.8,34.3,532.8,150,280.5,228.8	c-136.7,42.7-178-42.7-280.5-48.6v255h1920V288.1z"></path>
						<path class="path3" d="M1920,435.1H0v-215c81,5,135,77,243,41c199.3-66.4,294.5-143.1,405-162c315-54,384.2,131.1,585,207 c165,62.4,385,129,687-120C1920,236.1,1920,385.1,1920,435.1z"></path>    
					</svg>
				</div>
			</div><!--.image slider wrapper-->
			<?php
			feminine_style_scroll_text();

			wp_reset_postdata();
		else :
			feminine_style_default_slider();
		endif;
	else :
		feminine_style_default_slider();
	endif;
}

/**
 * Featured Slider display
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'feminine_style_feature_slider' ) ) :

	function feminine_style_feature_slider() {

		feminine_style_slider_from_page();
	}
endif;
add_action( 'feminine_style_action_feature_slider', 'feminine_style_feature_slider', 0 );
