<?php
/**
 * Register a custom post type called "home".
 *
 * @see get_post_type_labels() for label keys.
 */
function rent_a_home_homes_cpt() {
	$labels = array(
		'name'                  => _x( 'Homes', 'Post type general name', 'rent-a-home' ),
		'singular_name'         => _x( 'Home', 'Post type singular name', 'rent-a-home' ),
		'menu_name'             => _x( 'Homes', 'Admin Menu text', 'rent-a-home' ),
		'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'rent-a-home' ),
		'add_new'               => __( 'Add New', 'rent-a-home' ),
		'add_new_item'          => __( 'Add New Home', 'rent-a-home' ),
		'new_item'              => __( 'New Home', 'rent-a-home' ),
		'edit_item'             => __( 'Edit Home', 'rent-a-home' ),
		'view_item'             => __( 'View Home', 'rent-a-home' ),
		'all_items'             => __( 'All Homes', 'rent-a-home' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
		'show_in_rest'       => true
	);

	register_post_type( 'home', $args );

	flush_rewrite_rules();
}
add_action( 'init', 'rent_a_home_homes_cpt' );


/**
 * Register a 'location' taxonomy for post type 'home', with a rewrite to match home CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function rent_a_home_location_taxonomy() {
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name', 'rent-a-home' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'rent-a-home' ),
		'search_items'      => __( 'Search Locations', 'rent-a-home' ),
		'all_items'         => __( 'All Locations', 'rent-a-home' ),
		'parent_item'       => __( 'Parent Location', 'rent-a-home' ),
		'parent_item_colon' => __( 'Parent Location:', 'rent-a-home' ),
		'edit_item'         => __( 'Edit Location', 'rent-a-home' ),
		'update_item'       => __( 'Update Location', 'rent-a-home' ),
		'add_new_item'      => __( 'Add New Location', 'rent-a-home' ),
		'new_item_name'     => __( 'New Location Name', 'rent-a-home' ),
		'menu_name'         => __( 'Location', 'rent-a-home' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'       => true,
	);

	register_taxonomy( 'location', 'home',$args );
}
add_action( 'init', 'rent_a_home_location_taxonomy');

