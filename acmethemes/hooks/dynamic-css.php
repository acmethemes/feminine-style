<?php
/**
 * Dynamic css
 *
 * @since Feminine Style 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'feminine_style_dynamic_css' ) ) :

	function feminine_style_dynamic_css() {

		$feminine_style_customizer_all_values = feminine_style_get_theme_options();

		/*header height*/
		$feminine_style_header_height = esc_attr( $feminine_style_customizer_all_values['feminine-style-header-height'] );

		/*Color options */
		$feminine_style_primary_color    = esc_attr( $feminine_style_customizer_all_values['feminine-style-primary-color'] );
		$feminine_style_link_color       = esc_attr( $feminine_style_customizer_all_values['feminine-style-link-color'] );
		$feminine_style_link_hover_color = esc_attr( $feminine_style_customizer_all_values['feminine-style-link-hover-color'] );

		$feminine_style_header_top_bg_color    = esc_attr( $feminine_style_customizer_all_values['feminine-style-header-top-bg-color'] );
		$feminine_style_footer_bg_color        = esc_attr( $feminine_style_customizer_all_values['feminine-style-footer-bg-color'] );
		$feminine_style_footer_bottom_bg_color = esc_attr( $feminine_style_customizer_all_values['feminine-style-footer-bottom-bg-color'] );

		/*Animation*/
		$feminine_style_enable_animation = $feminine_style_customizer_all_values['feminine-style-enable-animation'];

		$custom_css = '';

		/*animation*/
		if ( 1 == $feminine_style_enable_animation ) {
			$custom_css .= '
             .init-animate {
                visibility: visible !important;
             }
             ';
		}
		/*background*/
		$feminine_style_header_image_display = esc_attr( $feminine_style_customizer_all_values['feminine-style-header-image-display'] );
		if ( 'bg-image' == $feminine_style_header_image_display || 'hide' == $feminine_style_header_image_display ) {
			$bg_image_url = '';
			if ( get_header_image() && 'bg-image' == $feminine_style_header_image_display ) {
				$bg_image_url = esc_url( get_header_image() );
			}
			$custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                -webkit-background-size:cover;
                background-attachment:fixed;
                background-position: center; 
                height: {$feminine_style_header_height}px;
            }";
		}

		/*color*/
		$custom_css .= "
            .top-header{
                background-color: {$feminine_style_header_top_bg_color};
            }";
		$custom_css .= "
            .site-footer{
                background-color: {$feminine_style_footer_bg_color};
            }";
		$custom_css .= "
            .copy-right{
                background-color: {$feminine_style_footer_bottom_bg_color};
            }";
		$custom_css .= "
            .site-title:hover,
	        .site-title a:hover,
			 .at-social .socials li a,
			 .primary-color,
			 #feminine-style-breadcrumbs a:hover,
			 #feminine-style-breadcrumbs a:focus,
			 .woocommerce .star-rating, 
            .woocommerce ul.products li.product .star-rating,
            .woocommerce p.stars a,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products li.product .price ins .amount,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce-message::before,
			.acme-contact .contact-page-content ul li strong,
			.acme-contact .contact-page-content ul li strong,
            .main-navigation .acme-normal-page .current_page_item > a,
            .main-navigation .acme-normal-page .current-menu-item > a,
            .woocommerce a.button.add_to_cart_button:hover,
            .woocommerce a.added_to_cart:hover,
            .woocommerce a.button.product_type_grouped:hover,
            .woocommerce a.button.product_type_external:hover,
            .woocommerce .cart .button:hover,
            .woocommerce .cart input.button:hover,
            .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce .woocommerce-info .button:hover,
			.woocommerce .widget_shopping_cart_content .buttons a.button:hover,
            i.slick-arrow:hover,
            .main-navigation .acme-normal-page .current_page_item li a:hover,
            .main-navigation .acme-normal-page .current-menu-item li a:hover,
            .at-sticky .main-navigation .acme-normal-page .current_page_item li a:hover,
            .at-sticky .main-navigation .acme-normal-page .current-menu-item li a:hover,
            .at-sticky .main-navigation .acme-normal-page ul li a:hover,
            .main-navigation .acme-normal-page ul li a:hover,
            .main-navigation .navbar-nav > li a:hover,
            .main-navigation li li a:hover,
            .woocommerce a.button.add_to_cart_button:focus,
            .woocommerce a.added_to_cart:focus,
            .woocommerce a.button.product_type_grouped:focus,
            .woocommerce a.button.product_type_external:focus,
            .woocommerce .cart .button:focus,
            .woocommerce .cart input.button:focus,
            .woocommerce #respond input#submit.alt:focus,
			.woocommerce a.button.alt:focus,
			.woocommerce button.button.alt:focus,
			.woocommerce input.button.alt:focus,
			.woocommerce .woocommerce-info .button:focus,
			.woocommerce .widget_shopping_cart_content .buttons a.button:focus,
            i.slick-arrow:focus,
            .main-navigation .acme-normal-page .current_page_item li a:focus,
            .main-navigation .acme-normal-page .current-menu-item li a:focus,
            .at-sticky .main-navigation .acme-normal-page .current_page_item li a:focus,
            .at-sticky .main-navigation .acme-normal-page .current-menu-item li a:focus,
            .at-sticky .main-navigation .acme-normal-page ul li a:focus,
            .main-navigation .acme-normal-page ul li a:focus,
            .main-navigation .navbar-nav > li a:focus,
            .main-navigation li li a:focus,
            .at-sticky .main-navigation .acme-normal-page .current_page_item > a,
            .at-sticky .main-navigation .acme-normal-page .current-menu-item > a,
            .main-navigation .active a{
                color: {$feminine_style_primary_color};
            }";

		/*background color*/
		$custom_css .= "
            .sm-up-container,
            .main-navigation .current_page_ancestor > a:before,
            .comment-form .form-submit input,
            .btn-primary,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            .wpcf7-form input.wpcf7-submit:focus,
            .btn-primary.btn-reverse:before,
            #at-shortcode-bootstrap-modal .modal-header,
            .primary-bg,
			.navigation.pagination .nav-links .page-numbers.current,
			.navigation.pagination .nav-links a.page-numbers:hover,
			.navigation.pagination .nav-links a.page-numbers:focus,
			.woocommerce .product .onsale,
			.woocommerce a.button.add_to_cart_button,
			.woocommerce a.added_to_cart,
			.woocommerce a.button.product_type_grouped,
			.woocommerce a.button.product_type_external,
			.woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .cart .button,
			.woocommerce .cart input.button,
			.woocommerce input.button:disabled, 
			.woocommerce input.button:disabled[disabled],
			.woocommerce input.button:disabled:hover, 
			.woocommerce input.button:disabled:focus, 
			.woocommerce input.button:disabled[disabled]:hover,
			.woocommerce input.button:disabled[disabled]:focus,
			 .woocommerce nav.woocommerce-pagination ul li a:focus, 
			 .woocommerce nav.woocommerce-pagination ul li a:hover, 
			 .woocommerce nav.woocommerce-pagination ul li span.current,
			 .woocommerce a.button.wc-forward,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			 .navbar .cart-wrap .acme-cart-views a span,
			 .acme-gallery .read-more,
			 .woocommerce a.button.alt.disabled, 
              .woocommerce a.button.alt.disabled:hover, 
              .woocommerce a.button.alt.disabled:focus, 
              .woocommerce a.button.alt:disabled, 
              .woocommerce a.button.alt:disabled:hover, 
              .woocommerce a.button.alt:disabled:focus, 
              .woocommerce a.button.alt:disabled[disabled], 
              .woocommerce a.button.alt:disabled[disabled]:hover, 
              .woocommerce a.button.alt:disabled[disabled]:focus, 
              .woocommerce button.button.alt.disabled,
             .woocommerce-MyAccount-navigation ul > li> a:hover,
             .woocommerce-MyAccount-navigation ul > li> a:focus,
             .woocommerce-MyAccount-navigation ul > li.is-active > a,
             .featured-button.btn,
              .btn-primary:hover,
              .btn-primary:focus,
             .btn-primary:active,
             .btn-primary:active:hover,
             .btn-primary:active:focus,
             .btn-primary:focus{
                background-color: {$feminine_style_primary_color};
                color:#fff;
                border:1px solid {$feminine_style_primary_color};
            }";

		/*borders*/
		$custom_css .= "
            .woocommerce .cart .button, 
            .woocommerce .cart input.button,
            .woocommerce a.button.add_to_cart_button,
            .woocommerce a.added_to_cart,
            .woocommerce a.button.product_type_grouped,
            .woocommerce a.button.product_type_external,
            .woocommerce .cart .button,
            .woocommerce .cart input.button
            .woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs:before{
                border: 1px solid {$feminine_style_primary_color};
            }";
		$custom_css .= "
            .blog article.sticky{
                border-bottom: 2px solid {$feminine_style_primary_color};
            }";

		$custom_css .= "
        a,
        .single-item .fa,
        .author.vcard a,
        .nav-links a,
        .widget li a,
        .authorbox .socials li a,
        .counter-item i,
        .testimonial-content::after,
        .blog article.sticky:after,
        .posted-on a,
        .single-item .fa,
        .author.vcard a,
        .comments-link a,
        .edit-link a,
        .tags-links a,
        .byline a,
        .nav-links a,
        .widget li a,
        .entry-meta i.fa, 
        .entry-footer i.fa,
        .counter-item i,
        .testimonial-content::after{
            color: {$feminine_style_link_color};
        }";

		$custom_css .= "
        article.post .entry-header span:not(:last-child):after,
        article.page .entry-header span:not(:last-child):after,
        article.post .entry-footer span:not(:last-child):after,
        article.page .entry-footer span:not(:last-child):after{
            background: {$feminine_style_link_color};
        }";

		$custom_css .= "
        a:hover,
        a:active,
        a:focus,
        .nav-links a:hover,
        .widget li a:hover,
        .authorbox .socials li a:hover,
        .nav-links a:focus,
        .widget li a:focus,
        .authorbox .socials li a:focus,
        .socials a, 
        .socials a:hover,
        .socials a:focus{
            color: {$feminine_style_link_hover_color};
        }";

		$custom_css .= "
        article.post .entry-header span:hover,
        article.page .entry-header span:hover,
        article.post .entry-footer span:hover,
        article.page .entry-footer span:hover{
            color: {$feminine_style_link_color};
        }";
		$custom_css .= "
        article.post .entry-header span:focus-within,
        article.page .entry-header span:focus-within,
        article.post .entry-footer span:focus-within,
        article.page .entry-footer span:focus-within{
            color: {$feminine_style_link_color};
        }";
		$custom_css .= "
        article.post .entry-header .entry-meta {
            background: {$feminine_style_primary_color};
            color:#fff;
        }";

		/*sidebar widget link color*/
		$custom_css .= "
        .sidebar .widget-title:after,
        .sidebar .widget-title:before{
            background: {$feminine_style_primary_color};
        }";

		$custom_css .= "
       .btn-reverse,
       .at-price h2{
            color: {$feminine_style_primary_color};
        }";

		$custom_css .= "
       .btn-reverse:hover,
       .image-slider-wrapper .slider-content .btn-reverse:hover,
       .at-widgets.at-parallax .btn-reverse:hover,
       .btn-reverse:focus,
       .image-slider-wrapper .slider-content .btn-reverse:focus,
       .at-widgets.at-parallax .btn-reverse:focus{
            background: {$feminine_style_primary_color};
            color:#fff;
            border-color:{$feminine_style_primary_color};
        }";

		$custom_css .= "        
       .woocommerce #respond input#submit, 
       .woocommerce a.button, 
       .woocommerce button.button, 
       .woocommerce input.button{
            background: {$feminine_style_primary_color};
            color:#fff;
        }";

		/*secondary color*/
		$custom_css .= "
       .team-img-box:before{
            -webkit-box-shadow: 0 -106px 92px -35px {$feminine_style_header_top_bg_color} inset;
			box-shadow: 0 -106px 92px -35px {$feminine_style_header_top_bg_color} inset;
        }";

		$custom_css .= "
       .at-pricing-widget .single-list .at-pricing-box:before{
        background-color: {$feminine_style_primary_color}; /* Old browsers */
        background: -moz-linear-gradient(45deg,  #fedeed 28%, {$feminine_style_primary_color} 93%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg,  #fedeed 28%,{$feminine_style_primary_color} 93%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg,  #fedeed 28%,{$feminine_style_primary_color} 93%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fedeed', endColorstr='{$feminine_style_primary_color}',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        }";

		// Added color options
		$custom_css .= "
        
       .filters.button-group button:hover,
       .filters.button-group button:focus{
            background: {$feminine_style_primary_color};
            color:#fff;
        }";

		$custom_css .= "
        .acme-services.normal .column .single-item:hover,
        .acme-services.normal .column .single-item:hover:after,
        .acme-services.normal .column .single-item:hover:before{
            border-color: {$feminine_style_link_color};
        }";
		$custom_css .= "
        .acme-services.normal .column .single-item:focus-within,
        .acme-services.normal .column .single-item:focus-within:after,
        .acme-services.normal .column .single-item:focus-within:before{
            border-color: {$feminine_style_link_color};
        }";
		$custom_css .= "
        .acme-services.normal .single-list .single-item .icon{
            background: {$feminine_style_link_color};
            box-shadow: 0 0 0 5px #fff, 0 0 0 6px {$feminine_style_link_color};
            -webkit-box-shadow: 0 0 0 5px #fff, 0 0 0 6px {$feminine_style_link_color};
        }";

		$custom_css .= "
        .contact-form div.wpforms-container-full .wpforms-form input[type='submit'], 
        .contact-form div.wpforms-container-full .wpforms-form button[type='submit'], 
        .contact-form div.wpforms-container-full .wpforms-form .wpforms-page-button{
			background-color: {$feminine_style_primary_color};
            color:#fff;
            border:1px solid {$feminine_style_primary_color};
        }";

		$custom_css .= "
        .acme-accordions .accordion-title:hover a, 
        .acme-accordions .accordion-title.active,
        .acme-accordions .accordion-title.active a{
            color:{$feminine_style_primary_color};
             
        }";
		$custom_css .= "
        .acme-accordions .accordion-title:focus-within a{
            color:{$feminine_style_primary_color};
             
        }";
		$custom_css .= "
        .acme-accordions .accordion-title:hover a .accordion-icon,
        .acme-accordions .accordion-title.active a .accordion-icon{
            background:{$feminine_style_primary_color};
             
        }";
		$custom_css .= "
        .acme-accordions .accordion-title:focus-within a .accordion-icon{
            background:{$feminine_style_primary_color};
             
        }";
		$custom_css .= "
       .scroll-box span:after,
       .at-pricing-img-box .at-price,
       .at-timeline-block.current .at-timeline-img,
       .navbar-toggle:hover span.menu-icon span,
       .navbar-toggle:focus span.menu-icon span,
       .at-action-wrapper .slick-arrow{
            background:{$feminine_style_link_color};
             
        }";
		$custom_css .= "
       .navbar-toggle:focus-within span.menu-icon span{
            background:{$feminine_style_link_color};
        }";
		$custom_css .= "
       .at-action-wrapper .slick-arrow:hover,
       .at-action-wrapper .slick-arrow:focus{
            background:{$feminine_style_link_hover_color};
        }";

		$custom_css .= "
        .sm-up-container{
            background: {$feminine_style_primary_color};
        }";
		$custom_css .= "
        .sm-up-container:hover,
        .sm-up-container:focus{
            background-color: {$feminine_style_primary_color};
        }";

		wp_add_inline_style( 'feminine-style-style', $custom_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'feminine_style_dynamic_css', 99 );
