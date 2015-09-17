<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
Requirements: php5.5.*
*/

//// 2020 CPT's

add_action( 'init', function() {
    $singular = 'Speaker';
    $plural = $singular.'s';
    $slug = str_replace(' ', '_', strtolower($singular));

	$labels = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		'name_admin_bar'     => $singular,
		'add_new'            => 'Add New '.$singular,
		'add_new_item'       => 'Add New '.$singular,
		'new_item'           => 'New '.$singular,
		'edit_item'          => 'Edit '.$singular,
		'view_item'          => 'View '.$singular,
		'all_items'          => 'All '.$plural,
		'search_items'       => 'Search '.$plural,
		'parent_item_colon'  => 'Parent '.$plural.': ',
		'not_found'          => 'No '.$plural.' found.',
		'not_found_in_trash' => 'No '.$plural.' found in Trash.',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => ['slug' => $slug],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'  		 => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type( $slug, $args );
});
    
add_action( 'init', function() {
    $singular = 'Testimonial';
    $plural = $singular.'s';
    $slug = str_replace(' ', '_', strtolower($singular));

	$labels = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		'name_admin_bar'     => $singular,
		'add_new'            => 'Add New '.$singular,
		'add_new_item'       => 'Add New '.$singular,
		'new_item'           => 'New '.$singular,
		'edit_item'          => 'Edit '.$singular,
		'view_item'          => 'View '.$singular,
		'all_items'          => 'All '.$plural,
		'search_items'       => 'Search '.$plural,
		'parent_item_colon'  => 'Parent '.$plural.': ',
		'not_found'          => 'No '.$plural.' found.',
		'not_found_in_trash' => 'No '.$plural.' found in Trash.',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => ['slug' => $slug],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'  		 => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type( $slug, $args );
});

/*
add_action( 'init', function() {
    $singular = 'Gallery Image';
    $plural = $singular.'s';
    $slug = str_replace(' ', '_', strtolower($singular));

	$labels = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		'name_admin_bar'     => $singular,
		'add_new'            => 'Add New '.$singular,
		'add_new_item'       => 'Add New '.$singular,
		'new_item'           => 'New '.$singular,
		'edit_item'          => 'Edit '.$singular,
		'view_item'          => 'View '.$singular,
		'all_items'          => 'All '.$plural,
		'search_items'       => 'Search '.$plural,
		'parent_item_colon'  => 'Parent '.$plural.': ',
		'not_found'          => 'No '.$plural.' found.',
		'not_found_in_trash' => 'No '.$plural.' found in Trash.',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => ['slug' => $slug],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
	);

	register_post_type( $slug, $args );
});
*/

///////////////////////////////////////////////////////////////////////////////// Register Taxonomy
// hook into the init action 
add_action( 'init', 'tt_taxonomies', 0 );

function tt_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
    $label_name = 'Type';
    $label_name_plural = 'Types';
    
	$labels = array(
		'name'              => _x( $label_name, 'taxonomy general name' ),
		'singular_name'     => _x( $label_name, 'taxonomy singular name' ),
		'search_items'      => __( 'Search '.$label_name ),
		'all_items'         => __( 'All '.$label_name_plural ),
		'parent_item'       => __( 'Parent '.$label_name ),
		'parent_item_colon' => __( 'Parent '.$label_name.':' ),
		'edit_item'         => __( 'Edit '.$label_name ),
		'update_item'       => __( 'Update '.$label_name ),
		'add_new_item'      => __( 'Add New '.$label_name ),
		'new_item_name'     => __( 'New '.$label_name ),
		'menu_name'         => __( $label_name ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $label_name ),
	);
	register_taxonomy( $label_name, array( 'speaker' ), $args );
}
////////////////////////////////////////////////////////