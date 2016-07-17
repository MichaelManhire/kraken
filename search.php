<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kraken
 */

get_header(); ?>

	<div class="main-content container">
			<div class="row">
				<main class="col-sm-8">

				<?php
				if ( have_posts() ) : ?>

					<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kraken' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					posts_nav_link();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</main>

			<?php get_sidebar(); ?>

		</div>
	</div>

<?php

get_footer();
