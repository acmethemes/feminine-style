<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */

/**
 * feminine_style_action_before_head hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_set_global -  0
 * @hooked feminine_style_doctype -  10
 */
do_action( 'feminine_style_action_before_head' );?>
	<head>

		<?php
		/**
		 * feminine_style_action_before_wp_head hook
		 * @since Feminine Style 1.0.0
		 *
		 * @hooked feminine_style_before_wp_head -  10
		 */
		do_action( 'feminine_style_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * WordPress Default Hook
 * Triggered after the opening <body> tag.
 * wp_body_open hook
 *
 * @since WordPress 5.2
 *
 */
do_action( 'wp_body_open' );
/**
 * feminine_style_action_before hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_site_start - 20
 */
do_action( 'feminine_style_action_before' );

/**
 * feminine_style_action_before_header hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_skip_to_content - 10
 */
do_action( 'feminine_style_action_before_header' );

/**
 * feminine_style_action_header hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_header - 10
 */
do_action( 'feminine_style_action_header' );

/**
 * feminine_style_action_after_header hook
 * @since Feminine Style 1.0.0
 *
 * @hooked null
 */
do_action( 'feminine_style_action_after_header' );

/**
 * feminine_style_action_before_content hook
 * @since Feminine Style 1.0.0
 *
 * @hooked null
 */
do_action( 'feminine_style_action_before_content' );