<?php get_header();
/*
Template Name: Work Template
*/
?>
<!-- section -->
<section class="work" id="work">
	<div class="offset">
		<div class="navigate columns">
			<ul>
				<?php
				echo '<li>All</li>';
				$arg2 = array(
						'taxonomy'   => 'gallery-category',
				);
				$cat_lists = get_categories( $arg2 );
				foreach ( $cat_lists as $cat_list ) {
					$category_name = $cat_list->name;
					$category_slug = $cat_list->slug;
					echo '<li>' . esc_html( $category_name ) . '</li>';
					}
				?>
			</ul>
		</div>

		<?php 




		?>
		
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array(
			'post_type'          => 'ta-gallery',
			'post_status'        => 'publish',
			'posts_per_page'     => 10,
			'paged'				 => $paged
		);

		$args2 = array(
			'post_type'          => 'ta-gallery',
			'post_status'        => 'publish',
			'posts_per_page'     => -1,
			'paged'				 => $paged
		);


		 $infinite_work = get_post_meta( $post->ID, 'bow_infinite_work', true );
		if ( $infinite_work === 'yes') {
		$query_work = new WP_Query( $args );
		}
		if ($infinite_work === 'no') {
		$query_work = new WP_Query( $args2 );
		}


		?>
		<div class="navi">
			<?php
				next_posts_link( 'Older Entries', $query_work->max_num_pages );
			?>			
		</div>
		
		<div class="stream columns">		
			<?php
			if ( $query_work->have_posts() ) : while ( $query_work->have_posts() ) : $query_work->the_post();
				if ( has_post_thumbnail( $post->ID, 'full' ) ) {
					$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$meta = wp_get_attachment_metadata( get_post_thumbnail_id(), true );
					$data = get_post(get_post_thumbnail_id())->post_excerpt;
					$video = get_post_meta( $post->ID, 'bow_video', true );
				}
			$categogry_terms = wp_get_object_terms( $post->ID, 'gallery-category' );
				if ( ! empty( $categogry_terms ) ){
				if ( ! is_wp_error( $categogry_terms ) ){
					foreach ( $categogry_terms as $term ){
					
										}
				}
					}
			?>

			<div class="image" data-url="<?php echo esc_url( $img_url[0] ); ?>" <?php if($data) { ?> data-description="<?php echo sanitize_text_field( $data ); ?>" <?php } ?>  data-caption="<?php the_title(); ?>" data-album="<?php echo esc_attr( $term->name ); ?>" data-width="<?php echo esc_attr( $meta['width'] ); ?>" data-height="<?php echo esc_attr( $meta['height'] ); ?>" data-video="<?php echo esc_url( $video ); ?>"></div>
			<?php endwhile; ?>
			

			<?php wp_reset_postdata(); endif; ?>
		</div>
		<!-- stream -->
	</div>
</section>
<!-- section -->
<!-- footer -->
<footer class="footer">
	<div><?php bow_work_slogan(); ?></div>
</footer>
<!-- header -->
<?php get_footer(); ?>