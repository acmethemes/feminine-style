<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */
get_header();
$feminine_style_customizer_all_values  = feminine_style_get_theme_options();
$feminine_style_hide_front_page_header = $feminine_style_customizer_all_values['feminine-style-hide-front-page-header'];

if (
	( is_front_page() && 1 != $feminine_style_hide_front_page_header )
	|| ! is_front_page()
) {
	?>
	<div class="wrapper inner-main-title">
		<?php
		echo feminine_style_get_header_normal_image();
		?>
		<div class="container">
			<header class="entry-header init-animate">
				<?php
				$shop_id = get_option( 'woocommerce_shop_page_id' );
				echo '<h1 class="entry-title">' . esc_html( get_the_title( $shop_id ) ) . '</h1>';

				feminine_style_breadcrumbs();
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php
}
?>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = feminine_style_sidebar_selection();
	if ( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				woocommerce_content();
			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if ( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php
get_footer();
