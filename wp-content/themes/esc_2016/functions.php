<?php
/**
 * theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage ESC
 * @since theme 1.0
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since theme 1.0
 */
function theme_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'gallery', 'caption'
	) );
}
endif; // esc_setup
add_action( 'after_setup_theme', 'theme_setup' );

// register navigation menus
register_nav_menus( array( 'menu'=>__('Menu') ) );

/// add home link to menu
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/* Remove toolbar */
show_admin_bar(false);

// menu fallback
function default_menu() {
	require_once (get_template_directory() . '/includes/default-menu.php');
}

function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

// 	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '20151505', true );
		
// 	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '20160818', true );
// 	wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ), null, true );	
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( ), null, true );
wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js', array( ), null, true );


function remove_menus(){
	remove_menu_page( 'edit.php' );                   //Posts
}

add_action( 'admin_menu', 'remove_menus' );
add_theme_support('post-thumbnails');
add_image_size( 'form_thumb', 318, 180, true );