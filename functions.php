<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'understrap_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function understrap_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on understrap, use a find and replace
         * to change 'understrap' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'understrap' ),
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

        /*
         * Adding Thumbnail basic support
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Adding support for Widget edit icons in customizer
         */
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Set up the WordPress Theme logo feature.
        add_theme_support( 'custom-logo' );

        // Check and setup theme default settings.
        understrap_setup_theme_default_settings();

// Add Featured Content Area Support
        add_theme_support( 'featured-content', array(
    'filter'     => 'understrap_get_featured_posts',
    'max_posts'  => 20,
    'post_types' => array( 'post', 'page' ),
) );

    }
endif; // understrap_setup.
add_action( 'after_setup_theme', 'understrap_setup' );

function understrap_get_featured_posts() {
    return apply_filters( 'understrap_get_featured_posts', array() );
}
function understrap_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;
 
    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'understrap_get_featured_posts', array() );
 
    if ( ! is_array( $featured_posts ) )
        return false;
 
    if ( $minimum > count( $featured_posts ) )
        return false;
 
    return true;
}
// In functions.php, in a function hooked to wp_enqueue_scripts
if ( understrap_has_featured_posts( 2 ) ) {
    wp_enqueue_script( 'understrap-slider-script', get_template_directory_uri() . '/js/awesome-slider.js', array( 'jquery' ) );
}
