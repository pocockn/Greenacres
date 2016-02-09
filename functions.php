<?php
/**
 * Greenacres functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

/**
 * Include all Classes
 */
@include('inc/classes/class-admin-menu.php');
@include('inc/classes/class-custom-post-type.php');
@include('inc/pages/home_menu.php');
@include('partials/home-options-callbacks.php');
@include('inc/metaboxes/metabox-creator.php');


/**
 * Include Widgets
 */
@include('inc/widgets/contact-details.php');


/**********************
**** Admin Menu Class *
**********************/

// Add the home menu page
add_action( 'admin_menu', array( 'Admin_Menu', 'create_home_menu_page' ) );
add_action( 'admin_init', array( 'Admin_Menu', 'display_theme_panel_fields' ) );

/**********************
*Custom Post Type Class
**********************/
add_action( 'init', array( 'Custom_Post_Type', 'all_custom_post_types' ) );


/**
 * Ensure WordPress 3.6 or higher is installed
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

// Register custom navigation walker
 require_once( 'inc/classes/wp_bootstrap_navwalker.php' );

/**
 * Greenacres Set up
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Greenacres supports
 *
 */
 
function greenacres_setup() {


	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', 'Primary Menu' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

}
add_action( 'after_setup_theme', 'greenacres_setup' );

/**
* Register and load font awesome CSS files using a CDN.
* 
* @link   http://www.bootstrapcdn.com/#fontawesome
* @author FAT Media
*/

function prefix_enqueue_awesome() {
	wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
}

add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );

/**
* Register and load the font Lato from Google Fonts
* 
*/

function load_fonts() {
	wp_register_style('lato', 'https://fonts.googleapis.com/css?family=Lato:400,300italic,300');
	wp_enqueue_style( 'lato');
}
    
add_action('wp_print_styles', 'load_fonts');

/**
 * Enqueue scripts for the front end.
 *
 */

function greenacre_scripts() {
	wp_enqueue_script( 'Blue Imp Gallery', get_template_directory_uri() . '/assets/js/jquery.blueimp-gallery.min.js', array('jquery'), true );
	wp_enqueue_script( 'Bootstrap Gallery', get_template_directory_uri() . '/assets/js/bootstrap-image-gallery.min.js', array('jquery'), true );
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), true);
		// custom jquery for our testimonial form validation
	wp_register_script( 'custom_js', get_template_directory_uri() . 'assets/js/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );
	wp_enqueue_script( 'custom_js' );
	wp_enqueue_script( 'Greenacres Google Map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDZX6XD6F1yZGjNS22bO4HTxWj7bOM1fiM&signed_in=true&libraries=places&callback=initMap', array(), '1.0.0', true );
	wp_enqueue_script( 'Greenacre Restaurant Maps', get_template_directory_uri() . '/assets/js/google_maps-restaurant.js' );
	wp_enqueue_script( 'Greenacre Activities Maps', get_template_directory_uri() . '/assets/js/google_maps-activities.js' );  
}

add_action( 'wp_enqueue_scripts', 'greenacre_scripts' );

/**
 * Enqueue styles for the front end.
 *
 */

function greenacre_styles() {
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
	wp_enqueue_style( 'blueimp', 'http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css');
	wp_enqueue_style( 'Main Style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'greenacre_styles');

// register our Contact widget
function register_contact_widget() {
    register_widget( 'contact_details_widget' );
}
add_action( 'widgets_init', 'register_contact_widget' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function  greenacres_widgets_init() {

	register_sidebar( array(
		'name'          => 'Contact Page Sidebar',
		'id'            => 'contact_side',
	) );

	register_sidebar( array(
		'name'          => 'Footer Form',
		'id'            => 'footer_form',
	) );

}
add_action( 'widgets_init', 'greenacres_widgets_init' );

add_filter( 'the_content', 'wpse_82860_remove_autop_for_posttype', 0 );

function wpse_82860_remove_autop_for_posttype( $content )
{
    # edit the post type here
    'testimonials' === get_post_type() && remove_filter( 'the_content', 'wpautop' );
    return $content;
}




