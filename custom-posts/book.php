<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// book post type
add_action( 'init', 'rushmore_book_custom_post' );
function rushmore_book_custom_post(){

    $cpt_url_slug = 'rushmore_book';
    $cpt_url_slug = apply_filters('IMAQ_book_cpt_url_slug', $cpt_url_slug);

	$labels = array(
		'name'               => esc_html__( 'Books', 'IMAQ' ),
		'singular_name'      => esc_html__( 'Book', 'IMAQ' ),
		'menu_name'          => esc_html__( 'Books', 'IMAQ' ),
		'name_admin_bar'     => esc_html__( 'Books', 'IMAQ' ),
		'add_new'            => esc_html__( 'Add Book', 'IMAQ' ),
		'add_new_item'       => esc_html__( 'Add New Book', 'IMAQ' ),
		'new_item'           => esc_html__( 'New Book', 'IMAQ' ),
		'edit_item'          => esc_html__( 'Edit Book', 'IMAQ' ),
		'view_item'          => esc_html__( 'View Book', 'IMAQ' ),
		'all_items'          => esc_html__( 'View Books', 'IMAQ' ),
		'search_items'       => esc_html__( 'Search Book', 'IMAQ' ),
		'parent_item_colon'  => esc_html__( 'Parent Book', 'IMAQ' ),
		'not_found'          => esc_html__( 'No Book found.', 'IMAQ' ),
		'not_found_in_trash' => esc_html__( 'No Book found in Trash', 'IMAQ' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus'  => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
        'rest_base'             => 'book',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'delete_with_user'   => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'can_export'         => true,
		'taxonomies'         => array( 'book_cat' ),
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-book',
		'rewrite'            => array( 
			'slug'       => $cpt_url_slug, 
			'with_front' => true, 
			'pages'      => true, 
			'feeds'      => false,
		),
		'supports'           => array( 'title', 'editor' )
	);

	register_post_type( 'book', $args );
}

// Register Custom Taxonomy
function rushmore_book_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Book Sorting Year', 'Taxonomy General Name', 'IMAQ' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'IMAQ' ),
		'menu_name'                  => __( 'Category', 'IMAQ' ),
		'all_items'                  => __( 'All Book Categories', 'IMAQ' ),
		'parent_item'                => __( 'Parent Item', 'IMAQ' ),
		'parent_item_colon'          => __( 'Parent Item:', 'IMAQ' ),
		'new_item_name'              => __( 'New Book Category', 'IMAQ' ),
		'add_new_item'               => __( 'Add Book Category', 'IMAQ' ),
		'edit_item'                  => __( 'Edit Category', 'IMAQ' ),
		'update_item'                => __( 'Update Category', 'IMAQ' ),
		'view_item'                  => __( 'View Item', 'IMAQ' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'IMAQ' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'IMAQ' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'IMAQ' ),
		'popular_items'              => __( 'Popular Items', 'IMAQ' ),
		'search_items'               => __( 'Search Items', 'IMAQ' ),
		'not_found'                  => __( 'Not Found', 'IMAQ' ),
		'no_terms'                   => __( 'No items', 'IMAQ' ),
		'items_list'                 => __( 'Items list', 'IMAQ' ),
		'items_list_navigation'      => __( 'Items list navigation', 'IMAQ' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest'               => true,
        'rest_base'                  => 'book_cats',
        'rest_controller_class'      => 'WP_REST_Terms_Controller',
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'book_cat', array( 'book' ), $args );

}
add_action( 'init', 'rushmore_book_custom_taxonomy', 0 );
