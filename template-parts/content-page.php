<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

?>


<header>
	<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
</header>

<?php the_content(); ?>

<footer>
	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'kraken' ),
				the_title( '<span class="sr-only">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</footer>
