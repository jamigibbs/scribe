/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description text
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site title and description color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Sitewide link color
	wp.customize('scribe_link_color', function(value){
		value.bind(function(to){
			$( '.site-content a, .site-footer a' ).css('color', to);
		});
	});

	// Navigation link color
	wp.customize('scribe_nav_link_color', function(value){
		value.bind(function(to){
			$('#header-menu a').css('color', to);
		});
	});

	// Footer text
	wp.customize('scribe_footer_text', function(value){
		value.bind(function(to){
			$('.site-info').text(to);
		});
	});


} )( jQuery );
