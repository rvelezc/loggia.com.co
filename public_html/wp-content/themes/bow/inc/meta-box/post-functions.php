<?php

add_filter( 'cmb_meta_boxes', 'bow_metaboxes' );

function bow_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'bow_';

	

	$meta_boxes['porto_metabox'] = array(
		'id'         => $prefix . 'metabox',
		'title'      => __( 'Gallery Details', 'tagallery' ),
		'pages'      => array( 'ta-gallery', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, 
		'fields'     => array(


			array(
				'name' => __( 'Video Link', 'tagallery' ),
				'desc' => __( 'Enter an link of video (optional) (NOTE: INCLUDE HTTP://)', 'tagallery' ),
				'id'   => $prefix . 'video',
				'type' => 'text_url',

			),


	
		),

	);

	$meta_boxes['bow_image_metabox'] = array(
		'id'         => $prefix . 'image_metabox',
		'title'      => __( 'Bow Home Image Options', 'bow' ),
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, 
		'fields'     => array(
				array(
				    'name' => 'Background Image File',
				    'desc' => 'Upload an image or enter an URL.',
				    'id' => $prefix . 'background_home_image',
				    'type' => 'file',
				    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),	

				array(
				'name' => __( 'Title Text', 'bow' ),
				'id'   => $prefix . 'title_text_image',
				'type' => 'text_medium',
				),

				array(
				'name' => __( 'Slogan Text', 'bow' ),
				'id'   => $prefix . 'slogan_text_image',
				'type' => 'text_medium',
				),

				array(
					'name' => __( 'Url Discover', 'bow' ),
					'desc' => __( 'Add url here (use http://)', 'bow' ),
					'id'   => $prefix . 'url_discover_image',
					'type' => 'text_url',

				),
		
		),

	);

	$meta_boxes['bow_video_metabox'] = array(
			'id'         => $prefix . 'video_metabox',
			'title'      => __( 'Bow Home Video Options', 'bow' ),
			'pages'      => array( 'page' ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, 
			'fields'     => array(

					array(
					    'name' => 'Background Video File',
					    'desc' => 'Upload a video or enter an URL.',
					    'id' => $prefix . 'background_home_video',
					    'type' => 'file',
					    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
					),		

					array(
					'name' => __( 'Title Text', 'bow' ),
					'id'   => $prefix . 'title_text_video',
					'type' => 'text_medium',
					),

					array(
					'name' => __( 'Slogan Text', 'bow' ),
					'id'   => $prefix . 'slogan_text_video',
					'type' => 'text_medium',
					),

					array(
						'name' => __( 'Url Discover', 'bow' ),
						'desc' => __( 'Add url here (use http://)', 'bow' ),
						'id'   => $prefix . 'url_discover_video',
						'type' => 'text_url',

					),
				
			),

		);


	$meta_boxes['bow_contact_metabox'] = array(
			'id'         => $prefix . 'contact_metabox',
			'title'      => __( 'Bow Contact Page Options', 'bow' ),
			'pages'      => array( 'page' ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, 
			'fields'     => array(


					array(
					'name' => __( 'Email Address', 'bow' ),
					'id'   => $prefix . 'email_address_contact',
					'type' => 'text_medium',
					),

					array(
					'name' => __( 'Phone Number', 'bow' ),
					'id'   => $prefix . 'phone_number_contact',
					'type' => 'text_medium',
					),

					array(
					'name' => __( 'Address', 'bow' ),
					'id'   => $prefix . 'address_contact',
					'type' => 'text_medium',
					),

					array(
						'name' => __( 'Gmaps Url', 'bow' ),
						'desc' => __( 'Add url here (use http://)', 'bow' ),
						'id'   => $prefix . 'gmaps_url_contact',
						'type' => 'text_url',
					),


				
			),

		);

		$meta_boxes['bow_about_metabox'] = array(
			'id'         => $prefix . 'about_metabox',
			'title'      => __( 'Bow About Page Options', 'bow' ),
			'pages'      => array( 'page' ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, 
			'fields'     => array(

					array(
					'name' => __( 'Slogan', 'bow' ),
					'id'   => $prefix . 'slogan_about',
					'type' => 'text_medium',
					),

					array(
						'name' => __( 'Slogan Url', 'bow' ),
						'desc' => __( 'Add url here (use http://)', 'bow' ),
						'id'   => $prefix . 'slogan_url_about',
						'type' => 'text_url',
					),


				
			),

		);

		$meta_boxes['bow_gallery_metabox'] = array(
			'id'         => $prefix . 'gallery_metabox',
			'title'      => __( 'Bow Work Page Options', 'bow' ),
			'pages'      => array( 'page' ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, 
			'fields'     => array(

					array(
						'name' => __( 'Use Infinite Scroll', 'bow' ),
						'id'   => $prefix . 'infinite_work',
						'type' => 'select',
						'options' => array(
				        'yes' => __( 'YES', 'bow' ),
				        'no'   => __( 'NO', 'bow' ),
								    ),
						'default' => 'no',
					),


				
			),

		);



	return $meta_boxes;
}

add_action( 'init', 'bow_initialize_meta_boxes', 9999 );

/**
 * Initialize the metabox class.
 */
function bow_initialize_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';
}