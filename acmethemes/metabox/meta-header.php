<?php
/**
 * Feminine Style  Template Builder Options
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('feminine_style_template_builder_header_options') ) :
	function feminine_style_template_builder_header_options() {
		$feminine_style_template_builder_header_options = array(
			'display-header' => array(
				'value'     => 'display-header',
				'title'     => esc_html__( 'Display Header', 'feminine-style' )
			),
			'hide-header' => array(
				'value'     => 'hide-header',
				'title'     => esc_html__( 'Hide Header', 'feminine-style' )
			)
		);
		return apply_filters( 'feminine_style_template_builder_header_options', $feminine_style_template_builder_header_options );
	}
endif;

/**
 * Custom Metabox
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'feminine_style_template_builder_metabox' )):
	function feminine_style_template_builder_metabox() {
		add_meta_box(
			'feminine_style_template_builder_metabox', // $id
			esc_html__( ' Template Builder Options', 'feminine-style' ), // $title
			'feminine_style_template_builder_callback', // $callback
			'post', // $page
			'normal', // $context
			'high'
		); // $priority

		add_meta_box(
			'feminine_style_template_builder_metabox', // $id
			esc_html__( ' Template Builder Options', 'feminine-style' ), // $title
			'feminine_style_template_builder_callback', // $callback
			'page', // $page
			'normal', // $context
			'high'
		); // $priority
	}
endif;
add_action('add_meta_boxes', 'feminine_style_template_builder_metabox');

/**
 * Callback function for metabox
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('feminine_style_template_builder_callback') ) :
	function feminine_style_template_builder_callback(){
		global $post;
		$feminine_style_template_builder_header_options = feminine_style_template_builder_header_options();
		$feminine_style_default_header = 'display-header';
		$feminine_style_template_builder_header_options_meta = get_post_meta( $post->ID, 'feminine_style_template_builder_header_options', true );
		if( !feminine_style_is_null_or_empty($feminine_style_template_builder_header_options_meta) ){
			$feminine_style_default_header = $feminine_style_template_builder_header_options_meta;
		}
		wp_nonce_field( basename( __FILE__ ), 'feminine_style_template_builder_meta_nonce' );
		?>
		<table class="form-table page-meta-box">
			<tr>
				<td colspan="4"><h4><?php esc_html_e( ' Header Option', 'feminine-style' ); ?></h4></td>
			</tr>
			<tr>
				<td>
					<?php
					foreach ($feminine_style_template_builder_header_options as $key=>$field) {
						?>
						<div>
							<input class="feminine_style_template_builder_header_options" id="<?php echo esc_attr($key); ?>" type="radio" name="feminine_style_template_builder_header_options" value="<?php echo esc_attr($key); ?>" <?php checked( $key, $feminine_style_default_header ); ?> />
							<label class="description" for="<?php echo esc_attr($key); ?>">
								<?php echo esc_html( $field['title']); ?>
							</label>
						</div>
					<?php } // end foreach
					?>
					<div class="clear"></div>
				</td>
			</tr>
		</table>

	<?php }
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('feminine_style_save_template_builder_options') ) :
	function feminine_style_save_template_builder_options( $post_id ) {

		if (
			!isset( $_POST[ 'feminine_style_template_builder_meta_nonce' ] ) ||
			!wp_verify_nonce( $_POST[ 'feminine_style_template_builder_meta_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
			( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
			! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
		){
			return;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can( 'edit_page', $post_id ) )
				return $post_id;
		} elseif (!current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		//Execute this saving function
		if( isset( $_POST['feminine_style_template_builder_header_options'] )){
			$old = get_post_meta( $post_id, 'feminine_style_template_builder_header_options', true );
			$new = esc_attr( $_POST['feminine_style_template_builder_header_options'] );
			if ($new && $new != $old) {
				update_post_meta( $post_id, 'feminine_style_template_builder_header_options', $new );
			} elseif ('' == $new && $old) {
				delete_post_meta( $post_id,'feminine_style_template_builder_header_options', $old );
			}
		}
	}
endif;
add_action('save_post', 'feminine_style_save_template_builder_options');