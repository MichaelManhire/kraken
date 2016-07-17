<?php
/**
 * Template part for displaying post content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>

	<header>
		<h2 class="page-title"><?php the_title(); ?></h2>
		<span class="byline">Posted on <?php the_date(); ?> by <?php the_author(); ?> in <?php the_category( ', ' ); ?></span>
	</header>

	<?php
	the_content( sprintf(
		/* translators: %s: Name of current post. */
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kraken' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="sr-only">"', '"</span>', false )
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kraken' ),
		'after'  => '</div>',
	) );
	?>

	<footer class="entry-footer">
		<?php kraken_entry_footer(); ?>
	</footer>

</article>
