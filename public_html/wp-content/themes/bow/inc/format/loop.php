<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-loop clearfix' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumb">
			<?php the_post_thumbnail( 'bow-loop-thumb' ); ?>
		</div><!-- post thumb -->
		<?php } ?>
		<div class="post-info">				
			<div class="title">	<h2><?php the_title(); ?></h2></div>
			<div class="date"><?php echo get_the_date(); ?></div>
		</div>			
	</a>
</article><!-- #post-<?php the_ID(); ?> -->