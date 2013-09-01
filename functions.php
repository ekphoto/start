<?php

/**
 * Theme Setup
 * @since 1.0.0
 *
 * This setup function attaches all of the site-wide functions
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 *
 */

add_action('genesis_setup','child_theme_setup', 15);
function child_theme_setup() {
	
	/****************************************
	Define child theme variables
	*****************************************/	
	define( 'CHILD_THEME_SHORTNAME','start' );
	define( 'CHILD_THEME_VERSION',	'1.0.0' );
	define( 'CHILD_SITE_BY',		'Kelley ProMedia' );
	define( 'CHILD_SITE_BY_URL',	'http://www.KelleyProMedia.com' );
	
	define( 'CHILD_THEME_NAME', 	'Kelley ProMedia' );
	define( 'CHILD_THEME_EMAIL', 	'kelley@kelleypromedia.com' );
	define( 'CHILD_THEME_PHONE', 	'' );

	
	//define( 'CHILD_THEME_NAME', 	'Ed Kelley' );
	//define( 'CHILD_THEME_EMAIL', 	'info@edkelley.biz' );
	//define( 'CHILD_THEME_PHONE', 	'(512) 986-5519' );
	
	define( 'CHILD_DISPLAY_PHONE', 	false ); 	// Display Phone Number in Footer
	define( 'CHILD_DISPLAY_EMAIL', 	true  );	// Display Email in Footer
	define( 'CHILD_DISPLAY_URL', 	true  );	// Display URL in Footer
	
	define( 'CHILD_SITE_URL', 		get_site_url() );
	define( 'CHILD_THEME_URL', 		CHILD_URL );  // from Genesis
	
	/****************************************
	Define child theme color styles
	*****************************************/
	add_theme_support( 'genesis-style-selector', array( 
		'kpm-red'   	=> 'Red',
		'kpm-green' 	=> 'Green',
		'kpm-blue'  	=> 'Blue',	
		'kpm-purple' 	=> 'Purple',
		'kpm-multi' 	=> 'Multi',
		'kpm-tdred' 	=> 'Red 3D',		
		'kpm-tdgreen' 	=> 'Green 3D',
		'kpm-tdblue'  	=> 'Blue 3D',
		'kpm-tdpurple' 	=> 'Purple 3D',
		'kpm-tdmulti' 	=> 'Multi 3D') );
	
	/****************************************
	Define child theme version
	*****************************************/

	define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/style.css' ) );


	/****************************************
	Include theme helper functions
	*****************************************/

	include_once( CHILD_DIR . '/lib/theme-helpers.php' );


	/****************************************
	Setup child theme functions
	*****************************************/

	include_once( CHILD_DIR . '/lib/theme-functions.php' );


	/****************************************
	Backend
	*****************************************/

	// Image Sizes
	// add_image_size( $name, $width = 0, $height = 0, $crop = false );
	add_image_size( 'slider-image', 1140, 450, TRUE );
	add_image_size( 'price-thumbnail', 250, 250, TRUE );

	// Clean up Head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');

	// Structural Wraps
//	add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

	// Menus
	add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu' ) );
	//add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu', 'secondary' => 'Secondary Navigation Menu' ) );

	// Sidebars
	//unregister_sidebar( 'sidebar-alt' );
	//genesis_register_sidebar( array( 'name' => 'Footer', 'id' => 'custom-footer' ) );
	
	genesis_register_sidebar( array( 'name'	=> 'Mobile Menu', 'id'=> 'mobile_menu') );
	genesis_register_sidebar( array( 'name'	=> 'Slider', 'id'=> 'slider') );
	genesis_register_sidebar( array( 'name'	=> 'Welcome', 'id'=> 'welcome') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Bottom Left', 'id'=> 'featured-bottom-left') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Bottom Middle', 'id'=> 'featured-bottom-middle') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Bottom Right', 'id'=> 'featured-bottom-right') );
	
	genesis_register_sidebar( array( 'name'	=> 'Featured Price Header', 'id'=> 'price_header') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Price One', 'id'=> 'price_one') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Price Two', 'id'=> 'price_two') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Price Three', 'id'=> 'price_three') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Price Four', 'id'=> 'price_four') );
	genesis_register_sidebar( array( 'name'	=> 'Featured Price Footer', 'id'=> 'price_footer') );
	
	add_theme_support( 'genesis-footer-widgets', 3 );
	

	// Execute shortcodes in widgets
	// add_filter('widget_text', 'do_shortcode');

	// Remove Unused Page Layouts
	//genesis_unregister_layout( 'content-sidebar-sidebar' );
	//genesis_unregister_layout( 'sidebar-sidebar-content' );
	//genesis_unregister_layout( 'sidebar-content-sidebar' );

	// Remove Unused User Settings
	//add_filter( 'user_contactmethods', 'mb_contactmethods' );
	//remove_action( 'show_user_profile', 'genesis_user_options_fields' );
	//remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
	//remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
	//remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
	//remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
	//remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
	//remove_action( 'show_user_profile', 'genesis_user_layout_fields' );
	//remove_action( 'edit_user_profile', 'genesis_user_layout_fields' );

	// Editor Styles
	//add_editor_style( 'editor-style.css' );

	// Remove Genesis Theme Settings Metaboxes
	//add_action( 'genesis_theme_settings_metaboxes', 'mb_remove_genesis_metaboxes' );

	// Reposition Genesis Layout Settings Metabox
	//remove_action( 'admin_menu', 'genesis_add_inpost_layout_box' );
	//add_action( 'admin_menu', 'mb_add_inpost_layout_box' );

	// Don't update theme
	add_filter( 'http_request_args', 'mb_dont_update_theme', 5, 2 );

	// Setup Child Theme Settings
	include_once( CHILD_DIR . '/lib/child-theme-settings.php' );

	// Prevent File Modifications
	define ( 'DISALLOW_FILE_EDIT', true );

	// Set Content Width
	$content_width = apply_filters( 'content_width', 740, 740, 1140 );

	// Add support for custom background
	add_theme_support( 'custom-background' );

	// Add support for custom header
	add_theme_support( 'genesis-custom-header', array( 'width' => 1140, 'height' => 100 ) );

	// Remove Dashboard Meta Boxes
	add_action('wp_dashboard_setup', 'mb_remove_dashboard_widgets' );

	// Change Admin Menu Order
	add_filter('custom_menu_order', 'mb_custom_menu_order');
	add_filter('menu_order', 'mb_custom_menu_order');

	// Hide Admin Areas that are not used
	add_action( 'admin_menu', 'mb_remove_menu_pages' );

	// Remove default link for images
	add_action('admin_init', 'mb_imagelink_setup', 10);

	// Show Kitchen Sink in WYSIWYG Editor
	add_filter( 'tiny_mce_before_init', 'mb_unhide_kitchensink' );

	// Define custom post type capabilities for use with Members
	add_action( 'admin_init', 'mb_add_post_type_caps' );


	/****************************************
	Frontend
	*****************************************/

	// Add HTML5 markup structure
	add_theme_support( 'html5' );

	// Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	// HTML5 doctype with conditional classes
	remove_action( 'genesis_doctype', 'genesis_do_doctype' );
	add_action( 'genesis_doctype', 'mb_html5_doctype' );

	// Load custom favicon to header
	add_filter( 'genesis_pre_load_favicon', 'mb_custom_favicon_filter' );

	// Load Apple touch icon in header
	add_filter( 'genesis_meta', 'mb_apple_touch_icon' );

	// Remove Edit link
	add_filter( 'genesis_edit_post_link', '__return_false' );

	// Footer
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	add_action( 'genesis_footer', 'kpm_footer' );
	
	// Enqueue Scripts
	//add_action( 'wp_enqueue_scripts', 'mb_scripts' );
	// Causes Errors and slows down slider!!!!!!!!!

	// Remove Query Strings From Static Resources
	add_filter('script_loader_src', 'mb_remove_script_version', 15, 1);
	add_filter('style_loader_src', 'mb_remove_script_version', 15, 1);

	// Remove Read More Jump
	add_filter('the_content_more_link', 'mb_remove_more_jump_link');


	/****************************************
	Theme Views
	*****************************************/

	include_once( CHILD_DIR . '/lib/theme-views.php' );
	

	


	/****************************************
	Require Plugins
	*****************************************/
