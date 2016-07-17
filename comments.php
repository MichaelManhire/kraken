<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'kraken' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Comment navigation', 'kraken' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kraken' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kraken' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comments-list list-unstyled">
			<?php
			wp_list_comments( array(
				'style'         => 'ol',
				'short_ping'    => true,
				'avatar_size'   => '64',
				'walker'        => new Bootstrap_Comment_Walker())
			);
			?>
		</ol><!-- .comments-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h4 class="sr-only"><?php esc_html_e( 'Comment navigation', 'kraken' ); ?></h4>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kraken' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kraken' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kraken' ); ?></p>
	<?php
	endif;

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
	'author' =>
	'<div class="form-group"><label for="author">' . __( 'Name', 'kraken' ) . '</label> ' .
	( $req ? '<span class="required">*</span>' : '' ) .
	'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	'" ' . $aria_req . ' /></div>',

	'email' =>
	'<div class="form-group"><label for="email">' . __( 'Email', 'kraken' ) . '</label> ' .
	( $req ? '<span class="required">*</span>' : '' ) .
	'<input id="email" name="email" class="form-control" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	'" ' . $aria_req . ' /></div>',

	'url' =>
	'<div class="form-group"><label for="url">' . __( 'Website', 'kraken' ) . '</label>' .
	'<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	'"   />'
	);

	$comments_args = array(
	'class_submit' => 'btn btn-kraken submit',
	'comment_field' => '<div class="form-group"><label for="comment">' . _x( 'Comment *', 'noun' ) .
	'</label><textarea id="comment" name="comment" class="form-control"  rows="8" aria-required="true">' .
	'</textarea></div>',
	'fields' => apply_filters( 'comment_form_default_fields', $fields )
	);

	comment_form( $comments_args );
	?>

</div><!-- #comments -->
