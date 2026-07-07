<?php
/**
 * Custom Search Form
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 */
$feminine_style_customizer_all_values = feminine_style_get_theme_options();
?>
<div class="search-block">
	<form action="<?php echo esc_url( home_url() ); ?>" class="searchform" id="searchform" method="get" role="search">
		<div>
			<label for="menu-search" class="screen-reader-text"></label>
			<?php
			$placeholder_text = '';
			if ( isset( $feminine_style_customizer_all_values['feminine-style-search-placeholder'] ) ) :
				$placeholder_text = ' placeholder="' . esc_attr( $feminine_style_customizer_all_values['feminine-style-search-placeholder'] ) . '" ';
			endif;
			?>
			<input type="text" <?php echo esc_attr( $placeholder_text ); ?> class="menu-search" id="menu-search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
			<button class="searchsubmit fas fa-search" type="submit" id="searchsubmit"></button>
		</div>
	</form>
</div>
