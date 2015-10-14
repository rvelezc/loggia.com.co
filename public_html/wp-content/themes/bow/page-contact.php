<?php get_header(); 

/*
Template Name: Contact Template
*/

?>

	
		<?php while ( have_posts() ) : the_post(); 
		

			get_template_part( 'inc/format/content', 'page-contact' );
					
		endwhile; // end of the loop. ?>

<?php get_footer(); ?>