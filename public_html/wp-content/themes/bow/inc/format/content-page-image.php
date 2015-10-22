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
				<div class="two columns">
                    <div class="hidden-mobile slogan animated fadeInRight"><?php 
                        
                        $args = array('post_type' => 'artista');
                        //Define the loop based on arguments
                        $loop = new WP_Query( $args );
                        //Display the contents
                        $out = '';
                        while ( $loop->have_posts() ) : $loop->the_post();
                            $out .= '<p style="margin-top: 10px;"><a href="'.get_site_url().'/work/'. $post->post_name .'" title="' . get_the_title() . '">'.get_the_title() .'</a><p/>';
                                    
                        endwhile;
                        echo $out;
                        ?></div>
					
				</div>
                <div class="fourteen columns">
					<div class="title"><?php echo sanitize_text_field( $title ); ?></div>
					<div class="slogan"><?php echo sanitize_text_field( $slogan ); ?></div>
				</div>
			</div>
			<!-- container -->
			<div class="discover hidden-mobile" data-url="<?php echo esc_url( $discover ); ?>"><?php _e( 'Explora tus fotos', 'bow' ); ?></div>
		</div>
	</div>
</article><!-- #page<?php the_ID(); ?> -->