<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scribe
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<div class="row bg-white">
				<div class="large-8 large-centered columns">
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
				</div>
			</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the archive to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-archive.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile; ?>

			<div class="row bg-white">
				<div class="large-8 large-centered columns">
					<?php the_posts_navigation(); ?>
				</div>
			</div>

			<?php else : ?>

		  <div class="row bg-white">
			  <div class="large-8 large-centered columns">
				  <?php get_template_part( 'template-parts/content', 'none' ); ?>
				</div>
			</div>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
