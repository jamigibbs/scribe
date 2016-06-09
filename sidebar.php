<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="row small-up-1 medium-up-2 large-up-2">
		<?php dynamic_sidebar( 'footer' ); ?>
	</div>
</aside><!-- #secondary -->
