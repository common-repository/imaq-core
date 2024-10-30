<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// journal article post type
add_action( 'init', 'rushmore_journal_article_custom_post' );
function rushmore_journal_article_custom_post(){

    $cpt_url_slug = 'journal_article';
    $cpt_url_slug = apply_filters('IMAQ_journal_article_cpt_url_slug', $cpt_url_slug);

	$labels = array(
		'name'               => esc_html__( 'Journal Articles', 'IMAQ' ),
		'singular_name'      => esc_html__( 'Journal Article', 'IMAQ' ),
		'menu_name'          => esc_html__( 'Journal Articles', 'IMAQ' ),
		'name_admin_bar'     => esc_html__( 'Journal Articles', 'IMAQ' ),
		'add_new'            => esc_html__( 'Add Journal Article', 'IMAQ' ),
		'add_new_item'       => esc_html__( 'Add New Journal Article', 'IMAQ' ),
		'new_item'           => esc_html__( 'New Journal Article', 'IMAQ' ),
		'edit_item'          => esc_html__( 'Edit Journal Article', 'IMAQ' ),
		'view_item'          => esc_html__( 'View Journal Article', 'IMAQ' ),
		'all_items'          => esc_html__( 'View Journal Articles', 'IMAQ' ),
		'search_items'       => esc_html__( 'Search Journal Article', 'IMAQ' ),
		'parent_item_colon'  => esc_html__( 'Parent Journal Article', 'IMAQ' ),
		'not_found'          => esc_html__( 'No Journal Article found.', 'IMAQ' ),
		'not_found_in_trash' => esc_html__( 'No Journal Article found in Trash', 'IMAQ' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus'  => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
        'rest_base'             => 'journal_article',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'delete_with_user'   => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'can_export'         => true,
		'taxonomies'         => array( 'journal_article_cat' ),
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-welcome-write-blog',
		'rewrite'            => array( 
			'slug'       => $cpt_url_slug, 
			'with_front' => true, 
			'pages'      => true, 
			'feeds'      => false,
		),
		'supports'           => array( 
			'title',
			'author',
			'editor'
		)
	);

	register_post_type( 'journal_article', $args );
}

// Register Custom Taxonomy
function rushmore_journal_article_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Journal Article Sorting Year', 'Taxonomy General Name', 'IMAQ' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'IMAQ' ),
		'menu_name'                  => __( 'Category', 'IMAQ' ),
		'all_items'                  => __( 'All Journal Article Categories', 'IMAQ' ),
		'parent_item'                => __( 'Parent Journal Article', 'IMAQ' ),
		'parent_item_colon'          => __( 'Parent Journal Article:', 'IMAQ' ),
		'new_item_name'              => __( 'New Journal Article Category', 'IMAQ' ),
		'add_new_item'               => __( 'Add New Category', 'IMAQ' ),
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
        'rest_base'                  => 'journal_article_cats',
        'rest_controller_class'      => 'WP_REST_Terms_Controller',
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'journal_article_cat', array( 'journal_article' ), $args );

}
add_action( 'init', 'rushmore_journal_article_custom_taxonomy', 0 );
