<?php
/* Template Name: Destinations Index Template */ 
/**
 * The template for displaying all destinations
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
 <?php
   while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content-taxindex', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
     comments_template();
   endif;

      endwhile; // End of the loop.

// List terms in a given taxonomy using wp_list_categories 

      $taxonomy     = 'destination';
      $show_count   = false;
      $pad_counts   = false;
      $hierarchical = true;
      $title        = '';

      $args = array( 
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,


     );  


      $taxonomyName = "destination";
      $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));   
      foreach ($parent_terms as $pterm) {
        echo '<div class="row"><div class="col-12 text-center"><h2 class="underline-header">'.$pterm->name.'<a href="'.$pterm->slug.'">view all '.$pterm->name.' posts</a></h2><p>'.$pterm->description.'</p></div></div>';
        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
        echo '<div class="row">';
        foreach ($terms as $term) {


         if ($term->count > 0) {
           $taxonomy = new WP_Query( array( 'posts_per_page' => 1,  'post_type' =>'post', 'tax_query' => array( array('taxonomy' => 'destination','field' => 'slug',  'terms' => $term->slug ) )) );
           while ( $taxonomy->have_posts() )
           {
            $taxonomy->the_post();
            ?>

            <div class="col-md-3 destinations">
             <div class="col-12 destination-grid" style="background-image: url(<?php 
              echo get_the_post_thumbnail_url(); ?>);">
              <span class="text-overlay"> <h2><a href="<?php bloginfo( 'wpurl' ); ?>/destination/<?php echo $term->slug ?>">
                <?php echo $term->name ?></a></h2>
                <p><?php echo $term->description ?></p></span>


                <div class="overlay"></div></div>


              </div>

              <?php
            }
          } 



        }
        echo '</div>';
      }


?>


    </main><!-- #main -->

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
