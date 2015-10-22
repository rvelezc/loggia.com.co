<?php
    
    /****************************************************************************************/
//Shortcode for Artista Post Type
    add_shortcode('artista_q', 'artista_shortcode_query');
    function artista_shortcode_query($atts, $content){
        $args = array('post_type' => 'artista');
        //Define the loop based on arguments
        $loop = new WP_Query( $args );
        //Display the contents
        $out = '';
        while ( $loop->have_posts() ) : $loop->the_post();  
            global $post;
            $out .= '<div>
                        <h4>
                            <a href="'.get_site_url().'/work/'. $post->post_name .'" title="' . get_the_title() . '">'.get_the_title() .'</a>
                        </h4>
                    </div>';
        endwhile;
        //wp_reset_query();
        return html_entity_decode($out);
    }
    
    //Rewrite rules for work
   add_filter( 'query_vars', 'loggia_add_var' ); 
   function loggia_add_var( $vars )
   {
        $vars[] = "lartista";
        $vars[] = "lfoto";
        return $vars;
   }
   function loggia_rewrite() {
        add_rewrite_rule('^work/(.*)/?','index.php?pagename=work&lartista=$matches[1]','top'); 
        add_rewrite_rule('^contact/(.*)/?','index.php?pagename=contact&lfoto=$matches[1]','top');
   }
    add_action('init', 'loggia_rewrite');
    
    add_shortcode('lfoto', 'foto_shortcode_query');
    function foto_shortcode_query($atts, $content){
        $foto = (get_query_var('lfoto')) ? get_query_var('lfoto') : "general";
        return html_entity_decode($foto);
    }



/****************************************************************************************/
    
?>