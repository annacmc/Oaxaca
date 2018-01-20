<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION

/*enqueue bootstrap in the child theme */
function oaxaca_enqueue_styles() {

wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/inc/js/bootstrap.min.js');
wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri().'/inc/css/bootstrap.min.css');
wp_enqueue_style('font-awesome-css', get_stylesheet_directory_uri().'/font-awesome/css/font-awesome.css');

}
add_action( 'wp_enqueue_scripts', 'oaxaca_enqueue_styles' );


/**
 * Register Widget Areas for the Child Theme
 *
 */
function oaxaca_widgets_init() {

	register_sidebar( array(
		'name'          => 'Full Width Footer',
		'id'            => 'full_width_footer',
		'before_widget' => '<div class="full-width-footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

		register_sidebar( array(
		'name'          => 'Home Page 1',
		'id'            => 'home_page_1',
		'before_widget' => '<div class="home-page-1-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

				register_sidebar( array(
		'name'          => 'Home Page 2',
		'id'            => 'home_page_2',
		'before_widget' => '<div class="home-page-2-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'oaxaca_widgets_init' );

/**
 * Prints the Breadcrumb in Storefront using the function by Yoast SEO.
 */
function storefront_yoast_breadcrumb() {
	if ( function_exists( 'yoast_breadcrumb' )) {
		yoast_breadcrumb( '<nav class="breadcrumbs">','</nav>' );
	}
}
add_action( 'storefront_content_top', 'storefront_yoast_breadcrumb' );


/**
 * Adds a top bar to Storefront, before the header.
 */
function storefront_add_topbar() {
    ?>
    <div id="topbar">
        <div class="col-full">
            <p>Your text here</p>
        </div>
    </div>
    <?php
}
add_action( 'storefront_before_header', 'storefront_add_topbar' );

/* Add Collections Taxonomy */

add_action( 'init', 'create_collection_taxonomy' );

function create_collection_taxonomy() {
	$labels = array(
		'name'                           => 'collections',
		'singular_name'                  => 'collection',
		'search_items'                   => 'Search collections',
		'all_items'                      => 'All collections',
		'edit_item'                      => 'Edit collection',
		'update_item'                    => 'Update collection',
		'add_new_item'                   => 'Add New collection',
		'new_item_name'                  => 'New collection Name',
		'menu_name'                      => 'Collection',
		'view_item'                      => 'View collection',
		'popular_items'                  => 'Popular collection',
		'separate_items_with_commas'     => 'Separate collections with commas',
		'add_or_remove_items'            => 'Add or remove collections',
		'choose_from_most_used'          => 'Choose from the most used collections',
		'not_found'                      => 'No collections found'
	);

	register_taxonomy(
		'collection',
		'post',
		array(
			'label' => __( 'collection' ),
			'hierarchical' => false,
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'rewrite' => array(
				'slug' => 'collections'
			)
		)
	);
}

/* Remove Category Prefix */

function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

