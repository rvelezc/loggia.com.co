<?php get_header();  ?>


<div class="offset">

	<div class="inner clearfix">


		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'inc/format/loop', get_post_format() );

		endwhile; // end of the loop. ?>	




</div>
		<?php bow_pagination( $pages = '', $range = 2 ); ?>
</div>
<?php get_footer(); ?>