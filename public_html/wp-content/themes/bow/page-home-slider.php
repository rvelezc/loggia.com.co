<?php get_header( 'transparent' ); 

/*
Template Name: Home Slider
*/

?>
	
		<?php while ( have_posts() ) : the_post(); 
		

			get_template_part( 'inc/format/content', 'page-slider' );
					
		endwhile; // end of the loop. ?>




<?php get_footer(); ?>