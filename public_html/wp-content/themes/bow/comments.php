<?php
if ( post_password_required() )
return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<div class="comments-title">
		<h4>
				<?php printf( _nx( 'One Comment %2$s', '%1$s Comments', get_comments_number(), 'comments title', 'bow' ), number_format_i18n( get_comments_number() ), ' ' );?>
		</h4>
		</div>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>

			<nav id="comment-nav-above" class="navigation-comment" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'bow' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bow' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bow' ) ); ?></div>
			</nav><!-- #comment-nav-before -->

		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array( 'callback' => 'bow_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="navigation-comment" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'bow' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bow' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bow' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bow' ); ?></p>
	<?php endif; ?>

<?php bow_comment_form(); ?>

</div><!-- #comments -->
