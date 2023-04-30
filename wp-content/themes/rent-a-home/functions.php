<?php

/**
 * Function takes care of handling assets with enqueue
 * @return void
 */
function rent_a_home_assets() {
	wp_enqueue_style(
		'rent-a-home',
		get_stylesheet_directory_uri() . '/assets/css/master.css', array(),
		filemtime( get_template_directory() . '/assets/css/master.css' ) );
}

add_action( 'wp_enqueue_scripts', 'rent_a_home_assets' );

/**
 *   Function takes care of custom menu
 *
 * @return void
 */
function rent_a_home_register_nav_menu() {
	register_nav_menus( array(
		'primary_menu' => __( 'Primary Menu', 'rent-a-home' ),
		'footer_menu'  => __( 'Footer Menu', 'rent-a-home' ),
	) );
}

add_action( 'after_setup_theme', 'rent_a_home_register_nav_menu', 0 );
