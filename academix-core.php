<?php
/*
Plugin Name: IMAQ Core 
Plugin URI: https://imaqpress.com/wptheme/imaq-core-plugin/
Description: IMAQ-CORE is a required plugin for Academic Insight Wordpress theme for the global visibility of Scientific content of academic center, research group or independent researcher profile.
Author: M. Irfan-maqsood
Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
Devs: Utpol Deb Nath
Devs URI: https://www.facebook.com/merfanmaqsood
Version: 1.2.1
Text Domain: imaq-core

*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// rushmore the excerpt
function rushmore_excerpt( $id, $length = 200 ){
    return substr( get_the_content($id), 0, $length );
}

// get team category list
function rushmore_get_team_categories( ) {
	
	$categories = get_terms('team_cat', array( 'hide_empty' => false) );

    $cats = array( '' => esc_html__( '-- Select a category --', 'IMAQ' ) );

	if ( !is_wp_error($categories) && !empty( $categories ) ) {
        foreach ($categories as $category) {
            $cats[$category->slug] = $category->slug;
        }
	}

	return $cats;
}

function rushmore_get_book_categories( ) {

	$categories = get_terms('book_cat', array( 'hide_empty' => false) );

    $cats = array( '' => esc_html__( '-- Select a category --', 'IMAQ' ) );

	if ( !is_wp_error($categories) && !empty( $categories ) ) {
        foreach ($categories as $category) {
            $cats[$category->slug] = $category->slug;
        }
	}

	return $cats;
}


function rushmore_get_team_slug_list(){
	$args = wp_parse_args( array(
		'post_type' => 'team',
		'numberposts' => -1,
	));

	$posts = get_posts( $args );

	$post_options = array();
	if( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->post_name ] = $post->post_name;
		}
	}

	return $post_options;
}

function IMAQ_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
	return $attachment[0];
}

function IMAQ_get_fluent_form_names() {
	if( !defined('FLUENTFORM')){
		return;
	}

	global $wpdb;
	$table_name = $wpdb->prefix .'fluentform_forms';
	$fluent_cf_list = $wpdb->get_results(
		"
			SELECT id, title
			FROM `$table_name`
		"
	);

	$fluent_cf_val = array();
	if ( $fluent_cf_list ) {

		$fluent_cf_val[] = esc_html__( 'Select Contact Form', 'IMAQ' );
		foreach ( $fluent_cf_list as $value ) {
			$fluent_cf_val[$value->id] = $value->title;
		}

	} else {

		$fluent_cf_val[0] = esc_html__( 'No contact forms found', 'IMAQ' );

	}

	return $fluent_cf_val;

}
// Define
define( 'RUSHMORE_ACC_PATH', plugin_dir_path( __FILE__ ) );


// Theme Settings
require_once( RUSHMORE_ACC_PATH . 'libs/AcademixCorePermalink.php');

// Theme custom posts
require_once( RUSHMORE_ACC_PATH . 'custom-posts/team.php');
require_once( RUSHMORE_ACC_PATH . 'custom-posts/event.php');
require_once( RUSHMORE_ACC_PATH . 'custom-posts/book.php');
require_once( RUSHMORE_ACC_PATH . 'custom-posts/journal-article.php');


// Print shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );


// Loading kc addons
require_once( RUSHMORE_ACC_PATH . 'kc-addons/kc-blocks-load.php');

// Theme shortcodes
require_once( RUSHMORE_ACC_PATH . 'shortcodes/slides-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/info-block-image-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/info-block-icon-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/about-us-block-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/video-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/fun-facts-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/button-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/team-list-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/profile-card-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/team-profile-section-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/event-list-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/conference-list-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/book-list-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/journal-article-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/address-block-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/contact-info-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/latest-event-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/selected-publications-shortcode.php');
require_once( RUSHMORE_ACC_PATH . 'shortcodes/fluent-form-shortcode.php');


// Depended shortcodes on king composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'kingcomposer/kingcomposer.php') ){
	//require_once( RUSHMORE_ACC_PATH . 'shortcodes/team-shortcode.php');
}

// Registering rushmore toolkit files
function rushmore_core_scripts() {
	wp_enqueue_style( 'sequence-theme-basic', plugin_dir_url( __FILE__ ) . 'assets/css/sequence-theme.basic.min.css' );
	wp_enqueue_style( 'ekko-lightbox', plugin_dir_url( __FILE__ ) . 'assets/css/ekko-lightbox.min.css' );
	

	wp_enqueue_script( 'hammer-min', plugin_dir_url( __FILE__ ) . 'assets/js/hammer.min.js', array('jquery'), '20181415', true );
	wp_enqueue_script( 'imagesloaded');
	wp_enqueue_script( 'sequence-min', plugin_dir_url( __FILE__ ) . 'assets/js/sequence.min.js', array('jquery'), '20181415', true );
	wp_enqueue_script( 'ekko-lightbox', plugin_dir_url( __FILE__ ) . 'assets/js/ekko-lightbox.min.js', array('jquery'), '20181415', true );
	wp_enqueue_script( 'rushmore-shortcode-main', plugin_dir_url( __FILE__ ) . 'assets/js/shortcode.main.js', array('jquery'), '20181416', true );
}
add_action( 'wp_enqueue_scripts', 'rushmore_core_scripts' );








