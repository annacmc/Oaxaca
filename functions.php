<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION
/**
 * Prints the Breadcrumb in Storefront using the function by Yoast SEO.
 */
function storefront_yoast_breadcrumb() {
	if ( function_exists( 'yoast_breadcrumb' ) && ! is_home() ) {
		yoast_breadcrumb( '<nav class="breadcrumbs">','</nav>' );
	}
}
add_action( 'storefront_content_top', 'storefront_yoast_breadcrumb' );