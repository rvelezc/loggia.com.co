<?php get_header('transparent'); 

/*
Template Name: Home Video
*/

?>



	
		<?php while ( have_posts() ) : the_post(); 
		

			get_template_part( 'inc/format/content', 'page-video' );
					
		endwhile; // end of the loop. ?>




<?php get_footer(); ?>