<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kraken
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="top-bar">
			<div class="container">
				<div class="top-bar-half col-xs-6">
					<?php
					$header_site_name = get_option( 'header_site_name', get_bloginfo( 'name' ) );

					if ( $header_site_name !== '' ): ?>
						<h1 class="site-title"><a href="/"><?php echo $header_site_name; ?></a></h1>
					<?php
					endif; ?>
				</div>
				<div class="top-bar-half col-xs-6">
					<div class="widget cta col-sm-6 col-sm-push-6">
						<?php
						$header_phone_number = get_option( 'header_phone_number', '(123) 456-7890' );

						if ( $header_phone_number !== '' ): ?>
							<address>
								<a href="tel:<?php echo str_replace(' ', '', $header_phone_number); ?>">
									<?php echo $header_phone_number; ?>
								</a>
							</address>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div id="navbar" class="navigation navbar navbar-default">
			<div class="container">
				<div class="navigation-top-bar navbar-header">
					<div class="container-fluid">
						<button type="button" class="menu-button navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
							<div class="menu-button-row">
								<span class="menu-label">Menu</span>
								<?php echo file_get_contents( get_template_directory_uri() . '/inc/svg/menu.svg' ); ?>
							</div>
						</button>
					</div>
				</div>
				<?php wp_nav_menu( array(
					'container' => 'nav',
					'container_class' => 'navigation-list-container navbar-collapse collapse',
					'container_id' => 'navigation',
					'depth' => 2,
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'menu' => 'primary',
					'menu_class' => 'navigation-list nav navbar-nav',
					'theme_location' => 'primary',
					'walker' => new wp_bootstrap_navwalker())
				); ?>
			</div>
		</div>
	</header>
