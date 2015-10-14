<?php
$image = get_post_meta( $post->ID, 'bow_background_home_image', true );
$title = get_post_meta( $post->ID, 'bow_title_text_image', true );
$slogan = get_post_meta( $post->ID, 'bow_slogan_text_image', true );
$discover = get_post_meta( $post->ID, 'bow_url_discover_image', true );
?>

<article  id="page-<?php the_ID(); ?>" <?php post_class( 'homepage fullscreen' ); ?>>
	<div class="inner">
		<div class="image" style="background-image:url(<?php echo esc_url( $image ); ?>)"></div>
		<div class="overlay transparent">
			<!-- container -->
			<div class="container vertical-center">
				<div class="sixteen columns">
					<div class="title"><?php echo sanitize_text_field( $title ); ?></div>
					<div class="slogan"><?php echo sanitize_text_field( $slogan ); ?></div>
				</div>
			</div>
			<!-- container -->
			<div class="discover" data-url="<?php echo esc_url( $discover ); ?>"><?php _e( 'Discover', 'bow' ); ?></div>
		</div>
	</div>
</article><!-- #page<?php the_ID(); ?> -->