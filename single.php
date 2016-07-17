<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kraken
 */

get_header(); ?>

	<div class="main-content container">
		<div class="row">
			<main class="col-sm-8">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main>

			<?php get_sidebar( 'blog' ); ?>

		</div>

	</div>

<?php get_footer(); ?>
