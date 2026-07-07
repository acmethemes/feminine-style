<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('feminine_style_sidebar_selection') ) :
	function feminine_style_sidebar_selection( ) {
		wp_reset_postdata();
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		global $post;
		if(
			isset( $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout'] ||
				'both-sidebar' == $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout'] ||
				'middle-col' == $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout'] ||
				'no-sidebar' == $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout']
			)
		){
			$feminine_style_body_global_class = $feminine_style_customizer_all_values['feminine-style-single-sidebar-layout'];
		}
		else{
			$feminine_style_body_global_class= 'right-sidebar';
		}

		if ( feminine_style_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'feminine_style_sidebar_layout', true );
				$feminine_style_wc_single_product_sidebar_layout = $feminine_style_customizer_all_values['feminine-style-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$feminine_style_body_classes = $post_class;
					} else {
						$feminine_style_body_classes = $feminine_style_wc_single_product_sidebar_layout;
					}
				}
				else{
					$feminine_style_body_classes = $feminine_style_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $feminine_style_customizer_all_values['feminine-style-wc-shop-archive-sidebar-layout'] ) ){
					$feminine_style_archive_sidebar_layout = $feminine_style_customizer_all_values['feminine-style-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $feminine_style_archive_sidebar_layout ||
						'left-sidebar' == $feminine_style_archive_sidebar_layout ||
						'both-sidebar' == $feminine_style_archive_sidebar_layout ||
						'middle-col' == $feminine_style_archive_sidebar_layout ||
						'no-sidebar' == $feminine_style_archive_sidebar_layout
					){
						$feminine_style_body_classes = $feminine_style_archive_sidebar_layout;
					}
					else{
						$feminine_style_body_classes = $feminine_style_body_global_class;
					}
				}
				else{
					$feminine_style_body_classes= $feminine_style_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'] ||
					'left-sidebar' == $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'] ||
					'both-sidebar' == $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'] ||
					'middle-col' == $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'] ||
					'no-sidebar' == $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout']
				){
					$feminine_style_body_classes = $feminine_style_customizer_all_values['feminine-style-front-page-sidebar-layout'];
				}
				else{
					$feminine_style_body_classes = $feminine_style_body_global_class;
				}
			}
			else{
				$feminine_style_body_classes= $feminine_style_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'feminine_style_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$feminine_style_body_classes = $post_class;
				} else {
					$feminine_style_body_classes = $feminine_style_body_global_class;
				}
			}
			else{
				$feminine_style_body_classes = $feminine_style_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $feminine_style_customizer_all_values['feminine-style-archive-sidebar-layout'] ) ){
				$feminine_style_archive_sidebar_layout = $feminine_style_customizer_all_values['feminine-style-archive-sidebar-layout'];
				if(
					'right-sidebar' == $feminine_style_archive_sidebar_layout ||
					'left-sidebar' == $feminine_style_archive_sidebar_layout ||
					'both-sidebar' == $feminine_style_archive_sidebar_layout ||
					'middle-col' == $feminine_style_archive_sidebar_layout ||
					'no-sidebar' == $feminine_style_archive_sidebar_layout
				){
					$feminine_style_body_classes = $feminine_style_archive_sidebar_layout;
				}
				else{
					$feminine_style_body_classes = $feminine_style_body_global_class;
				}
			}
			else{
				$feminine_style_body_classes= $feminine_style_body_global_class;
			}
		}
		else {
			$feminine_style_body_classes = $feminine_style_body_global_class;
		}
		return $feminine_style_body_classes;
	}
endif;