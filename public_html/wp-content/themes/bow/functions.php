<?php

define('BOW_DIR', get_template_directory_uri());
define('BOW_TEMPLATE_DIR', get_template_directory());
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );








//Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1170; /* pixels */

/*-----------------------------------------------------------------------------------*/
/*  SETUP THEME
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'bow_setup' ) ) :

	function bow_setup() {
		// several theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );	
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		load_theme_textdomain( 'bow', BOW_TEMPLATE_DIR .'/languages' );

}
endif;
add_action( 'after_setup_theme', 'bow_setup' );



function bow_thumbnail_setup() {

add_image_size( 'bow-loop-thumb', 638, 200, true ); 
add_image_size( 'bow-port-thumb', 600); 
}

add_action('after_setup_theme', 'bow_thumbnail_setup');
/*-----------------------------------------------------------------------------------*/
/*  SCRIPTS & STYLES
/*-----------------------------------------------------------------------------------*/

function bow_scripts() {

//All necessary CSS
wp_enqueue_style( 'bow-plugin-css', BOW_DIR .'/css/plugin.css', array(), null );
wp_enqueue_style( 'bow-style', get_stylesheet_uri(), array( 'bow-plugin-css' ) );
wp_enqueue_style( 'bow-font', BOW_DIR .'/css/font.css', array(), null );

//All Necessary Script
wp_enqueue_script( 'bow-modernizr', BOW_DIR. '/js/modernizr.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'bow-respond', BOW_DIR. '/js/respond.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'bow-flexslider', BOW_DIR. '/js/flexslider.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'bow-popup', BOW_DIR. '/js/magnific-popup.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-scrollbar', BOW_DIR. '/js/scrollbar.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-waypoint', BOW_DIR. '/js/waypoints.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-fitvids', BOW_DIR. '/js/fitvids.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-ifr', BOW_DIR. '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-main-js', BOW_DIR. '/js/main.js', array( 'jquery', 'jquery-ui-core' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'bow_scripts' );


function bow_admin_scripts() {
wp_enqueue_script( 'bow-admin-js', BOW_DIR. '/js/admin-js.js', array( 'jquery' ), '', true );
}

add_action( 'admin_enqueue_scripts', 'bow_admin_scripts' );

/*-----------------------------------------------------------------------------------*/
/*  CALL FRAMEWORK
/*-----------------------------------------------------------------------------------*/

require_once( BOW_TEMPLATE_DIR . '/inc/option/core/framework.php' );
require_once( BOW_TEMPLATE_DIR . '/inc/option/panel/config.php' );


/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/

//Register Menus
register_nav_menu( 'header-menu', 'Header Menu' ); 

//TOP MENU
function bow_top_nav_menu(){
  wp_nav_menu( array(
	'theme_location' => 'header-menu',
	'container'       => 'ul',
   'menu_class'      => 'themenu',
	'fallback_cb'  => 'bow_header_menu_cb'
  ));
}

// FALLBACK IF PRIMARY MENU HAVEN'T SET YET
function bow_header_menu_cb() {
  echo '<ul id="menu-top-menu" class="themenu">';
  wp_list_pages('title_li=');
  echo '</ul>';
}

/*-----------------------------------------------------------------------------------*/
/*  HEADER
/*-----------------------------------------------------------------------------------*/

// logo text or image huh?
function bow_logo_type(){

$options = get_option('bow_framework');
$logo = '';
if (isset($options['logo_upload'])) {
$logo = $options['logo_upload'];
$upload_logo = $logo['url'];
}


if ( ! empty( $upload_logo ) ) { ?>

	<div class="logo-image">
	<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url($upload_logo); ?>" class="image-logo" alt="logo" /></a>
	</div>
	
	<?php } else { ?> 
	
	<div class="logo-title">
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
	</div>

<?php }
} 


/*-----------------------------------------------------------------------------------*/
/*  PAGINATION
/*-----------------------------------------------------------------------------------*/

function bow_pagination($pages = '', $range = 2)
{  
		 $showitems = ($range * 2)+1;  

		 global $paged;
		 if(empty($paged)) $paged = 1;

		 if($pages == '')
		 {
				 global $wp_query;
				 $pages = $wp_query->max_num_pages;
				 if(!$pages)
				 {
						 $pages = 1;
				 }
		 }   

		 if(1 != $pages)
		 {
				 echo "<div class='pagination'>";
				 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>First</a>";
				 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

				 for ($i=1; $i <= $pages; $i++)
				 {
						 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
						 {
								 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
						 }
				 }

				 if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
				 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last</a>";
				 echo "</div>\n";
		 }
}




/*-----------------------------------------------------------------------------------*/
/*  CUSTOM FUNCTIONS
/*-----------------------------------------------------------------------------------*/
require_once( BOW_TEMPLATE_DIR . '/inc/function/custom.php' );
require_once( BOW_TEMPLATE_DIR . '/inc/function/navigation.php' );
require_once( BOW_TEMPLATE_DIR . '/inc/function/comment.php' );
require_once( BOW_TEMPLATE_DIR . '/inc/function/akmanda-customizer.php' );
require_once( BOW_TEMPLATE_DIR . '/inc/meta-box/post-functions.php' );

// INSTALL NECESSARY PLUGINS
require_once( BOW_TEMPLATE_DIR . '/class-tgm.php' ); /*activate plugin function*/

