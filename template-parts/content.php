<?php
/**
 * Template part for displaying posts and search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */
$feminine_style_customizer_all_values = feminine_style_get_theme_options();
$content_from                         = $feminine_style_customizer_all_values['feminine-style-blog-archive-content-from'];
$no_blog_image                        = '';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrapper">
		<?php
		$thumbnail = $feminine_style_customizer_all_values['feminine-style-blog-archive-img-size'];
		if ( has_post_thumbnail() && 'disable' != $thumbnail ) :
			?>
			<!--post thumbnal options-->
			<div class="image-wrap">
				<div class="post-thumb">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( $thumbnail ); ?>
					</a>
					<?php
					if ( 'post' === get_post_type() ) :
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
					?>
				</div><!-- .post-thumb-->
			</div>
			<?php
		else :
			$no_blog_image = 'no-image';
			if ( 'post' === get_post_type() ) :
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
		endif;
		?>
		<div class="entry-content <?php echo esc_attr( $no_blog_image ); ?>">
			<div class="blog-header">
				<div class="entry-header-title">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</div>
			</div>
			<?php
			if ( 'content' == $content_from ) :
				the_content(
					sprintf(
					/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'feminine-style' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					)
				);
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'feminine-style' ),
						'after'  => '</div>',
					)
				);
			else :
				the_excerpt();
			endif;
			?>
			<footer class="entry-footer">
				<?php feminine_style_entry_footer( 1, 1, 1, 1 ); ?>
			</footer><!-- .entry-footer -->
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
