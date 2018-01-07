<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

// Most Viewed Postst 

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
 * Popular posts tracking
 *
 * Tracks the number of logged out user views for a post in a custom field
 */
function base_track_popular_posts() {

	// Only run the process for single posts, pages and post types when the user is logged out
	if ( is_singular() && !is_user_logged_in() ) {
		
		global $post;
		$custom_field = '_base_popular_posts_count';
		
		// Set/check session
		if ( !session_id() ) 
			session_start();
		
		// Only track a one view per post for a single visitor session to avoid duplications
		if ( !isset( $_SESSION["popular-posts-count-{$post->ID}"] ) ) {
			
			// Update view count 
			$view_count = get_post_meta( $post->ID, $custom_field, true );
			$stored_count = ( isset($view_count) && !empty($view_count) ) ? ( intval($view_count) + 1 ) : 1;
			$update_meta = update_post_meta( $post->ID, $custom_field, $stored_count );
			
			// Check for errors
			if ( is_wp_error($update_meta) )
				error_log( $update_meta->get_error_message(), 0 );
			
			// Store session in "viewed" state
			$_SESSION["popular-posts-count-{$post->ID}"] = 1;
		}

		// Show view the count for testing purposes (add "?show_count=1" onto the URL)
		if ( isset($_GET['show_count']) && intval($_GET['show_count']) == 1 ) {
			echo '<p style="color:red; text-align:center; margin:1em 0;">';
			echo get_post_meta( $post->ID, $custom_field, true );
			echo ' views of this post</p>';
		}
	}
}
add_action('wp_head', 'base_track_popular_posts');