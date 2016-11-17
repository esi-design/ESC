<?php
/**
 * ESC functions and definitions
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
 * @since ESC 1.0
 */
/* remove_filters('the_content', 'wpautop');  */
if ( ! function_exists( 'esc_setup' ) ) :
/**
 * ESC setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since ESC 1.0
 */
function esc_setup() {

	// This theme styles the visual editor to resemble the theme style.
/* 	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) ); */

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
/*
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );
*/

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'gallery', 'caption'
	) );

}
endif; // esc_setup
add_action( 'after_setup_theme', 'esc_setup' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since ESC 1.0
 */
function esc_scripts() {
	wp_enqueue_style( 'esc-style', get_template_directory_uri() . '/css/style.css', array(), '3.3', 'all' );
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );
// 	wp_enqueue_script( 'snap', get_template_directory_uri() . '/js/snap.svg-min.js', array( 'jquery' ), '20140922', false );
// 	wp_enqueue_script( 'svg', get_template_directory_uri() . '/js/svgicons.js', array( 'jquery' ), '20140922', false );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( ), null, true );
	wp_enqueue_script( 'esc-script', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '2.2', true );
		wp_enqueue_script( 'build', get_template_directory_uri() . '/build/proton-2.1.0.min.js' );
		wp_enqueue_script( 'stats', get_template_directory_uri() . '/lib/stats.min.js' );
		wp_enqueue_script( 'particles', get_template_directory_uri() . '/js/particles.js', array(), null, true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '20141202', true );
	wp_enqueue_script( 'grid', get_stylesheet_directory_uri() . '/js/grid.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'esc_scripts' );


function remove_menus(){
  
  remove_menu_page( 'edit.php' ); 
  remove_menu_page( 'edit-comments.php' ); 
  
}
add_action( 'admin_menu', 'remove_menus' );

add_theme_support('post-thumbnails');
// add_image_size( 'form_thumb', 80, 80, true );
// add_image_size( 'marquee_thumb', 345, 345, true );
// add_image_size( 'game', 400, 267, true );
// add_image_size( 'game_logo', 480, 270, true );
// add_image_size( 'partner', 400, 267, false);
// add_image_size( 'poster', 960, 540, true);
// add_image_size( 'poster_crop', 960, 450, true);
add_image_size( 'poster_sm', 640, 360, true);

// filter the Gravity Forms button type
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<input type='submit' id='gform_submit_button_1' class='button gform_button' value=' ' tabindex='2' />";
}
add_filter( 'gform_confirmation_anchor', '__return_true' );

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );