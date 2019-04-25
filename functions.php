<?php
/**
 * shop-51e functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shop-51e
 */

if ( ! function_exists( 'shop51e_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shop51e_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shop-51e, use a find and replace
		 * to change 'shop51e' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shop51e', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
    require_once __DIR__ . '/inc/walker-nav-menu.php';
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'shop51e' ),
      'footer' => esc_html__( 'Footer', 'shop51e' ),
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
		add_theme_support( 'custom-background', apply_filters( 'shop51e_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

//    Add excerpt to post type page
    add_post_type_support( 'page', 'excerpt' );

	}
endif;
add_action( 'after_setup_theme', 'shop51e_setup' );

/**
 * Enqueue scripts and styles.
 */
function shop51e_scripts() {
	wp_enqueue_style( 'shop51e-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.js', array('jquery') );

	if ( shop51e_get_env() === 'development' ) {
//    wp_enqueue_style( 'shop51e-style-main', 'http://localhost:8000/styles/main.css' );
    wp_enqueue_script( 'shop51e-script-main', 'http://localhost:8000/scripts/main.js', array(), null, true );
  } else {
    wp_enqueue_style( 'shop51e-style-main', get_template_directory_uri() . '/dist/styles/main.css' );
    wp_enqueue_script( 'shop51e-script-main', get_template_directory_uri() . '/dist/scripts/main.js', array(), null, true );
  }
}
add_action( 'wp_enqueue_scripts', 'shop51e_scripts' );

if ( ! function_exists( 'shop51e_add_image_size' ) ) :
  /**
   * Add image sizes
   * wp_get_attachment_image_src( int $attachment_id, string|array $size = 'thumbnail', bool $icon = false )
   * return false / Array
   */
  function shop51e_add_image_size() {
//    home
    add_image_size( 'home_backgrounds', 900 * 2, 1440 * 2 );
  }
endif;
add_action( 'after_setup_theme', 'shop51e_add_image_size' );

if ( ! function_exists( 'shop51e_wp_footer' ) ) :
  /**
   * Add script to footer
   */
  function shop51e_wp_footer() {
  }
endif;
add_action( 'wp_footer', 'shop51e_wp_footer' );

/**
 * template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * post types + taxonomies
 */
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/taxonomies.php';

/**
 * restful API v1
 */
require get_template_directory() . '/inc/api.php';

/**
 * acf
 */
//require get_template_directory() . '/inc/acf.php';
