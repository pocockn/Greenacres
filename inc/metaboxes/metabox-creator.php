<?php
include('meta_box.php');
$prefix = 'greenacre_';

$fields = array(
	array( // Text Input
		'label'	=> 'Book Now Link', // <label>
		'desc'	=> 'A description for the field.', // description
		'id'	=> $prefix.'text', // field id and name
		'type'	=> 'text' // type of field
	),
	array( // Repeatable & Sortable Text inputs
		'label'	=> 'Repeatable', // <label>
		'desc'	=> 'A description for the field.', // description
		'id'	=> $prefix.'repeatable', // field id and name
		'type'	=> 'repeatable', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			'featured' => array(
				'label' => 'Amenities',
				'id' => 'amenitie',
				'type' => 'text'
			)
		)
	)
);
/**
 * Instantiate the class with all variables to create a meta box
 * var $id string meta box id
 * var $title string title
 * var $fields array fields
 * var $page string|array post type to add meta box to
 * var $js bool including javascript or not
 */
$sample_box = new custom_add_meta_box( 'single_room', 'Single Room Details', $fields, 'room', 'normal', 'low', true );

/**
 * Metaboxes for the iframes for google maps on certain pages
 */

$fields_template = array(
	array( // Text Input
		'label'	=> 'Iframe Link', // <label>
		'desc'	=> 'Enter an iframe link.', // description
		'id'	=> $prefix.'iframe', // field id and name
		'type'	=> 'text' // type of field
	)
);

$iframe_box = new custom_add_meta_box( 'iframe_box', 'Page Template iFrame', $fields_template, 'page', 'normal', 'low', true );

/**
 * Metaboxes for repeatable image fields on the gallery CPT pages
 */

$gallery_repeatable = array(
	array( // Repeatable & Sortable Text inputs
		'label'	=> 'Gallery Images', // <label>
		'desc'	=> 'Add images to appear in a gallery.', // description
		'id'	=> $prefix.'repeatable', // field id and name
		'type'	=> 'repeatable', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			'featured' => array(
				'label'	=> 'Image', // <label>
				'id'	=> 'image', // field id and name
				'type'	=> 'image' // type of field
			)
		)
	)
);

$gallery_repeatable_meta = new custom_add_meta_box( 'gallery_image', 'Gallery Images', $gallery_repeatable, 'gallery', 'normal', 'low', true );