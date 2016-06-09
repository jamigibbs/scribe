<?php
/**
 * Template part for displaying posts.
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

	<?php
	if ( is_single() || is_page() ) : ?>
	<div class="featured-bg-image" <?php if ( has_post_thumbnail() ) : ?> style="background-image:url(<?php echo esc_url($featured_bg_img) ?>)" <?php endif; ?> >

		<div class="row">
			<div class="large-8 large-centered columns">
				<header class="entry-header">
					<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}

						$subtitle = get_post_meta(get_the_ID(), 'sub_title', true);
						if( isset($subtitle) ) {
							echo '<h3 class="subtitle">' . esc_attr( $subtitle ) . '</h3>';
						}

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php scribe_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->
			</div>
		</div>

	</div>
	<?php endif; ?>

	<div class="row single-content bg-white">

		<div class="large-8 large-centered columns">

			<?php if( is_front_page() || is_home() ) : ?>

				<header class="entry-header">
					<div class="row">

						<?php if(  has_post_thumbnail() ) : ?>
							<div class="large-2 columns">
								<a href="<?php echo get_permalink( $post->ID ); ?>"><div class="home-featured-img rounded" style="background-image:url(<?php echo esc_url($featured_bg_img); ?>)"></div></a>
							</div>
						<?php endif; ?>

						<div class="<?php
							if( ! has_post_thumbnail() ) :
								echo 'large-12';
							else :
								echo 'large-10';
							endif;
						?> columns">

							<?php
								if ( is_single() ) {
									the_title( '<h1 class="entry-title">', '</h1>' );
								} else {
									the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								}

								if ( get_post_meta( get_the_ID(), 'sub_title', true) ) :
									echo '<h4 class="subtitle">' . esc_attr( get_post_meta( get_the_ID(), 'sub_title', true ) ) . '</h4>';
								endif;

							if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php scribe_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php
							endif; ?>
						</div>
					</div>


				</header><!-- .entry-header -->

			<?php endif; ?>

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'scribe' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scribe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php scribe_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
