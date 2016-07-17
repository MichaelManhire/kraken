<?php
/**
 * The template for displaying the search form.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Kraken
 */
?>

<form role="search" method="get" class="clearfix search-form" action="<?php esc_url( home_url( '/' ) ) ?>">
	<div class="form-group">
		<label for="search" class="sr-only">Search for:</label>
		<input type="search" class="form-control search-field" placeholder="Search" value="<?php get_search_query() ?>" name="s" id="search" />
	</div>
	<input type="submit" class="btn btn-kraken search-submit" value="Search" />
</form>
