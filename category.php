<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>



		<?php if ( have_posts() ) : ?>

		


<?php 	 

  $backgroundImg = get_header_image();
     
    if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    if ( ! empty( $large_image_url[0] ) ) {
        $featuredImg = get_the_post_thumbnail_url(); 

    }
}

  ?>
  	<header class="page-header"><div id="masthead" class="container-fluid header-info" style="background: url('<?php if ( is_front_page() && is_home() ) : 

    echo $backgroundImg;  else: echo $featuredImg; endif; ?>') no-repeat center center / cover; "> <?

					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div>
			</header><!-- .page-header -->

		<? endif; ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : 


// Somewhere inside your archive.php template ...

if ( function_exists('wpp_get_mostpopular') ) {

	 ?><h1 class="underline-header"> Most Popular in <?php the_archive_title() ?>  </h1><?php

    // WPP parameters
    $args = array(
        'range' => 'weekly',
        'limit' => 6,
         'post_type' => 'post',
          'thumbnail_width' => 500,
        'wpp_start' => '<div class="row">',
        'post_html' => ' <div class="popular-post-col col-xs-12 col-md-6 col-lg-2"> <div class="classWithPad">{thumb_img}<span class="post-card-title">{title}</span></div></div>',
        'wpp_end' => '</div>'
    );

    // Get the category ID so we can use it with the wpp_get_mostpopular() template tag
    if ( is_category() ) {
        $args['cat'] = get_queried_object_id();
    }

    wpp_get_mostpopular( $args );

}



?>


			<?php get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
