<?php

/*
Plugin Name: WP Better Admin
Plugin URI: http://netzstoffi.de
Description: A nicer and cleaner WordPress Administration
Author: Stefan Böttcher
Version: 1.0
Author URI: http://netzstoffi.de
*/

add_filter('show_admin_bar', '__return_false');

add_action( 'admin_enqueue_scripts', 'add_google_font' );

function add_google_font() {
  wp_enqueue_style( 'my-google-font', '//fonts.googleapis.com/css?family=Roboto' );
}
  
function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style',900);
//add_action('login_enqueue_scripts', 'my_admin_theme_style');

/** Add Shadow to Admin Bar **/
function admin_shadow() {
   global $wp_admin_bar;
   
	$img = plugins_url('wall.jpg', __FILE__);
	//if(!empty( get_background_image() )) { $img = get_background_image(); }
	//echo '<style>html { background-image: url('.get_background_image().'); }</style>';
	echo '<style>html { background-image: url('.$img.'); }</style>';
   
}
add_action( 'admin_head', 'admin_shadow', 800 );


function custom_theme_setup() {
	add_theme_support( 'custom-background', $arguments );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

?>