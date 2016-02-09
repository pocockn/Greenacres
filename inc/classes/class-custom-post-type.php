<?php

/**
* Class for adding all the custom post types in the theme
**/

Class Custom_Post_Type {

	/**
	* A function that will allow the easy creation of custom post types
	**/

	public static function all_custom_post_types() {

		/** 
		* Store our custom post types in a multidimensional array
		*/

		$types = array(

			// Testimonials
			array(
				'the_type'	=> 'testimonials',
				'single'	=>	'Testimonial',
				'plural'	=> 	'Testimonials'
			),

			// Testimonials
			array(
				'the_type'	=> 'room',
				'single'	=>	'Room',
				'plural'	=> 	'Rooms'
			),

			// Testimonials
			array(
				'the_type'	=> 'home-banner',
				'single'	=>	'Home Banner',
				'plural'	=> 	'Home Banner'
			),

			// Testimonials
			array(
				'the_type'	=> 'gallery',
				'single'	=>	'Gallery',
				'plural'	=> 	'Gallery'
			)
		);

		/** 
		* Loop through each array within our main array, extract the relevent data and add the CPT
		*/

		foreach ( $types as $type ) {

			$the_type = $type['the_type'];
			$single = $type['single'];
			$plural = $type['plural'];

			$labels = array(
		    'name' => _x($plural, 'post type general name'),
		    'singular_name' => _x($single, 'post type singular name'),
		    'add_new' => _x('Add New', $single),
		    'add_new_item' => __('Add New '. $single),
		    'edit_item' => __('Edit '.$single),
		    'new_item' => __('New '.$single),
		    'view_item' => __('View '.$single),
		    'search_items' => __('Search '.$plural),
		    'not_found' =>  __('No '.$plural.' found'),
		    'not_found_in_trash' => __('No '.$plural.' found in Trash'),
		    'parent_item_colon' => ''
		  );

			$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'query_var' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'hierarchical' => false,
		    'menu_position' => 5,
		    'supports' => array('title','editor','thumbnail','custom-fields')
		  );

			register_post_type( $the_type, $args );

		}
	}

}
