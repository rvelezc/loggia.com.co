<?php get_header();
/*
Template Name: Work Mansory
*/

wp_enqueue_script( 'bow-isotope', BOW_DIR. '/js/isotope.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'bow-work-mansory', BOW_DIR. '/js/work-mansory.js', array( 'jquery', 'bow-isotope' ), '', true );
?>
<!-- section -->
<section class="work-mansonry" id="work">
	<div class="offset">
		<div class="navigate columns isotope-filter">
		<?php
			  echo '<ul id="options">';
	        echo '<li><a data-filter="*" href="#" class="selected">All Projects</a></li>';
	        $args = array( 'taxonomy'   => 'gallery-category', );
	        $cat_lists = get_categories( $args );

	        foreach ( $cat_lists as $cat_list ) {
	           	$category_name = $cat_list->name;
		        $category_slug = $cat_list->slug;
		            echo '<li><a data-filter=".'. sanitize_text_field( $category_slug ) .'" href="#">' . sanitize_text_field( $category_name ) . '</a></li>';
	            
	        }  

	        echo '</ul>';
	        ?>

		</div>
		
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array(
			'post_type'          => 'ta-gallery',
			'post_status'        => 'publish',
			'posts_per_page'     => -1,
			'paged'				 => $paged
		);
		$query_work = new WP_Query( $args );
		?>
		<div class="navi">
			<?php
				next_posts_link( 'Older Entries', $query_work->max_num_pages );
			?>			
		</div>
		
		<div id="foliowrap" class="portfolio-list isotope-container"> <!-- Isotope -->	
			<?php
			if ( $query_work->have_posts() ) : while ( $query_work->have_posts() ) : $query_work->the_post();

				if ( has_post_thumbnail( $post->ID, 'full' ) ) {
					$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$img_url2 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'bow-port-thumb' );
					$meta = wp_get_attachment_metadata( get_post_thumbnail_id(), true );
					$data = get_post(get_post_thumbnail_id())->post_excerpt;
					$video = get_post_meta( $post->ID, 'bow_video', true );
				}
			$categogry_terms = wp_get_object_terms( $post->ID, 'gallery-category' );
				if ( ! empty( $categogry_terms ) ){
				if ( ! is_wp_error( $categogry_terms ) ){
					foreach ( $categogry_terms as $term ){
									 $category_name = $term->name;
				 $category_slug = $term->slug;
					}
				}
					}
			?>


							
					
	<div class="image foliobox active <?php echo sanitize_text_field( $category_slug ); ?>" data-type="<?php echo sanitize_text_field( $category_slug ); ?>" data-url="<?php echo esc_url( $img_url[0] ); ?>" <?php if($data) { ?> data-description="<?php echo sanitize_text_field( $data ); ?>" <?php } ?>  data-caption="<?php the_title(); ?>" data-album="<?php echo esc_attr( $term->name ); ?>" data-width="<?php echo esc_attr( $meta['width'] ); ?>" data-height="<?php echo esc_attr( $meta['height'] ); ?>" data-video="<?php echo esc_url( $video ); ?>">
		<img src="<?php echo esc_url( $img_url2[0] ); ?>" alt="<?php the_title(); ?>">
	</div>

			<?php endwhile; ?>
			

			<?php wp_reset_postdata(); endif; ?>
		</div>
		<!-- Isotope -->	
	</div>
</section>
<!-- section -->
<!-- footer -->
<footer class="footer">
	<div><?php bow_work_slogan(); ?></div>
</footer>
<!-- header -->
<?php get_footer(); ?>