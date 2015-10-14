<?php 
$cover = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
$email_address = get_post_meta( $post->ID, 'bow_email_address_contact', true );
$phone_number = get_post_meta( $post->ID, 'bow_phone_number_contact', true );
$address = get_post_meta( $post->ID, 'bow_address_contact', true );
$gmaps_url = get_post_meta( $post->ID, 'bow_gmaps_url_contact', true );
?>

<article  id="page-<?php the_ID(); ?>" <?php post_class( 'contact page fullscreen' ); ?>>
	<div class="cover inner" style="background-image:url(<?php echo esc_url( $cover ); ?>)">
		<div class="content">
			<div class='text'>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			</div>
			<div class="info">
				<div class="link" data-url="mailto:<?php echo sanitize_email( $email_address ); ?>"><span>E:</span><?php echo sanitize_email( $email_address ); ?></div>
				<div class="link" data-url="call:<?php echo sanitize_text_field( $phone_number ); ?>"><span>P:</span><?php echo sanitize_text_field( $phone_number ); ?></div>
				<div class="link"data-url="<?php echo esc_url( $gmaps_url ); ?>"><span>A:</span><?php echo sanitize_text_field( $address ); ?></div>
				
			</div>
			
		</div>
	</div>
</article><!-- #page<?php the_ID(); ?> -->