<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>

	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
	}
	?>

	<header>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<span class="byline">Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?> in <?php the_category( ', ' ); ?></span>
	</header>

	<?php
	the_excerpt();

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kraken' ),
		'after'  => '</div>',
	) );
	?>

	<footer class="entry-footer">
		<?php kraken_entry_footer(); ?>
	</footer>

</div>
