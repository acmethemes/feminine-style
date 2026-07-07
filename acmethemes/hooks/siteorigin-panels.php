<?php
/**
 * Adds Feminine Style Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return null
 *
 */
function feminine_style_siteorigin_widgets($widgets) {
    $theme_widgets = array(
        'Feminine_Style_About',
        'Feminine_Style_Posts_Col',
        'Feminine_Style_Contact',
	    'Feminine_Style_Gallery',
	    'Feminine_Style_Advanced_Image_Logo',
	    'Feminine_Style_Feature',
	    'Feminine_Style_Service',
        'Feminine_Style_Testimonial'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('feminine-style');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'feminine_style_siteorigin_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return null
 *
 */
function feminine_style_siteorigin_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Feminine Style Widgets', 'feminine-style'),
        'filter' => array(
            'groups' => array('feminine-style')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'feminine_style_siteorigin_widgets_tab', 20 );