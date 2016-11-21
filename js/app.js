(function($){
	$(document).ready(function(){
		'use strict';

	/**
	 *
	 * Initialize the Foundation framework
	 *
	 * @since 1.0.0
	 *
	 * @link http://foundation.zurb.com/sites/docs/
	 */
	$(document).foundation();


	/**
	 *
	 * Display and hide the navigation menu when clicked
	 *
	 * @since 1.0.0
	 *
	 */
	var NavDisplay = {
		init: function(){

			// Show the nav when hamburger is clicked
			$('.nav-btn').on('click', function(event){
				// Prevent the default click event from occuring
				event.preventDefault();
				$('.nav-panel').addClass('is-visible');
			});

			// Hide the nav when the 'x' is clicked
			$('.nav-panel-header').on('click', function(event){
				if( $(event.target).is('.nav-panel-close, .nav-panel-header, h6') ) {
					// Prevent the default click event from occuring
					event.preventDefault();
					$('.nav-panel').removeClass('is-visible');
				}
			});

			$('.site-content, .featured-bg-image').on('click', function(event){
				$('.nav-panel').removeClass('is-visible');
			});

		}
	}
	NavDisplay.init();

});

})(this.jQuery);
