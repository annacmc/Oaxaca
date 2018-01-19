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
  	<header class="page-header"><div id="masthead" class="header-wrap-post container-fluid header-info text-center" style="background: url('<?php if ( is_front_page() && is_home() ) : 

    echo $backgroundImg;  else: echo $featuredImg; endif; ?>') no-repeat center center / cover; "> <?php
          the_archive_title( '<h1 class="header-page-title">', '</h1>' );
      
        ?>

			</div>
			</header><!-- .page-header -->

		<? endif; ?>


	<div id="primary">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : 

      the_archive_description( '<div class="header-archive-description">', '</div>' ); 


// Most Popular Posts

if ( function_exists('wpp_get_mostpopular') ) {

    // WPP parameters
    $args = array(
        'range' => 'weekly',
        'limit' => 2,
         'post_type' => 'post',
          'thumbnail_width' => 500,
           'excerpt_length' => 155,
        'wpp_start' => '<div class="row">',
        'post_html' => ' <div class="popular-posts-archive col-xs-12 col-md-6 col-lg-6"> <div class="pop-img">{thumb_img}<div class="pop-text">{title}</div><span>{summary}</span></div></div>',
        'wpp_end' => '</div>'
    );

    // Get the category ID so we can use it with the wpp_get_mostpopular() template tag
    if ( is_category() ) {
        $args['cat'] = get_queried_object_id();
    }

    wpp_get_mostpopular( $args );
    wp_reset_query();

}

		endif; ?>

<div class="popular-tags"><strong>Popular Tags </strong><i class="fa fa-tag"> </i> <?php wp_tag_cloud( 'smallest=11&largest=11&number=9&orderby=count&separator=, ' ); ?></div>


			<?php if ( have_posts() ) :

    
		while ( have_posts() ) : the_post();

	/**
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	get_template_part( 'content-archive', get_post_format() );

endwhile;

		else :

			get_template_part( 'content', 'none' );

		endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
