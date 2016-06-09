<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package scribe
 */

get_header(); ?>

<div class="row bg-white">

<div class="large-8 large-centered columns">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404 Error', 'scribe' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<p><?php esc_html_e( 'That page can&rsquo;t be found.', 'scribe' ); ?></p>

					<a class="go-home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div>

</div>

<?php
get_footer();
