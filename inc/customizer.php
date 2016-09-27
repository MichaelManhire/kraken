<?php

function kraken_register_theme_customizer( $wp_customize ) {

	// Customize title and tagline sections and labels
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Name and Description', 'kraken' );
	$wp_customize->get_control( 'blogname' )->label = __( 'Site Name', 'kraken' );
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description', 'kraken' );

	// Customize the Front Page Settings
	$wp_customize->get_section( 'static_front_page' )->title = __( 'Homepage Preferences', 'kraken' );
	$wp_customize->get_section( 'static_front_page' )->priority = 20;
	$wp_customize->get_control( 'show_on_front' )->label = __( 'Choose Homepage Preference', 'kraken' );
	$wp_customize->get_control( 'page_on_front' )->label = __( 'Select Homepage', 'kraken' );
	$wp_customize->get_control( 'page_for_posts' )->label = __( 'Select Blog Page', 'kraken' );

	// Customize Header Image Settings
	$wp_customize->add_section( 'header_text' , array(
		'title'      => __( 'Header Text','kraken' ),
		'priority'   => 70
	) );
	$wp_customize->get_control('display_header_text')->section = 'header_text';
	$wp_customize->get_control('display_header_text')->label = 'Display Header Text';
	$wp_customize->get_control('header_textcolor')->section = 'header_text';

}
add_action( 'customize_register', 'kraken_register_theme_customizer' );
