<?php get_header();  ?>

<div class="offset">

	<div class="inner clearfix">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); 


					get_template_part( 'inc/format/loop', get_post_format() );

				endwhile; ?>
				
			<?php else : ?>

			<?php get_template_part( 'inc/format/content', 'no-result' ); ?>

			<?php endif; ?>

</div>
		<?php bow_pagination( $pages = '', $range = 2 ); ?>
</div>


<?php get_footer(); ?>