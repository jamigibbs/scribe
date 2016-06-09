<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package scribe
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<div class="row bg-white">
				<div class="large-8 large-centered columns">
					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'scribe' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
				</div>
			</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
	</section><!-- #primary -->

<?php
get_footer();
