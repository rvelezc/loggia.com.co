<?php
$gallery = get_post_gallery( get_the_ID(), false );
$test = $gallery['ids'];

$test2 = explode(",", $test);

$images = get_children( array(
	'post_parent' => $post->ID,
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'post_status' => null,
	'orderby' => 'menu_order',
	) );


?>
<article  id="page-<?php the_ID(); ?>" <?php post_class( 'homepage fullscreen' ); ?>>
	<div class="inner">
		<div class="slider">
			<ul class="slides">
				<?php 
				foreach ( $test2 as $attachment_id ): 
				$imageurl = wp_get_attachment_url( $attachment_id );
				$link = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
				$attachment = get_post($attachment_id, false);			
				?>
				<li class="slide" data-url="<?php echo esc_url( $imageurl ); ?>">
					<div class="overlay transparent">
						<!-- container -->
						<div class="container vertical-center">
							<div class="sixteen columns">
								<div class="title"><?php echo esc_html( $attachment->post_title ); ?></div>
								<div class="slogan"><?php echo esc_html( $attachment->post_excerpt ); ?></div>
							</div>							
						</div>
						<!-- container -->
						<div class="discover" data-url="<?php echo esc_url( $link ); ?>"><?php _e( 'Discover', 'bow' ); ?></div>
					</div>					
				</li>
				<?php endforeach;  ?>
			</ul>
		</div>
		<!-- slider -->
	</div>
</article><!-- #page<?php the_ID(); ?> -->

