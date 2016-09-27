<?php
/**
 * Kraken functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kraken
 */

if ( ! function_exists( 'kraken_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kraken_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kraken, use a find and replace
	 * to change 'kraken' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kraken', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'kraken' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add support for featured images on posts, pages, or custom post types
	add_theme_support( 'post_thumbnails' );
}
endif;
add_action( 'after_setup_theme', 'kraken_setup' );

// Remove emoji code
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kraken_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kraken_content_width', 640 );
}
add_action( 'after_setup_theme', 'kraken_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kraken_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kraken' ),
		'id'            => 'main_sidebar',
		'description'   => esc_html__( 'This is the sidebar that displays on all pages except your blog, posts, and archives.', 'kraken' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'kraken' ),
		'id'            => 'blog_sidebar',
		'description'   => esc_html__( 'This is the sidebar that displays only on your blog, posts, and archives.', 'kraken' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'kraken' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'These are the widgets that display in the footer underneath the map, address, and office hours.', 'kraken' ),
		'before_widget' => '<div class="widget col-sm-6 col-md-4"><div class="inside"><div class="container-fluid">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'kraken_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kraken_scripts() {
	wp_enqueue_style( 'kraken-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,300italic|Montserrat:400,700' );
	wp_enqueue_style( 'kraken-stylesheet', get_template_directory_uri() . '/css/main.min.css' );

	wp_enqueue_script( 'kraken-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '', true );
	wp_enqueue_script( 'kraken-scripts', get_template_directory_uri() . '/js/main.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kraken_scripts' );

// Add a "Read More" link at the end of post excerpts.
function new_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'kraken') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// Set up the Theme Options page
function kraken_theme_init() {
	register_setting( 'settings_group', 'header_site_name' );
	register_setting( 'settings_group', 'header_phone_number' );
	register_setting( 'settings_group', 'hero' );
	register_setting( 'settings_group', 'hero_text' );
	register_setting( 'settings_group', 'feature_image_1' );
	register_setting( 'settings_group', 'feature_heading_1' );
	register_setting( 'settings_group', 'feature_text_1' );
	register_setting( 'settings_group', 'feature_image_2' );
	register_setting( 'settings_group', 'feature_heading_2' );
	register_setting( 'settings_group', 'feature_text_2' );
	register_setting( 'settings_group', 'feature_image_3' );
	register_setting( 'settings_group', 'feature_heading_3' );
	register_setting( 'settings_group', 'feature_text_3' );
	register_setting( 'settings_group', 'slogan' );
	register_setting( 'settings_group', 'map_embed_code' );
	register_setting( 'settings_group', 'location_address_1' );
	register_setting( 'settings_group', 'location_address_2' );
	register_setting( 'settings_group', 'location_phone_number' );
	register_setting( 'settings_group', 'hours_mon' );
	register_setting( 'settings_group', 'hours_tues' );
	register_setting( 'settings_group', 'hours_wednes' );
	register_setting( 'settings_group', 'hours_thurs' );
	register_setting( 'settings_group', 'hours_fri' );
	register_setting( 'settings_group', 'hours_satur' );
	register_setting( 'settings_group', 'hours_sun' );
	register_setting( 'settings_group', 'copyright' );
	register_setting( 'settings_group', 'icons_attribution' );
	register_setting( 'settings_group', 'facebook' );
	register_setting( 'settings_group', 'twitter' );
	register_setting( 'settings_group', 'google_plus' );

	add_settings_section(
		'header_section',
		'Header Settings',
		null,
		'theme-options' );
	add_settings_section(
		'homepage_section',
		'Homepage Settings',
		null,
		'theme-options' );
	add_settings_section(
		'location_section',
		'Location Settings',
		null,
		'theme-options' );
	add_settings_section(
		'hours_section',
		'Office Hours Settings',
		null,
		'theme-options' );
	add_settings_section(
		'footer_section',
		'Footer Settings',
		null,
		'theme-options' );

	add_settings_field(
		'header_phone_number',
		'Phone number',
		'header_phone_number_callback',
		'theme-options',
		'header_section' );
	add_settings_field(
		'hero_text',
		'Hero text overlay',
		'hero_text_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_image_1',
		'First feature image URL',
		'feature_image_1_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_heading_1',
		'First feature heading',
		'feature_heading_1_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_text_1',
		'First feature text',
		'feature_text_1_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_image_2',
		'Second feature image URL',
		'feature_image_2_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_heading_2',
		'Second feature heading',
		'feature_heading_2_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_text_2',
		'Second feature text',
		'feature_text_2_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_image_3',
		'Third feature image URL',
		'feature_image_3_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_heading_3',
		'Third feature heading',
		'feature_heading_3_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'feature_text_3',
		'Third feature text',
		'feature_text_3_callback',
		'theme-options',
		'homepage_section' );
	add_settings_field(
		'map_embed_code',
		'Google Maps embed code',
		'map_embed_code_callback',
		'theme-options',
		'location_section' );
	add_settings_field(
		'location_address',
		'Address Line 1',
		'location_address_1_callback',
		'theme-options',
		'location_section' );
	add_settings_field(
		'location_address_2',
		'Address Line 2',
		'location_address_2_callback',
		'theme-options',
		'location_section' );
	add_settings_field(
		'location_phone_number',
		'Phone number',
		'location_phone_number_callback',
		'theme-options',
		'location_section' );
	add_settings_field(
		'hours_mon',
		'Monday hours',
		'hours_mon_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_tues',
		'Tuesday hours',
		'hours_tues_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_wednes',
		'Wednesday hours',
		'hours_wednes_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_thurs',
		'Thursday hours',
		'hours_thurs_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_fri',
		'Friday hours',
		'hours_fri_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_satur',
		'Saturday hours',
		'hours_satur_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'hours_sun',
		'Sunday hours',
		'hours_sun_callback',
		'theme-options',
		'hours_section' );
	add_settings_field(
		'copyright',
		'Copyright/Marketing line',
		'copyright_callback',
		'theme-options',
		'footer_section' );
	add_settings_field(
		'icons_attribution',
		'Hide the "Icons made by Freepik" line?',
		'icons_attribution_callback',
		'theme-options',
		'footer_section' );
	add_settings_field(
		'facebook',
		'Facebook link',
		'facebook_callback',
		'theme-options',
		'footer_section' );
	add_settings_field(
		'twitter',
		'Twitter link',
		'twitter_callback',
		'theme-options',
		'footer_section' );
	add_settings_field(
		'google_plus',
		'Google Plus link',
		'google_plus_callback',
		'theme-options',
		'footer_section' );
}
add_action( 'admin_init', 'kraken_theme_init' );

function header_phone_number_callback() {
	$option = get_option( 'header_phone_number', '(123) 456-7890' );

	$html = '<label for="header_phone_number" class="screen-reader-text">Header phone number</label>';
	$html .= '<input type="tel" id="header_phone_number" name="header_phone_number" value="' . $option . '" />';
	echo $html;
}

function hero_text_callback() {
	$option = get_option( 'hero_text', 'Edit the hero text field on the Theme Options page!' );

	$html = '<label for="hero_text" class="screen-reader-text">Hero text overlay</label>';
	$html .= '<input type="text" id="hero_text" name="hero_text" value="' . $option . '" />';
	echo $html;
}

function feature_image_1_callback() {
	$option = get_option( 'feature_image_1', get_template_directory_uri() . '/img/feature-image-1.jpg' );

	$html = '<label for="feature_image_1" class="screen-reader-text">First feature image URL</label>';
	$html .= '<input type="text" id="feature_image_1" name="feature_image_1" value="' . $option . '" />';
	echo $html;
}

function feature_heading_1_callback() {
	$option = get_option( 'feature_heading_1', 'Feature Heading 1' );

	$html = '<label for="feature_heading_1" class="screen-reader-text">First feature heading</label>';
	$html .= '<input type="text" id="feature_heading_1" name="feature_heading_1" value="' . $option . '" />';
	echo $html;
}

function feature_text_1_callback() {
	$option = get_option( 'feature_text_1', 'Edit the feature text on the Theme Options page!' );

	$html = '<label for="feature_text_1" class="screen-reader-text">First feature text</label>';
	$html .= '<input type="text" id="feature_text_1" name="feature_text_1" value="' . $option . '" />';
	echo $html;
}

function feature_image_2_callback() {
	$option = get_option( 'feature_image_2', get_template_directory_uri() . '/img/feature-image-2.jpg' );

	$html = '<label for="feature_image_2" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_image_2" name="feature_image_2" value="' . $option . '" />';
	echo $html;
}

function feature_heading_2_callback() {
	$option = get_option( 'feature_heading_2', 'Feature Heading 2' );

	$html = '<label for="feature_heading_2" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_heading_2" name="feature_heading_2" value="' . $option . '" />';
	echo $html;
}

function feature_text_2_callback() {
	$option = get_option( 'feature_text_2', 'Edit the feature text on the Theme Options page!' );

	$html = '<label for="feature_text_2" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_text_2" name="feature_text_2" value="' . $option . '" />';
	echo $html;
}

function feature_image_3_callback() {
	$option = get_option( 'feature_image_3', get_template_directory_uri() . '/img/feature-image-3.jpg' );

	$html = '<label for="feature_image_3" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_image_3" name="feature_image_3" value="' . $option . '" />';
	echo $html;
}

function feature_heading_3_callback() {
	$option = get_option( 'feature_heading_3', 'Feature Heading 3' );

	$html = '<label for="feature_heading_3" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_heading_3" name="feature_heading_3" value="' . $option . '" />';
	echo $html;
}

function feature_text_3_callback() {
	$option = get_option( 'feature_text_3', 'Edit the feature text on the Theme Options page!' );

	$html = '<label for="feature_text_3" class="screen-reader-text"></label>';
	$html .= '<input type="text" id="feature_text_3" name="feature_text_3" value="' . $option . '" />';
	echo $html;
}

function map_embed_code_callback() {
	$default_map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360763.088299956!2d-113.74592522530563!3d36.24273468880968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sus!4v1468554463844" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	$option = get_option( 'map_embed_code', $default_map );

	$html = '<label for="map_embed_code" class="screen-reader-text">Google Maps embed code</label>';
	$html .= '<textarea id="map_embed_code" name="map_embed_code" rows="5" cols="30">' . $option . '</textarea>';
	echo $html;
}

function location_address_1_callback() {
	$option = get_option( 'location_address_1', 'One Kraken Place' );

	$html = '<label for="location_address_1" class="screen-reader-text">Address Line 1</label>';
	$html .= '<input type="text" id="location_address_1" name="location_address_1" value="' . $option . '" />';
	echo $html;
}

function location_address_2_callback() {
	$option = get_option( 'location_address_2', 'Suite #100' );

	$html = '<label for="location_address_2" class="screen-reader-text">Address Line 2</label>';
	$html .= '<input type="text" id="location_address_2" name="location_address_2" value="' . $option . '" />';
	echo $html;
}

function location_phone_number_callback() {
	$option = get_option( 'location_phone_number', '(123) 456-7890' );

	$html = '<label for="location_phone_number" class="screen-reader-text">Location section phone number</label>';
	$html .= '<input type="tel" id="location_phone_number" name="location_phone_number" value="' . $option . '" />';
	echo $html;
}

function hours_mon_callback() {
	$option = get_option( 'hours_mon', '9am to 5pm' );

	$html = '<label for="hours_mon" class="screen-reader-text">Monday office hours</label>';
	$html .= '<input type="text" id="hours_mon" name="hours_mon" value="' . $option . '" />';
	echo $html;
}

function hours_tues_callback() {
	$option = get_option( 'hours_tues', '9am to 5pm' );

	$html = '<label for="hours_tues" class="screen-reader-text">Tuesday office hours</label>';
	$html .= '<input type="text" id="hours_tues" name="hours_tues" value="' . $option . '" />';
	echo $html;
}

function hours_wednes_callback() {
	$option = get_option( 'hours_wednes', '9am to 5pm' );

	$html = '<label for="hours_wednes" class="screen-reader-text">Wednesday office hours</label>';
	$html .= '<input type="text" id="hours_wednes" name="hours_wednes" value="' . $option . '" />';
	echo $html;
}

function hours_thurs_callback() {
	$option = get_option( 'hours_thurs', '9am to 5pm' );

	$html = '<label for="hours_thurs" class="screen-reader-text">Thursday office hours</label>';
	$html .= '<input type="text" id="hours_thurs" name="hours_thurs" value="' . $option . '" />';
	echo $html;
}

function hours_fri_callback() {
	$option = get_option( 'hours_fri', '9am to 5pm' );

	$html = '<label for="hours_fri" class="screen-reader-text">Friday office hours</label>';
	$html .= '<input type="text" id="hours_fri" name="hours_fri" value="' . $option . '" />';
	echo $html;
}

function hours_satur_callback() {
	$option = get_option( 'hours_satur', '9am to 5pm' );

	$html = '<label for="hours_satur" class="screen-reader-text">Saturday office hours</label>';
	$html .= '<input type="text" id="hours_satur" name="hours_satur" value="' . $option . '" />';
	echo $html;
}

function hours_sun_callback() {
	$option = get_option( 'hours_sun', '9am to 5pm' );

	$html = '<label for="hours_sun" class="screen-reader-text">Sunday office hours</label>';
	$html .= '<input type="text" id="hours_sun" name="hours_sun" value="' . $option . '" />';
	echo $html;
}

function copyright_callback() {
	$option = get_option( 'copyright', 'Built with Kraken for WordPress' );

	$html = '<label for="copyright" class="screen-reader-text">Copyright/Marketing line</label>';
	$html .= '<input type="text" id="copyright" name="copyright" value="' . $option . '" rows="5" cols="30"/>';
	echo $html;
}

function icons_attribution_callback() {
	$html = '<label for="icons_attribution" class="screen-reader-text">Hide the "Icons made by Freepik" line:</label>';
	$html .= '<input type="checkbox" id="icons_attribution" name="icons_attribution" value="1"' . checked( 1, get_option( 'icons_attribution' ), false ) . ' />';
	echo $html;
}

function facebook_callback() {
	$option = get_option( 'facebook', 'https://www.facebook.com' );

	$html = '<label for="facebook" class="screen-reader-text">Facebook link</label>';
	$html .= '<input type="text" id="facebook" name="facebook" value="' . $option . '" rows="5" cols="30"/>';
	echo $html;
}

function twitter_callback() {
	$option = get_option( 'twitter', 'https://twitter.com' );

	$html = '<label for="twitter" class="screen-reader-text">Twitter link</label>';
	$html .= '<input type="text" id="twitter" name="twitter" value="' . $option . '" rows="5" cols="30"/>';
	echo $html;
}

function google_plus_callback() {
	$option = get_option( 'google_plus', 'https://plus.google.com' );

	$html = '<label for="google_plus" class="screen-reader-text">Google Plus link</label>';
	$html .= '<input type="text" id="google_plus" name="google_plus" value="' . $option . '" rows="5" cols="30"/>';
	echo $html;
}

function kraken_add_theme_page() {
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme-options', 'kraken_theme_options_page' );
}
add_action( 'admin_menu', 'kraken_add_theme_page' );

function kraken_theme_options_page() {
?>

<div class="wrap">
	<h2>Theme Options - <?php echo get_current_theme(); ?></h2>
	<form method="post" action="options.php">
		<?php
		settings_fields( 'settings_group' );
		do_settings_sections( 'theme-options' );
		submit_button();
		?>
	</form>
</div>

<?php
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Custom Navigation Walker.
 */
require_once( get_template_directory() . '/inc/wp-bootstrap-navwalker.php' );

/**
 * Register Custom Comment Walker.
 */
require_once( get_template_directory() . '/inc/wp-bootstrap-comment-walker.php' );
?>
