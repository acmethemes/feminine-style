<?php
if ( ! function_exists( 'feminine_style_excerpt_length' ) ) :
	/**
	 * Excerpt length
	 *
	 * @since Feminine Style 1.0.0
	 *
	 * @param int $length number of words
	 * @return int
	 */
	function feminine_style_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$excerpt_length                       = absint( $feminine_style_customizer_all_values['feminine-style-blog-archive-excerpt-length'] );
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = $length;
		}
		return apply_filters( 'feminine_style_filter_excerpt_length', absint( $excerpt_length ) );
	}
endif;

if ( ! function_exists( 'feminine_style_content_more_link' ) ) :
	/**
	 * Read more text on content
	 *
	 * @since Feminine Style 1.0.0
	 *
	 * @param string $more_link link
	 * @param string $more_original_text text
	 * @return string
	 */
	function feminine_style_content_more_link( $more_link, $more_original_text ) {

		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$more_text                            = esc_html( $feminine_style_customizer_all_values['feminine-style-blog-archive-more-text'] );
		if ( ! empty( $more_text ) ) {
			$more_link = str_replace( $more_original_text, esc_html( $more_text ), $more_link );
			$more_link = str_replace( 'more-link', 'more-link', $more_link );
		}
		return $more_link;
	}
endif;

if ( ! function_exists( 'feminine_style_excerpt_read_more' ) ) :
	/**
	 * Read more text on excerpt
	 *
	 * @since Feminine Style 1.0.0
	 *
	 * @param string $more text
	 * @return string text
	 */
	function feminine_style_excerpt_read_more( $more ) {

		$output                               = $more;
		$feminine_style_customizer_all_values = feminine_style_get_theme_options();
		$more_text                            = esc_html( $feminine_style_customizer_all_values['feminine-style-blog-archive-more-text'] );
		if ( ! empty( $more_text ) ) {
			$output = ' <br /><a href="' . esc_url( get_permalink() ) . '" class="more-link">' . esc_html( $more_text ) . '</a>';
			$output = apply_filters( 'feminine_style_filter_read_more_link', $output );
		}
		return $output;
	}
endif;

if ( ! function_exists( 'feminine_style_hook_read_more_filters' ) ) :

	/**
	 * Hook excerpt and content filters
	 *
	 * @since Feminine Style 1.0.0
	 */
	function feminine_style_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() ) {

			add_filter( 'excerpt_length', 'feminine_style_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'feminine_style_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'feminine_style_excerpt_read_more' );

		}
	}
endif;
add_action( 'wp', 'feminine_style_hook_read_more_filters' );
