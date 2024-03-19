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
	
	//bootstrap css and js
	wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
	wp_enqueue_style('bootstrap_styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
	wp_enqueue_script('boostrapscript',"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js");
	wp_enqueue_script('jquery');
	wp_enqueue_style('photos_theme_styles', get_stylesheet_uri());
    wp_enqueue_script('menu_script', get_stylesheet_directory_uri() . '/JS/menu_script.js', array(), null, true);

	// Conditional custom style and script for a specific page
    if (is_page('experience')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/CSS/experience-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
    }
	if (is_page('contact')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/CSS/contact-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
    }
	if (is_page('chat')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/CSS/chat-style.css');

        // Enqueue custom script for 'example-page'
		wp_enqueue_script('script', get_stylesheet_directory_uri() . '/JS/script.js', array(), null, true);
		wp_enqueue_script('supabase', "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2", null, null, true);
        wp_localize_script("script", "WPVars", array(
            "SupaURL" => "https://trgudyxbbcssozaokpef.supabase.co",
            "SupaKey" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InRyZ3VkeXhiYmNzc296YW9rcGVmIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTAyNjk2NTQsImV4cCI6MjAyNTg0NTY1NH0.xdcZ62kIXdBePM7v9She65EKxwfLvKXKsR6rRFj65Q4",
          )
        );
        wp_localize_script("supabase", "WPVars", array(
            "SupaURL" => "https://trgudyxbbcssozaokpef.supabase.co",
            "SupaKey" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InRyZ3VkeXhiYmNzc296YW9rcGVmIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTAyNjk2NTQsImV4cCI6MjAyNTg0NTY1NH0.xdcZ62kIXdBePM7v9She65EKxwfLvKXKsR6rRFj65Q4",
            "OpenAiKey" => "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"
          )
        );
    }
	if (is_page('democard')) { // Replace 'example-page' with your target page's slug, ID, or title
        // Enqueue custom style for 'example-page'
        wp_enqueue_style('custom-style-example-page', get_stylesheet_directory_uri() . '/CSS/democard-style.css');

		wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/fontawesome/js/all.min.js', array(), null, true);
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

function wp_nav_menu_no_ul() {
    $options = array(
        'echo' => false,
        'container' => false,
		'menu_class'=> 'menuItems', 
        'theme_location' => 'primary',
        'fallback_cb' => 'default_page_menu',
        'walker' => new Custom_Walker_Nav_Menu()
    );

     $menu = wp_nav_menu($options);
    // //Use a more specific regex to target only the first <ul>
    // $menu = preg_replace('/^<ul[^>]*>/', '', $menu, 1);
    // // Remove the last </ul>
    // $menu = preg_replace('/<\/ul>$/', '', $menu);
    
    echo $menu;
}
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start the list before the elements are added.
    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth == 0) { // Only add this wrapper for top level
            $output .= '<ul class="sub-menu">';
        }
    }

    // End the list of after the elements are added.
    function end_lvl(&$output, $depth = 0, $args = null) {
        if ($depth == 0) {
            $output .= '</ul>';
        }
    }

    // Start the element output.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $title = apply_filters('the_title', $item->title, $item->ID);

        // Check if this item has children
        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($depth === 0) {
            // Top-level menu item
            $class_names = $has_children ? ' class="menu-item-has-children"' : '';
            $output .= '<li' . $class_names . '>';
            $output .= '<a class="nav-link" href="' . esc_attr($item->url) . '" data-item="' . esc_attr($title) . '">' . esc_html($title) . '</a>';
        } else {
            // Submenu items
            $output .= '<li><a class="nav-link" href="' . esc_attr($item->url) . '">' . esc_html($title) . '</a>';
        }
    }

    // End the element output.
    function end_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '</li>';
    }
}


add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);
add_filter('script_loader_tag', 'add_type_attribute_to_script' , 10, 3);
//wp_enqueue_style('', '"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"');
//wp_enqueue_script('boostrapscript',"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js");

?>