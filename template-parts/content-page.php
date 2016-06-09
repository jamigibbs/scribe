<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scribe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( has_post_thumbnail() ) :
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			if ( ! empty( $image_url[0] ) ) {
				$featured_bg_img = $image_url[0];
			}
		endif;
	?>

	<?php if ( !is_front_page() ) : ?>
	<div class="featured-bg-image" <?php if ( has_post_thumbnail() ) : ?> style="background-image:url(<?php echo esc_url($featured_bg_img) ?>)" <?php endif; ?> >

		<div class="row">
			<div class="large-8 large-centered columns">
				<header class="entry-header">
					<?php
						the_title( '<h1 class="entry-title">', '</h1>' );

						$subtitle = get_post_meta(get_the_ID(), 'sub_title', true);
						if( isset($subtitle) ) {
							echo '<h3 class="subtitle">' . esc_attr( $subtitle ) . '</h3>';
						}
					?>
				</header><!-- .entry-header -->
			</div>
		</div>

	</div>
	<?php endif; ?>

	<div class="row bg-white">
		<div class="large-8 large-centered columns">

		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scribe' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'scribe' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
