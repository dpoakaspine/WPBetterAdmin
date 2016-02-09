<?php

/*
Plugin Name: WP Better Admin
Plugin URI: http://netzstoffi.de
Description: A nicer and cleaner WordPress Administration
Author: Stefan Böttcher
Version: 1.0
Author URI: http://netzstoffi.de
*/

//hide admin bar
add_filter('show_admin_bar', '__return_false');

add_action( 'admin_head', 'zm_customize_admin', 800 );
add_action( 'after_setup_theme', 'zm_theme_setup' );
add_action( 'admin_enqueue_scripts', 'zm_add_google_font' );
add_action('admin_enqueue_scripts', 'zm_admin_theme_style',900);

function zm_add_google_font() {
  wp_enqueue_style( 'my-google-font', '//fonts.googleapis.com/css?family=Roboto' );
}

function zm_admin_theme_style() {
    wp_enqueue_style('zm-admin-theme', plugins_url('admin.css', __FILE__));
}

//add shadow+background image for admin
function zm_customize_admin() {
   global $wp_admin_bar;

	$img = plugins_url('wall.jpg', __FILE__);
  $background_image = false;

  //for older wp versions
  if(function_exists('get_background_image')) { $background_image = get_background_image(); }

  //check if there is actually an image
  if(!empty( $background_image )) { $img = $background_image; }

  //
	echo '<style>html { background-image: url('.$img.'); }</style>';
}

function zm_theme_setup() {
  add_theme_support( 'custom-background', $arguments );
}

?>
