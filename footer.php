<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kraken
 */

?>

	<footer>
		<div class="container-fluid">
			<div class="footer row">
				<div class="map col-sm-4 col-md-6">
					<div class="inside">
						<?php
						$default_map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360763.088299956!2d-113.74592522530563!3d36.24273468880968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sus!4v1468554463844" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
						$map_embed_code = get_option( 'map_embed_code', $default_map );

						echo $map_embed_code;
						?>
					</div>
				</div>
				<div class="address col-sm-4 col-md-3">
					<div class="inside">
						<div class="container-fluid">
							<h3>Our Location</h3>
							<?php
							$location_address_1 = get_option( 'location_address_1', 'One Kraken Place' );
							$location_address_2 = get_option( 'location_address_2', 'Suite #100' );
							$location_phone_number = get_option( 'location_phone_number', '(123) 456-7890' );

							if ( $location_address_1 !== '' && $location_address_2 !== '' && $location_phone_number !== '' ): ?>
								<address>
									<span><?php echo $location_address_1; ?></span><br>
									<span><?php echo $location_address_2; ?></span><br>
									<span>
										<span>Phone:</span>
										<a href="tel:<?php echo str_replace(' ', '', $location_phone_number); ?>">
											<?php echo $location_phone_number; ?>
										</a>
									</span>
								</address>
							<?php
							endif; ?>
						</div>
					</div>
				</div>
				<div class="office-hours col-sm-4 col-md-3">
					<div class="inside">
						<div class="container-fluid">
							<h3>Office Hours</h3>
							<ol>
								<?php
								$days = array( 'mon', 'tues', 'wednes', 'thurs', 'fri', 'satur', 'sun' );
								foreach ( $days as $day ) {
									$option = get_option( 'hours_' . $day, '9am to 5pm' );
									if ( $option !== '' ): ?>
										<li>
											<span><?php echo ucfirst( $day . 'day' ); ?></span>
											<span><?php echo $option; ?></span>
										</li>
									<?php
									endif;
								} ?>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="footer row">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
			<div class="footer row">
				<div class="social-icons-container col-sm-6 col-sm-push-6">
					<ul class="social-icons">
						<?php
						$facebook = get_option( 'facebook', 'https://www.facebook.com' );
						$twitter = get_option( 'twitter', 'https://twitter.com' );
						$google_plus = get_option( 'google_plus', 'https://plus.google.com' );

						if ( $facebook !== '' ): ?>
							<li>
								<a href="<?php echo $facebook ?>" target="_blank">
									<?php echo file_get_contents( get_template_directory_uri() . '/inc/svg/facebook.svg' ) ?>
								</a>
							</li>
						<?php
						endif;

						if ( $twitter !== '' ): ?>
							<li>
								<a href="<?php echo $twitter ?>" target="_blank">
									<?php echo file_get_contents( get_template_directory_uri() . '/inc/svg/twitter.svg' ) ?>
								</a>
							</li>
						<?php
						endif;

						if ( $google_plus !== '' ): ?>
							<li>
								<a href="<?php echo $google_plus ?>" target="_blank">
									<?php echo file_get_contents( get_template_directory_uri() . '/inc/svg/google-plus.svg' ) ?>
								</a>
							</li>
						<?php
						endif; ?>
					</ul>
				</div>
				<div class="attribution-container col-sm-6 col-sm-pull-6">
					<?php
					$copyright = get_option( 'copyright', 'Built with Kraken for WordPress' );
					$icons_attribution = get_option( 'icons_attribution' );

					if ( $copyright !== '' ): ?>
						<small class="attribution"><?php echo $copyright; ?><br />
					<?php
					endif;

					if ( $icons_attribution == true ): ?>
						<!-- Icons made by <a href="http://www.freepik.com/" target="_blank" rel="nofollow">Freepik</a> from <a href="http://www.flaticon.com" target="_blank" rel="nofollow">www.flaticon.com</a></small> -->
					<?php
					else: ?>
						Icons made by <a href="http://www.freepik.com/" target="_blank" rel="nofollow">Freepik</a> from <a href="http://www.flaticon.com" target="_blank" rel="nofollow">www.flaticon.com</a></small>
					<?php
					endif; ?>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
