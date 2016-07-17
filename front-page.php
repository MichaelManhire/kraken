<?php
/**
 * The template for displaying the static front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kraken
 */

get_header(); ?>

	<?php
	$hero = get_option( 'hero', get_template_directory_uri() . '/img/stock.jpg' );
	if ( $hero !== '' ): ?>
		<div class="hero" style="background-image: url('<?php echo $hero; ?>');">
	<?php
	endif; ?>
		<?php
		$hero_text = get_option( 'hero_text', 'Edit the hero text field on the Theme Options page!' );
		if ( $hero_text !== '' ): ?>
			<div class="container">
				<div class="text-background col-sm-6 col-sm-offset-6">
					<p class="text h3"><?php echo $hero_text; ?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="container">
		<div class="featured-items row">
			<?php
			$numbers = array( '1', '2', '3' );
			foreach ( $numbers as $number ) {
				$image_option = get_option( 'feature_image_' . $number, get_template_directory_uri() . '/img/feature-image-' . $number . '.jpg' );
				$heading_option = get_option( 'feature_heading_' . $number, 'Feature Heading ' . $number );
				$text_option = get_option( 'feature_text_' . $number, 'Edit the feature text on the Theme Options page!' ); ?>
				<div class="col-sm-4">
					<div class="item">
						<?php
						if ( $image_option !== '' ): ?>
							<img src="<?php echo $image_option; ?>" alt="" />
						<?php
						endif;
						if ( $heading_option !== '' ): ?>
							<h3><?php echo $heading_option; ?></h3>
						<?php
						endif;
						if ( $text_option !== '' ): ?>
							<p><?php echo $text_option; ?></p>
						<?php
						endif; ?>
					</div>
				</div>
			<?php
			} ?>
		</div>
	</div>
	<?php
	$slogan = get_option( 'slogan', 'Edit the slogan on the Theme Options page!' );
	if ( $slogan !== '' ): ?>
		<div class="row">
			<div class="slogan-background container-fluid">
				<span class="slogan h2"><?php echo $slogan; ?></span>
			</div>
		</div>
	<?php
	endif; ?>
	<div class="main-content container">
		<div class="row">
			<main class="col-sm-8">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
