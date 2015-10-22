<?php 
/*
Template Name: Work Template
*/
get_header();

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





?>
<!-- section -->
<section class="work" id="work">
	
    <div class="offset">
        <div class="navigate columns">
			
            <ul>
                <?php
                 $artista_slug = (get_query_var('lartista')) ? get_query_var('lartista') : "todos";
                    $args = array(
                            'name'        => $artista_slug,
                            'post_type'   => 'artista',
                            'numberposts' => 1
                    );
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $p ) : setup_postdata( $p ); 
                        echo '<h2>';
                        echo '    <a href="http://www.loggia.com.co/artista/' . $p->post_name . '">' . $p->post_title . '</a>';
                        echo '</h2>';
                        //echo '<pre>';print_r($p);echo '</pre>';
                    endforeach;    
                ?>
            </ul>
            
            <ul>
				<?php
                
                //Get the cats
                if ( $infinite_work === 'yes') {
                    $query_work = new WP_Query( $args );
                }
                if ($infinite_work === 'no') {
                    $query_work = new WP_Query( $args2 );
                }
                $cat = array();
                if ( $query_work->have_posts() ) : while ( $query_work->have_posts() ) : $query_work->the_post();
                    $art2 = get_field('artista', $post->ID);
                    if ($art2[0]->post_name == $artista_slug){
                        $categogry_terms = wp_get_object_terms( $post->ID, 'gallery-category' );
                        if ( ! empty( $categogry_terms ) ){
                            if ( ! is_wp_error( $categogry_terms ) ){
                                foreach ( $categogry_terms as $term ){ 
                                    if(!in_array($term->name, $cat, true)){
                                        $cat[]=$term->name;
                                    }
                                }
                            }
                        }
                    }
                endwhile; wp_reset_postdata(); endif;
                
                echo '<li>All</li>';
                foreach ($cat as $c){
                    echo '<li>' . esc_html( $c ) . '</li>';
                }
                
                /*echo '<li>All</li>';
				$arg2 = array(
						'taxonomy'   => 'gallery-category',
				);
				$cat_lists = get_categories( $arg2 );
				foreach ( $cat_lists as $cat_list ) {
					$category_name = $cat_list->name;
					$category_slug = $cat_list->slug;
					echo '<li>' . esc_html( $category_name ) . '</li>';
					}
                */
				?>
			</ul>
            
		</div>

		<?php
		
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
					$data =  $post->post_title;
					$video = get_post_meta( $post->ID, 'bow_video', true );
                    $art2 = get_field('artista', $post->ID);
                    //echo '<pre>'; print_r($post);echo '</pre>'; 
				}
			$categogry_terms = wp_get_object_terms( $post->ID, 'gallery-category' );
				if ( ! empty( $categogry_terms ) ){
				if ( ! is_wp_error( $categogry_terms ) ){
					foreach ( $categogry_terms as $term ){ 
                    //$album = $term->name;
					//echo '<pre>'; print_r($term);echo '</pre>';
										}
				}
					}
            //Solo publique las fotos del artista        
            if ($art2[0]->post_name == $artista_slug){       
			?>

                <div class="image" data-url="<?php echo esc_url( $img_url[0] ); ?>" <?php if($data) { ?> data-description="<a href=http://www.loggia.com.co/contact/<?php echo $data; ?>>INTERESADO EN ESTA FOTO, CONTACTENOS AQUI</a>" <?php } ?>  data-caption="<?php the_title(); ?>" data-album="<?php echo esc_attr( $term->name ); ?>" data-width="<?php echo esc_attr( $meta['width'] ); ?>" data-height="<?php echo esc_attr( $meta['height'] ); ?>" data-video="<?php echo esc_url( $video ); ?>" data-artist="<?php echo esc_attr( $art2[0]->post_title ); ?>"></div>
			<?php }
            endwhile; 
            ?>
			

			<?php wp_reset_postdata(); endif; ?>
		</div>
		<!-- stream -->
	</div>
    <div>
    
    </div>
</section>
<!-- section -->
<!-- footer -->
<footer class="footer">
	<div><?php bow_work_slogan(); ?></div>
</footer>
<!-- header -->
<?php get_footer(); ?>