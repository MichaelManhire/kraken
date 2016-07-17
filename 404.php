<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kraken
 */

get_header(); ?>

	<div class="main-content container">
		<div class="row">
			<main class="col-sm-8">

				<header>
					<h2 class="page-title">Oops! That page can&rsquo;t be found.</h2>
				</header>

				<p>It looks like nothing was found at this location. Maybe try a search?</p>

				<?php get_search_form(); ?>

			</main>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
