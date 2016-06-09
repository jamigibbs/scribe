<?php
/**
 * Template part for displaying results in archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scribe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row bg-white">

		<div class="large-8 large-centered columns">

				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php scribe_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				<footer class="entry-footer">
					<?php scribe_entry_footer(); ?>
				</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
