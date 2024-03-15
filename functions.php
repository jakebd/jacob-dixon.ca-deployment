<?php
/**
 * MyFirstTheme's functions and definitions
 *
 * @package photosTheme
 * @since photosTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */

if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}


if ( ! function_exists( 'photos_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function photos_setup() {

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'square', 480, 480, true);

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'photos' ),
			'secondary' => __( 'Secondary Menu', 'photos' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
endif; // photos_setup
add_action( 'after_setup_theme', 'photos_setup' );

//add Bootstrap style and js
function photos_enqueue_styles(){
	wp_enqueue_style('photos_theme_styles', get_stylesheet_uri());
	//bootstrap css and js
	wp_enqueue_style('bootstrap_styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
	wp_enqueue_script('boostrapscript',"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js");
	wp_enqueue_script('jquery');

	// Conditional custom style and script for a specific page
    if (is_page('experience')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/experience-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
    }
	if (is_page('contact')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/contact-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
    }
	if (is_page('chat')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/chat-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('script', get_stylesheet_directory_uri() . '/script.js', array(), null, true);
		wp_enqueue_script('supabase', "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2", null, null, true);
    }
}
add_action( 'wp_enqueue_scripts', 'photos_enqueue_styles');

function add_defer_attribute($tag, $handle) {
    if ('fontawesome' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
	// if ('supabase' === $handle) {
    //     return str_replace(' src', ' defer src', $tag);
    // }
	// if ('script' === $handle) {
    //     return str_replace(' src', ' defer src', $tag);
    // }
    return $tag;
}

function add_type_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'supabase' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script src="' . esc_url( $src ) . '"></script>';
    return $tag;
}
function add_type_attribute_to_script($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'script' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);
add_filter('script_loader_tag', 'add_type_attribute_to_script' , 10, 3);
//wp_enqueue_style('', '"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"');
//wp_enqueue_script('boostrapscript',"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js");

?>