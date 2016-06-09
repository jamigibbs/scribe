<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package scribe
 */

?>

	</div><!-- #content -->

		<footer id="colophon" role="contentinfo">

			<div class="row site-footer bg-white">

				<div class="large-8 large-centered columns">

					<?php get_sidebar(); ?>

					<div class="site-info">
						<?php echo wp_kses_post( get_theme_mod( 'scribe_footer_text', 'The Scribe WordPress Theme by <a href="http://jamigibbs.com">Jami Gibbs</a>' ) ); ?>
					</div><!-- .site-info -->

				</div>

			</div>

		</footer><!-- #colophon -->


	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
