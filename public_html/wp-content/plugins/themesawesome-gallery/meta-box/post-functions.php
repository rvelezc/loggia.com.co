<?php

add_filter( 'cmb_meta_boxes', 'ta_gallery_metaboxes' );

function ta_gallery_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'ta_gallery_';

	// Gallery Client
	$meta_boxes['porto_metabox'] = array(
		'id'         => $prefix . 'metabox',
		'title'      => __( 'Gallery Details', 'tagallery' ),
		'pages'      => array( 'ta-gallery', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, 
		'fields'     => array(





	
		),

	);



	return $meta_boxes;
}

add_action( 'init', 'ta_gallery_initialize_meta_boxes', 9999 );

/**
 * Initialize the metabox class.
 */
function ta_gallery_initialize_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';
}