<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */
$no_blog_image                        = '';
$feminine_style_customizer_all_values = feminine_style_get_theme_options();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'init-animate' ); ?>>
	<div class="content-wrapper">
		<div class="blog-header">		      
			<div class="entry-header-title">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
			</div>
			<footer class="entry-footer">
				<?php feminine_style_entry_footer( 1, 1, 1, 0 ); ?>
			</footer><!-- .entry-footer -->
		</div>
		<?php
		$feminine_style_hide_single_featured_image = feminine_style_featured_image_display();
		if ( has_post_thumbnail() && 'disable' != $feminine_style_hide_single_featured_image ) :
			echo '<div class="image-wrap"><figure class="post-thumb">';
			the_post_thumbnail( $feminine_style_hide_single_featured_image );
			echo '</figure></div>';
		else :
			$no_blog_image = 'no-image';
		endif;

		if ( 'no-image' === $no_blog_image ) {
			if ( 'post' === get_post_type() && has_category() ) :
				?>
				<header class="entry-header <?php echo esc_attr( $no_blog_image ); ?>">
					<div class="entry-meta">
						<i class="fas fa-tag" aria-hidden="true"></i>
						<?php
						feminine_style_cats_lists()
						?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->
				<?php
			endif;
		}
		?>
		<div class="entry-content <?php echo esc_attr( $no_blog_image ); ?>">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'feminine-style' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
