<?php get_header( 'transparent' ); 

/*
Template Name: About Template
*/

?>

	
		<?php while ( have_posts() ) : the_post(); 
		

			get_template_part( 'inc/format/content', 'page-about' );
					
		endwhile; // end of the loop. ?>

<?php get_footer(); ?>