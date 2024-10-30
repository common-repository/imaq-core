<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// event post type
add_action( 'init', 'rushmore_event_custom_post' );
function rushmore_event_custom_post(){

    $cpt_url_slug = 'rushmore_event';
    $cpt_url_slug = apply_filters('IMAQ_event_cpt_url_slug', $cpt_url_slug);

	$labels = array(
		'name'               => esc_html__( 'Events', 'IMAQ' ),
		'singular_name'      => esc_html__( 'Event', 'IMAQ' ),
		'menu_name'          => esc_html__( 'Events', 'IMAQ' ),
		'name_admin_bar'     => esc_html__( 'Events', 'IMAQ' ),
		'add_new'            => esc_html__( 'Add Event', 'IMAQ' ),
		'add_new_item'       => esc_html__( 'Add New Event', 'IMAQ' ),
		'new_item'           => esc_html__( 'New Event', 'IMAQ' ),
		'edit_item'          => esc_html__( 'Edit Event', 'IMAQ' ),
		'view_item'          => esc_html__( 'View Event', 'IMAQ' ),
		'all_items'          => esc_html__( 'View Events', 'IMAQ' ),
		'search_items'       => esc_html__( 'Search Event', 'IMAQ' ),
		'parent_item_colon'  => esc_html__( 'Parent Event', 'IMAQ' ),
		'not_found'          => esc_html__( 'No Event found.', 'IMAQ' ),
		'not_found_in_trash' => esc_html__( 'No Event found in Trash', 'IMAQ' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus'  => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
        'rest_base'             => 'event',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'delete_with_user'   => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'can_export'         => true,
		'taxonomies'         => array( 'event_cat' ),
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-calendar-alt',
		'rewrite'            => array( 
			'slug'       => $cpt_url_slug, 
			'with_front' => true, 
			'pages'      => true, 
			'feeds'      => false,
		),
		'supports'           => array( 
			'title',
			'thumbnail',
			'editor',
			'excerpt',
			'author'
		)
	);

	register_post_type( 'event', $args );
}


// modify featured image title
add_action( 'admin_head', 'rushmore_event_replace_default_featured_image_meta_box_title', 100 );
function rushmore_event_replace_default_featured_image_meta_box_title() {
    remove_meta_box( 'postimagediv', 'event', 'side' );
    add_meta_box('postimagediv', esc_html__('Upload Banner Image', 'IMAQ'), 'post_thumbnail_meta_box', 'event', 'side', 'default');
}
