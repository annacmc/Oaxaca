<?php
/* Template Name: Collections Index Template */ 
/**
 * The template for displaying all collections
 *
 *
 * @package storefront
 */

get_header(); ?>

  <div id="primary" class="content-area">
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

      endwhile; // End of the loop. 




// List terms in a given taxonomy using wp_list_categories 

      $taxonomy     = 'collection';
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


      $taxonomyName = "collection";
      $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));   
      foreach ($parent_terms as $pterm) {
        echo '<div class="row"><div class="col-12 text-center"><h2 class="linethrough">'.$pterm->name.'<a href="'.$pterm->slug.'">view all '.$pterm->name.' posts</a></h2><p>'.$pterm->description.'</p></div></div>';
        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
        echo '<div class="row">';
        foreach ($terms as $term) {


         if ($term->count > 0) {
           $taxonomy = new WP_Query( array( 'posts_per_page' => 1,  'post_type' =>'post', 'tax_query' => array( array('taxonomy' => 'collection','field' => 'slug',  'terms' => $term->slug ) )) );
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
  </div><!-- #primary -->

<?php
get_footer();
