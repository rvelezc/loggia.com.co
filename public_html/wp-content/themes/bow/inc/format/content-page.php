<?php
$cover = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
?>
<article  id="page-<?php the_ID(); ?>" <?php post_class( 'page fullscreen' ); ?>>
	<div class="cover inner" style="background-image:url(<?php echo esc_url( $cover ); ?>)">
		<div class="content">
			<div class='text'>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			</div>			
		</div>
	</div>
</article><!-- #page<?php the_ID(); ?> -->