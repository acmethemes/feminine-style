<?php
/**
 * Display Feature Columns
 *
 * @since Feminine Style 1.0.0
 *
 * @return void
 */
if ( ! function_exists( 'feminine_style_feature_info' ) ) :
	function feminine_style_feature_info() {
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$feminine_style_feature_info_number   = $feminine_style_customizer_all_values['feminine-style-feature-info-number'];
		echo '<div class="info-icon-box-wrapper">';
		$number = $feminine_style_feature_info_number;

		$feminine_style_basic_info_data = array();

		$feminine_style_first_info_icon   = $feminine_style_customizer_all_values['feminine-style-first-info-icon'];
		$feminine_style_first_info_title  = $feminine_style_customizer_all_values['feminine-style-first-info-title'];
		$feminine_style_first_info_desc   = $feminine_style_customizer_all_values['feminine-style-first-info-desc'];
		$feminine_style_basic_info_data[] = array(
			'icon'  => $feminine_style_first_info_icon,
			'title' => $feminine_style_first_info_title,
			'desc'  => $feminine_style_first_info_desc,
		);

		$feminine_style_second_info_icon  = $feminine_style_customizer_all_values['feminine-style-second-info-icon'];
		$feminine_style_second_info_title = $feminine_style_customizer_all_values['feminine-style-second-info-title'];
		$feminine_style_second_info_desc  = $feminine_style_customizer_all_values['feminine-style-second-info-desc'];
		$feminine_style_basic_info_data[] = array(
			'icon'  => $feminine_style_second_info_icon,
			'title' => $feminine_style_second_info_title,
			'desc'  => $feminine_style_second_info_desc,
		);

		$feminine_style_third_info_icon   = $feminine_style_customizer_all_values['feminine-style-third-info-icon'];
		$feminine_style_third_info_title  = $feminine_style_customizer_all_values['feminine-style-third-info-title'];
		$feminine_style_third_info_desc   = $feminine_style_customizer_all_values['feminine-style-third-info-desc'];
		$feminine_style_basic_info_data[] = array(
			'icon'  => $feminine_style_third_info_icon,
			'title' => $feminine_style_third_info_title,
			'desc'  => $feminine_style_third_info_desc,
		);

		$feminine_style_forth_info_icon   = $feminine_style_customizer_all_values['feminine-style-forth-info-icon'];
		$feminine_style_forth_info_title  = $feminine_style_customizer_all_values['feminine-style-forth-info-title'];
		$feminine_style_forth_info_desc   = $feminine_style_customizer_all_values['feminine-style-forth-info-desc'];
		$feminine_style_basic_info_data[] = array(
			'icon'  => $feminine_style_forth_info_icon,
			'title' => $feminine_style_forth_info_title,
			'desc'  => $feminine_style_forth_info_desc,
		);

		$col = ' init-animate zoomIn';

		$i = 0;
		foreach ( $feminine_style_basic_info_data as $base_basic_info_data ) {
			if ( $i >= $number ) {
				break;
			}
			?>
			<div class="info-icon-box <?php echo esc_attr( $col ); ?>">
				<?php
				if ( ! empty( $base_basic_info_data['icon'] ) ) {
					?>
					<div class="info-icon">
						<i class="<?php echo esc_attr( $base_basic_info_data['icon'] ); ?>"></i>
					</div>
					<?php
				}
				if ( ! empty( $base_basic_info_data['title'] ) || ! empty( $base_basic_info_data['desc'] ) ) {
					?>
					<div class="info-icon-details">
						<?php
						if ( ! empty( $base_basic_info_data['title'] ) ) {
							echo '<h6 class="icon-title">' . esc_html( $base_basic_info_data['title'] ) . '</h6>';
						}
						if ( ! empty( $base_basic_info_data['desc'] ) ) {
							echo '<span class="icon-desc">' . wp_kses_post( $base_basic_info_data['desc'] ) . '</span>';
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
			++$i;
		}
		echo '</div>';/*.infowrapper*/
	}
endif;
add_action( 'feminine_style_action_feature_info', 'feminine_style_feature_info', 20 );
