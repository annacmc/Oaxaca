<?php
/* Template Name: Collections Index Template */ 
/**
 * The template for displaying all collections
 *
 *
 * @package storefront
 */

get_header(); 
if ( have_posts() ) : 

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
          the_title( '<h1 class="header-page-title">', '</h1>' );
      
        ?>

      </div>
      </header><!-- .page-header -->

    <? endif; ?>

  <div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post();

        do_action( 'storefront_page_before' );

        get_template_part( 'content', 'page' );

        /**
         * Functions hooked in to storefront_page_after action
         *
         * @hooked storefront_display_comments - 10
         */
        do_action( 'storefront_page_after' );

      endwhile; // End of the loop. ?>

<div class="row">
<?php
        $categories = get_terms(
            array(
                'collection'
            ),
            array(
                'hide_empty' => false,
            )
        );

        foreach( $categories AS $cat )
        {
           if ($cat->count > 0) {
           $taxonomy = new WP_Query( array( 'posts_per_page' => 1, 'post_type' =>'post', 'tax_query' => array( array('taxonomy' => 'collection','field' => 'slug', 'terms' => $cat->slug ) )) );
            while ( $taxonomy->have_posts() )
            {
                $taxonomy->the_post();
            ?>

                <div class="col-md-6 col-sm-12 destinations">
                 <div class="col-12 destination-grid" style="background-image: url(<?php 
echo get_the_post_thumbnail_url(); ?>);">
                     <span class="text-overlay"> <h2><a href="<?php bloginfo( 'wpurl' ); ?>/collections/<?php echo $cat->slug ?>">
                          <?php echo $cat->name ?></a></h2>
                          <p><?php $excerpt = $cat->description;
                          $excerpt = substr( $excerpt , 0, 20); 
echo $excerpt;




                           ?></p></span>
                        
                    
                    <div class="overlay"></div></div>

               
                </div>

            <?php
        }
            }
        }
?>
</div> <!-- end browse by collection -->


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
