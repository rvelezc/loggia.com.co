<?php
	/*
	Plugin Name: ThemesAwesome Gallery
	Plugin URI: http://www.themesawesome.com
	Description: A light plugin to add gallery post type from Themes Awesome
	Version: 1.0
	Author: Themes Awesome
	Author URI: http://www.themesawesome.com
	License: GPL2
	*/



define( 'TA_GALLERY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TA_GALLERY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );



register_activation_hook( __FILE__, array( 'ThemesAwesome Gallery', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'ThemesAwesome Gallery', 'plugin_deactivation' ) );




require_once( TA_GALLERY_PLUGIN_DIR . '/meta-box/post-functions.php' );


function ta_gallery_admin_style() {

}
add_action( 'admin_enqueue_scripts', 'ta_gallery_admin_style' );


function ta_gallery_scripts() {

    if (!is_admin()) { 


    wp_enqueue_script('jquery');
    wp_enqueue_script('wp-mediaelement'); 
    } 
} 

add_action( 'wp_head', 'ta_gallery_scripts',0);

/*-----------------------------------------------------------------------------------*/
/* The Gallery custom post type
/*-----------------------------------------------------------------------------------*/
    add_action('init', 'ta_gallery_register'); 
    function ta_gallery_register() { 


        $labels = array(
            'name'               => _x('Gallery', 'Gallery General Name', 'tagallery'),
            'singular_name'      => _x('Gallery', 'Gallery Singular Name', 'tagallery'),
            'add_new'            => _x('Add New', 'Add New Gallery Name', 'tagallery'),
            'add_new_item'       => __('Add New Gallery', 'tagallery'),
            'edit_item'          => __('Edit Gallery', 'tagallery'),
            'new_item'           => __('New Gallery', 'tagallery'),
            'view_item'          => __('View Gallery', 'tagallery'),
            'search_items'       => __('Search Gallery', 'tagallery'),
            'not_found'          => __('Nothing found', 'tagallery'),
            'not_found_in_trash' => __('Nothing found in Trash', 'tagallery'),
            'parent_item_colon'  => ''
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'supports'           => array('title','thumbnail'),
            'rewrite'            => array('slug' => 'gallery'),
            'exclude_from_search' => true,

        ); 

        register_post_type('ta-gallery' , $args);
            
        register_taxonomy(
                "gallery-category", array("ta-gallery"), array(
                "hierarchical"   => true,
                "label"          => "Categories", 
                "singular_label" => "Categories", 
                "rewrite"        => true));
        register_taxonomy_for_object_type('gallery-category', 'ta-gallery');  


               

    }



            
    function ta_gallery_edit_columns($columns) {  
        $columns = array(  
            "cb"          => "<input type=\"checkbox\" />",  
            "title"       => __('Project', 'tagallery'),  
            "type"        => __('Categories', 'tagallery'),  
            "skill"       => __('Skills', 'tagallery'),
        );    
        return $columns;  
    }    

    add_filter("manage_edit-gallery_columns", "ta_gallery_edit_columns"); 


       
    function ta_gallery_custom_columns($column) {  
        global $post;  
        switch ($column) {  

            case "type":  
                echo get_the_term_list($post->ID, 'gallery-category', '', ', ','');  
                break;            

        }  
    }    

    add_action("manage_posts_custom_column",  "ta_gallery_custom_columns");
