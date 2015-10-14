<?php 

function bow_work_slogan() {
$options = get_option('bow_framework');

$slogan = $options['work_slogan'];
$link = $options['work_link'];

if ( ! empty( $slogan ) ) { ?>
    <div class="contact link" data-url="<?php echo esc_url( $link ); ?>"> <?php echo sanitize_text_field( $slogan ); ?> </div>
<?php }

}

function bow_social_profile() {

$options = get_option( 'bow_framework' );
$twitter = $options['twitter_profile'];
$facebook = $options['facebook_profile'];
$linkedin = $options['linkedin_profile'];
$google = $options['google_profile'];
$pinterest = $options['pinterest_profile'];
$instagram = $options['instagram_profile'];


if ( ! empty( $facebook ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $facebook); ?>">Facebook</li>
<?php } 

if ( ! empty( $twitter ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $twitter ); ?>">Twitter</li>
<?php } 

if ( ! empty( $instagram ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $instagram );?>">Instagram</li>
<?php }

if ( ! empty( $linkedin ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $linkedin ); ?>">Linkedin</li>
<?php }

if ( ! empty( $google ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $google ); ?>">Google+</li>
<?php }

if ( ! empty( $pinterest ) ) { ?>
    <li data-url="<?php echo sanitize_text_field( $pinterest ); ?>">Pinterest</li>
<?php }


 }


function bow_social_share() { 
global $post;
  ?>
  <div class="social-share-wrapper">
  <ul class="social-share">
    <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="product_share_facebook" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="icon icon-facebook-1"></i>Share</a></li>
    <li class="twitter"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter">Tweet</a></li>   
  </ul>
<div class="border-social"></div>
</div><!-- Social Share Wrapper -->
<?php
}


function bow_wp_title( $title, $sep ) {
global $paged, $page;
 
  if ( is_feed() ) {
    return $title;
  } // end if
 
  // Add the site name.
  $title .= get_bloginfo( 'name' );
 
  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  } // end if
 
  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = sprintf( __( 'Page %s', 'mayer' ), max( $paged, $page ) ) . " $sep $title";
  } // end if
 
  return $title;
}
add_filter( 'wp_title', 'bow_wp_title', 10, 2 );


//EXCERPT

function excerpt( $limit ) {
  $excerpt = explode( ' ', get_the_excerpt(), $limit );
  if ( count( $excerpt )>=$limit ) {
    array_pop( $excerpt );
    $excerpt = implode( " ",$excerpt ).'...';
  } else {
    $excerpt = implode( " ",$excerpt );
  } 
  $excerpt = preg_replace( '`\[[^\]]*\]`','',$excerpt );
  return $excerpt;
}
 
function content( $limit ) {
  $content = explode( ' ', get_the_content(), $limit );
  if ( count( $content )>=$limit ) {
    array_pop( $content );
    $content = implode( " ",$content ).'...';
  } else {
    $content = implode( " ",$content );
  } 
  $content = preg_replace( '/\[.+\]/','', $content );
  $content = apply_filters( 'the_content', $content ); 
  $content = str_replace( ']]>', ']]&gt;', $content );
  return $content;
}


function bow_custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'bow_custom_excerpt_length', 999 );

function bow_new_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'bow_new_excerpt_more' );