//
//	require_once( CHILD_DIR . '/lib/class-tgm-plugin-activation.php' );
//	require_once( CHILD_DIR . '/lib/theme-require-plugins.php' );
//	
//	add_action( 'tgmpa_register', 'mb_register_required_plugins' );
//


}


/****************************************
Misc Theme Functions
*****************************************/

// Unregister the superfish scripts
add_action( 'wp_enqueue_scripts', 'mb_unregister_superfish' );

// Filter Yoast SEO Metabox Priority
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );


/****************************************
Kelley ProMedia
*****************************************/
//* Custom Wordpress Logo
add_action('login_head', 'kpm_custom_login_logo');

// Remove Date from Post
add_filter( 'genesis_post_info', 'kpm_no_date_post_info_filter' );


//* Register Mobile Menu Widget 
add_action( 'genesis_before_loop', 'kpm_mobile_before_content_widget', 9 );


//* Set colors for different post
add_action('admin_footer','kpm_posts_status_color');


/** Add new image sizes */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured-bottom', 350, 150, TRUE );
}

//* Use for testing
// echo CHILD_THEME_SHORTNAME;


// Get back To this later
// Registering the scripts and style
//wp_register_style('start-jquery-ui-style', CHILD_DIR . '/assets/js/jquery-ui-1.10.3.custom.min.css',false, null);
//wp_enqueue_style('start-jquery-ui-style');

//wp_register_script('start-custom-js', CHILD_DIR . '/assets/js/accordion.js', __FILE__ , array('jquery-ui-accordion'), '', true);
//wp_enqueue_script('start-custom-js');



//echo (dirname( __FILE__ ) . '/lib/theme-views.php' );
//echo ( __DIR__ ) . '/lib/theme-views.php' ;
//C:\wamp\www\wp-content\themes\kpm-boxy-slider/lib/theme-views.php
//C:\wamp\www\wp-content\themes\kpm-boxy-slider/lib/theme-views.php