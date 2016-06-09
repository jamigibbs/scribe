<?php
/**
 * Sanitize a checkbox to only allow 0 or 1
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized value.
 * @return boolean							The sanitized boolean.
 */
if ( ! function_exists( 'scribe_sanitize_checkbox' ) ) :
function scribe_sanitize_checkbox( $input ) {
  if ( $input == 1 ) {
    return 1;
  } else {
    return '';
  }
}
endif;

if ( ! function_exists( 'scribe_sanitize_text' ) ) :
/**
 * Sanitize a string to allow only tags in the allowedtags array.
 *
 * @since  1.0.0.
 *
 * @param  string    $string    The unsanitized string.
 * @return string               The sanitized string.
 */
function scribe_sanitize_text( $string ) {
	return wp_kses_post( force_balance_tags( $string ) );
}
endif;

if ( ! function_exists( 'scribe_sanitize_checkbox' ) ) :
/**
 * Sanitize a checkbox to only allow 0 or 1
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized value.
 * @return boolean							The sanitized boolean.
 */
function scribe_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
  } else {
		return 0;
  }
}
endif;

if ( ! function_exists( 'scribe_sanitize_file_url' ) ) :
/**
 * Sanitize the url of uploaded media.
 *
 * @since 1.0.0.
 *
 * @param  string    $value      The url to sanitize
 * @return string    $output     The sanitized url.
 */
function scribe_sanitize_file_url( $url ) {

	$output = '';

	$filetype = wp_check_filetype( $url );
	if ( $filetype["ext"] ) {
		$output = esc_url_raw( $url );
	}

	return $output;
}
endif;

if ( ! function_exists( 'scribe_sanitize_hex_color' ) ) :
/**
 * Sanitizes a hex color.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string|null
 */
function scribe_sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}
endif;
