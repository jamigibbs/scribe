<?php
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scribe_customizer_live_preview() {
	wp_enqueue_script( 'scribe_theme_customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'scribe_customizer_live_preview' );
