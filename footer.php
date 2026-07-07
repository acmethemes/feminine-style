<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */

/**
 * feminine_style_action_after_content hook
 * @since Feminine Style 1.0.0
 *
 * @hooked null
 */
do_action( 'feminine_style_action_after_content' );

/**
 * feminine_style_action_before_footer hook
 * @since Feminine Style 1.0.0
 *
 * @hooked null
 */
do_action( 'feminine_style_action_before_footer' );

/**
 * feminine_style_action_footer hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_footer - 10
 */
do_action( 'feminine_style_action_footer' );

/**
 * feminine_style_action_after_footer hook
 * @since Feminine Style 1.0.0
 *
 * @hooked null
 */
do_action( 'feminine_style_action_after_footer' );

/**
 * feminine_style_action_after hook
 * @since Feminine Style 1.0.0
 *
 * @hooked feminine_style_page_end - 10
 */
do_action( 'feminine_style_action_after' );

wp_footer();
?>
</body>
</html>