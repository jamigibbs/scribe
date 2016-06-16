<?php
/**
 * Scribe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package scribe
 */

if ( ! function_exists( 'scribe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scribe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on scribe, use a find and replace
	 * to change 'scribe' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'scribe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add ability for users to add a logo to site in the customizer
	add_theme_support( 'custom-logo' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'scribe' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scribe_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'scribe_setup' );

/*
 * Add support for editor stylesheet
 *
 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
 */
function scribe_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'scribe_add_editor_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scribe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scribe_content_width', 1000 );
}
add_action( 'after_setup_theme', 'scribe_content_width', 0 );

/*  Script for no-js / js class */
function scribe_js_class () {
  echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
}
add_action( 'wp_head', 'scribe_js_class', 1 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scribe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'scribe' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets to the footer', 'scribe' ),
		'before_widget' => '<section id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'scribe_widgets_init' );

/**
 * Enqueue main stylesheet and custom styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Enqueue scripts.
 */
function scribe_scripts() {
	
	wp_enqueue_script( 'scribe-foundation-core', get_template_directory_uri() . '/vendor/foundation/foundation.js', array('jquery'), '6.2.2', false);
	wp_enqueue_script( 'scribe-app', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'scribe-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scribe_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer
 */
require get_template_directory() . '/customizer/settings.php';
require get_template_directory() . '/customizer/preview.php';
require get_template_directory() . '/customizer/sanitization.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
