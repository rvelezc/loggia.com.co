<article  id="post-<?php the_ID(); ?>" <?php post_class( 'post offset' ); ?>>
	<div class="row container">
		<!-- entry-meta -->
		<div class="entry-meta">
			<span class="date"><?php echo get_the_date(); ?></span>
		</div>
		<!-- entry-meta -->
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>
	<!-- container -->
	<!-- container -->
	<div class="row container">
		<div class="sixteen columns">
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<!-- entry-thumbnail -->
			<?php } ?>
		</div>
	</div>
	<!-- container -->
	
	<div class="row container">
		<div class="sixteen columns">
			<!-- entry-content -->
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
			<!-- entry-content -->
			
			<div class="post-meta-bottom">
				<span class="single-category-bottom"><strong><?php _e( 'Categories: ', 'bow' ); ?></strong> <?php the_category( ', ' ); ?></span>
				<span class="single-tag-bottom"><strong><?php _e( 'Tags: ', 'bow' ); ?></strong> <?php the_tags( '',', ','' ); ?></span>
			</div>
		</div>
	</div>
	<!-- container -->
	
	<!-- container -->
	<div class="row container">
		<div class="social eight columns">
			<?php bow_social_share(); ?>
		</div>
		<div class="author eight columns"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php _e( 'BY ', 'bow' ); ?><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></a></div>
	</div>
	<!-- container -->
	<!-- container -->
	<div class="row container">
		<div class="sixteen columns">
			<?php bow_content_nav( 'bottom-nav' ); ?>
			<?php
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			if ( comments_open() || '0' != get_comments_number() ) comments_template();
			?>
		</div>
	</div>
	<!-- container -->
</article><!-- #post-<?php the_ID(); ?> -->