<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package scribe
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'scribe' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div id="site-navigation" class="main-navigation" role="navigation">

			<div class="row bg-white">

				<div class="large-12 columns">

					<div class="site-branding">

						<?php if ( has_custom_logo() ) : { the_custom_logo(); } endif; ?>

						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div><!-- .site-branding -->

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<a href="#0" class="nav-btn"><?php _e('Menu', 'scribe'); ?></a>
					<?php endif; ?>

				</div>

			</div>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<div class="nav-panel">

				<div class="nav-panel-container">

					<header class="nav-panel-header">
						<h6><?php _e('Menu', 'scribe'); ?></h6>
						<a href="#0" class="nav-panel-close">X</a>
					</header>

					<div class="nav-panel-content">

						<div class="main-nav clear">

							<div id="header-menu">
								<?php
									wp_nav_menu(array(
										'container' 			=> false,
										'theme_location' 	=> 'primary',
										'menu' 						=> __( 'Primary', 'scribe' ),
										'menu_class' 			=> 'vertical menu',
										'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>',
										'fallback_cb' 		=> false,
										'walker' 					=> new Scribe_Walker_Nav_Menu(),
									));
								?>
							</div>
						</div>

					</div> <!-- nav-panel-content -->

				</div> <!-- nav-panel-container -->

			</div> <!-- nav-panel -->

		<?php endif; ?>

		</div> <!-- #site-navigation -->

	</header><!-- #masthead -->

	<?php
	$primary_bg_img = get_theme_mod('scribe_primary_image');

	if ( ( is_front_page() || is_home() ) && ( !empty($primary_bg_img) ) ) : ?>
		<div class="primary-bg-image"></div>
	<?php
	endif; ?>

	<div id="content" class="site-content">
