<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Oaxaca Homepage
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div id="sticky-posts">

        <ul class="sticky-featured">
            <?
            $args = array(
               'posts_per_page' => 3,
               'post__in'  => get_option( 'sticky_posts' ),
               'ignore_sticky_posts' => 1
           );
            $mynewquery = new WP_Query( $args );

// Check that we have query results.
            if ( $mynewquery->have_posts() ) {

    // Start looping over the query results.
                while ( $mynewquery->have_posts() ) {

                    $mynewquery->the_post();
                    echo '<li>';
                    if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                       <img class="sticky-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
                   </a>
               <?php endif;  ?>
               <span class="sticky-tag"><?php
               $terms = get_the_terms( $post->ID , 'collection' );
               $first_term = reset($terms);
               echo $first_term->name;
               ?></span><p>
                   <span><a class="sticky-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                       <?php the_title(); ?>
                   </a> </span></p>
                   <?
               }

           }

// Restore original post data.
           wp_reset_postdata();

           ?>
       </ul>
   </div>
   <div id="latest-posts">



       <article>
          <div class="container-fluid latest-posts-listing">
           <h1 class="underline-header"> Latest Stories </h1>


           <?php 
           $temp = $wp_query; $wp_query= null;
           $args = array(
               'posts_per_page' => 3,
               'offset' => 3,
               'post__not_in'  => get_option( 'sticky_posts' )
           );
           $wp_query = new WP_Query(); $wp_query->query( $args);
           while ($wp_query->have_posts()) : $wp_query->the_post(); 
             ?><div class="row"><div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?
             if ( has_post_thumbnail() ) : ?>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
               <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
           </a>
       <?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 content-area">
          <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
          <?php 
$excerpt = get_the_excerpt();
$excerpt = substr( $excerpt , 0, 100); 
echo $excerpt;;
 ?>


      </div></div>
  <?php endwhile; ?>

  <?php if ($paged > 1) { ?>

  <?php } else { ?>


  <?php } ?>

  <?php wp_reset_postdata(); ?>

</article>
</div>

<div class="container-fluid homepage-widgets">
    <div class="row">

<?php if ( is_active_sidebar( 'home_page_1' ) ) : ?>
    <div id="home-page-1" class="widget-area col-12">
        <?php dynamic_sidebar( 'home_page_1' ); ?>
    </div><!-- #footer-sidebar -->
<?php endif; ?> 
</div><!-- end home-page-1 widgets row -->
    <div class="row">

<?php if ( is_active_sidebar( 'home_page_2' ) ) : ?>
    <div id="home-page-2" class="widget-area col-12">
        <?php dynamic_sidebar( 'home_page_2' ); ?>
    </div><!-- #footer-sidebar -->
<?php endif; ?> 
</div><!-- end home-page-2 widgets row -->
</div><!-- end widgets container -->

 <article>
          <div class="container-fluid latest-posts-listing">
           <h1 class="underline-header"> More Stories </h1>


           <?php 
           $temp = $wp_query; $wp_query= null;
           $args = array(
               'posts_per_page' => 3,
               'post__not_in'  => get_option( 'sticky_posts' )
           );
           $wp_query = new WP_Query(); $wp_query->query( $args);
           while ($wp_query->have_posts()) : $wp_query->the_post(); 
             ?><div class="row"><div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?
             if ( has_post_thumbnail() ) : ?>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
               <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
           </a>
       <?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 content-area">
          <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
          <?php 
$excerpt = get_the_excerpt();
$excerpt = substr( $excerpt , 0, 100); 
echo $excerpt;;
?>


      </div></div>
  <?php endwhile; ?>

  <?php if ($paged > 1) { ?>

  <?php } else { ?>


  <?php } ?>

  <?php wp_reset_postdata(); ?>

</article>
</div>
</div>








</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
