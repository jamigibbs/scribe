<?php

function scribe_styles() {

	/**
	 * Get the theme's version number for cache busting
	 */
	$scribe_theme = wp_get_theme();

	/**
	 * The main theme stylesheet
	 */
	wp_enqueue_style(
		'scribe-style',
		get_stylesheet_uri(),
		array(
			'scribe-foundation-style',
			'scribe-fonts'
		),
		$scribe_theme['Version']
	);

	/**
	 * Foundation Framework
	 *
	 * @link http://foundation.zurb.com/
	 *
	 */
	wp_enqueue_style( 'scribe-foundation-style', get_stylesheet_directory_uri() . '/vendor/foundation/foundation.css', array(), '6.2.3', 'all' );

	/**
	 * Google Fonts
	 *
	 * @ref inc/extras.php
	 *
	 */
	wp_enqueue_style( 'scribe-fonts', scribe_fonts_url(), array(), null );

	/**
	 * Get the user's custom styles
	 */
  $scribe_link_color = get_theme_mod('scribe_link_color', '#262626');
  $scribe_link_hover_color = get_theme_mod('scribe_link_hover_color', '#FF3300');
  $scribe_nav_link_color = get_theme_mod('scribe_nav_link_color', '#ffffff');
  $scribe_featured_img_bg_attachment = get_theme_mod('scribe_featured_img_bg_attachment', 'fixed');
  $scribe_page_post_title_color = get_theme_mod('scribe_page_post_title_color', '#ffffff' );
  $scribe_page_post_subtitle_color = get_theme_mod('scribe_page_post_subtitle_color', '#808080' );
  $scribe_page_post_meta_color = get_theme_mod('scribe_page_post_meta_color', '#ffffff' );

  $scribe_custom_css = "

    /* Theme Customizer Styles */

    .site-content a, .site-footer a {
      color: {$scribe_link_color};
    }
    .site-content a:hover, .site-footer a:hover, .site-branding .site-title a:hover, .main-nav #header-menu a:hover, 	a.comment-reply-link:hover, .comment-meta a.comment-edit-link:hover, a#cancel-comment-reply-link:hover, .post .featured-bg-image .entry-header .entry-meta a:hover, .nav-panel-header .nav-panel-close:hover, #header-menu li.current-menu-item a, #header-menu li.current-menu-item a {
      color: {$scribe_link_hover_color};
    }
    .go-home:hover, .form-submit input[type=\"submit\"]:hover, li.comment article a.comment-reply-link:hover, .nav-btn:hover {
      background-color: {$scribe_link_hover_color};
    }
    #header-menu a {
      color: {$scribe_nav_link_color};
    }
    .dropdown.menu > li.is-dropdown-submenu-parent > a::after {
      border-color: {$scribe_nav_link_color};
    }
    .featured-bg-image {
      background-attachment: {$scribe_featured_img_bg_attachment};
    }
    .featured-bg-image .entry-header h1 {
      color: {$scribe_page_post_title_color};
    }

    .featured-bg-image h3.subtitle {
      color: {$scribe_page_post_subtitle_color};
    }

    .post .featured-bg-image .entry-header .entry-meta, .post .featured-bg-image .entry-header .entry-meta a {
      color: {$scribe_page_post_meta_color};
    }
  ";

  if ( get_theme_mod('scribe_primary_image')) :

    $scribe_primary_image = get_theme_mod('scribe_primary_image');
    $scribe_primary_img_bg_attachment = get_theme_mod('scribe_primary_img_bg_attachment', 'fixed');

    $scribe_custom_css .= "
      .primary-bg-image {
        background-image: url({$scribe_primary_image});
        background-attachment: {$scribe_primary_img_bg_attachment};
      }
			@media screen and (max-width: 39.9375em) {
				.primary-bg-image {
					background-attachment: scroll;
				}
			}
    ";

    if ( get_theme_mod('scribe_primary_image_overlay') == '' ) :
      $scribe_custom_css .= "
        .primary-bg-image:before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          background-image: linear-gradient(180deg, transparent, #000000);
          opacity: 1;
          overflow: hidden;
        }
      ";
    endif;

  endif;

  if ( get_theme_mod('scribe_featured_img_overlay') == '' ) :
    $scribe_custom_css .= "
      .featured-bg-image:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(180deg, transparent, #000000);
        opacity: 1;
        overflow: hidden;
      }
    ";
  endif;

  /**
   *  Loads the main stylesheet and user's custom styles to the header
   *
   *  @link https://developer.wordpress.org/reference/functions/wp_add_inline_style/
   */
  wp_add_inline_style( 'scribe-style', preg_replace('/\s\s+/', ' ', wp_strip_all_tags( $scribe_custom_css ) ) );

}
add_action( 'wp_enqueue_scripts', 'scribe_styles' );
