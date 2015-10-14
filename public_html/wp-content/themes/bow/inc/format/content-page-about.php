<?php 
$cover = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
$slogan = get_post_meta( $post->ID, 'bow_slogan_about', true );
$slogan_url = get_post_meta( $post->ID, 'bow_slogan_url_about', true );
?>
<article  id="page-<?php the_ID(); ?>" <?php post_class( 'about page fullscreen' ); ?>>
	<div class="cover inner" style="background-image:url(<?php echo esc_url( $cover ); ?>)">
		<div class="content">
			<div class='text'>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			</div>
			<div class="info">
				<div class="link" data-url="<?php echo esc_url( $slogan_url );?>"><?php esc_html_e( $slogan , 'bow' ); ?></div>
			</div>
			
		</div>
	</div>
</article><!-- #page<?php the_ID(); ?> -->