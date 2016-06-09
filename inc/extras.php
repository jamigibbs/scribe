<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package scribe
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function scribe_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'scribe_body_classes' );

/**
 * Google Fonts
 */
function scribe_fonts_url(){
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Merriweather, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'scribe' );

	/* Translators: If there are characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x( 'on', 'Roboto font: on or off', 'scribe' );

	if ( 'off' !== $merriweather || 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,300,700,900italic';
		}

		if ('off' !== $merriweather){
			$font_families[] = 'Merriweather:400,700,400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Foundation Navigation Walker
 */
class Scribe_Walker_Nav_Menu extends Walker_Nav_Menu
{
	/*
	 * Add submenu data attribute to sub menus
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

/**
 * Adjust navigation when admin bar is active
 */
if ( ! function_exists( 'scribe_admin_bar_nav' ) ) :
	function scribe_admin_bar_nav() {
		if ( is_admin_bar_showing() ) { ?>
			<style>
				.is-visible .nav-panel-container { margin-top: 32px; }
			</style>
		<?php }
	}
endif;
add_action('wp_head', 'scribe_admin_bar_nav');
