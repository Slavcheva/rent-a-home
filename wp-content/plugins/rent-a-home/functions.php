<?php

/**
 * Property Enqueue
 */
function rent_a_home_enqueue_scripts() {
	wp_enqueue_script( 'rent-a-home-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'rent-a-home-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}

add_action( 'wp_enqueue_scripts', 'rent_a_home_enqueue_scripts' );

/**
 * Functions takes care of the like of the property
 *
 * @return void
 */
function rent_a_home_property_like() {
	$property_id = esc_attr( $_POST['property_id'] );

	$like_number = get_post_meta( $property_id, 'likes', true );

	if ( empty( $like_number ) ) {
		update_post_meta( $property_id, 'likes', 1 );
	} else {
		$like_number = $like_number + 1;
		update_post_meta( $property_id, 'likes', $like_number );
	}

	wp_die();
}

add_action( 'wp_ajax_nopriv_rent_a_home_property_like', 'rent_a_home_property_like' );
add_action( 'wp_ajax_rent_a_home_property_like', 'rent_a_home_property_like' );


/**
 * Display a single post term
 *
 * @param  $property_id
 * @param $taxonomy
 *
 * @return string|void
 */
function rent_a_home_display_single_term($property_id, $taxonomy ) {
	if ( empty( $property_id) || empty( $taxonomy ) ) {
		return;
	}

	$terms  = get_the_terms( $property_id, $taxonomy );
	$output = '';
	if ( ! empty( $terms ) && is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$output .= $term->name . ', ';
		}
	}

	return $output;
}

/**
 * This function update the property post meta for the views count
 *
 * @param [type] $post_id
 *
 * @return void
 */

function rent_a_home_update_property_views_count( $post_id = 0 ) {
	if ( empty( $post_id ) ) {
		return;
	}

	$view_count = get_post_meta( $post_id, 'views_count', true );

	if ( ! empty( $view_count ) ) {
		$view_count = $view_count + 1;
	} else {
		$view_count = 1;
	}
	update_post_meta( $post_id, 'views_count', $view_count );

}

//function rent_a_home_display_other_properties_per_location( $property_id ) {
//	if ( empty( $property_id ) ) {
//		return;
//	}
//
//	$properties_args = array(
//		'post_type'         => 'property',
//		'post_status'       => 'publish',
//		'orderby'           => 'name',
//		'posts_per_page'    => 2,
//
//		// set a taxonomy query
//	);
//
//	$properties_query = new WP_Query( $properties_args );
//
//
//	if ( ! empty( $properties_query ) ) {
//		?>
    <!--		<ul class="properties-listing">-->
    <!--			--><?php //foreach( $properties_query->posts as $property ) { ?>
    <!---->
    <!--				<li class="property-card">-->
    <!--					<div class="property-primary">-->
    <!--						<h2 class="property-title"><a href="#">--><?php //echo $property->post_title; ?><!--</a></h2>-->
    <!---->
    <!--						<h2 class="property-title"><a href="#">Two-bedroom apartment</a></h2>-->
    <!--						<div class="property-meta">-->
    <!--							<span class="meta-location">Ovcha Kupel, Sofia</span>-->
    <!--							<span class="meta-total-area">Total area: 99.50 sq.m</span>-->
    <!--						</div>-->
    <!--						<div class="property-details">-->
    <!--							<span class="property-price">€ 100,815</span>-->
    <!--							<span class="property-date">Posted 14 days ago</span>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--					<div class="property-image">-->
    <!--						<div class="property-image-box">-->
    <!--							<img src="assets/images/bedroom.jpg" alt="property image">-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</li>-->
    <!---->
    <!--			--><?php //} ?>
    <!--		</ul>-->
    <!--		--><?php
//	}
//}