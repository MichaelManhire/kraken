<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

get_header(); ?>

	<div class="main-content container">
		<div class="row">
			<main class="col-sm-8">
				<?php the_archive_title( '<h2 class="page-title">', '</h2>' ); ?>

				<?php
				if ( have_posts() ):

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				posts_nav_link();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</main>

			<?php get_sidebar( 'blog' ); ?>

		</div>

	</div>

<?php get_footer(); ?>
