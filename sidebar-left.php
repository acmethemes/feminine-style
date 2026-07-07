<?php
/**
 * The left sidebar containing the main widget area.
 */
if ( ! is_active_sidebar( 'feminine-style-sidebar' ) ) {
	return;
}
$sidebar_layout = feminine_style_sidebar_selection();
if( $sidebar_layout == "left-sidebar" || $sidebar_layout == "both-sidebar"  ) : ?>
    <div id="secondary-left" class="at-fixed-width widget-area sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'feminine-style-sidebar-left' ); ?>
        </div>
    </div>
<?php endif;