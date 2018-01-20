<?php
/**
 * The template for displaying category archive pages.
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

      the_archive_description( '<div id="archive-description">', '</div>' ); 

$counter = 1;


    while ( have_posts() ) : the_post();

if( $counter == 1 ) {  ?>

<div class="row"><!-- highlighted content row-->
<div class="popular-posts-archive col-xs-12 col-md-6 col-lg-6">
  <div class="pop-img"><?if ( has_post_thumbnail() ) : ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
  </a>
<?php endif;  ?><div class="pop-text"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>
  </a></div><span> <?php the_excerpt(); ?></span></div></div>


<? } elseif( $counter == 2 ) {  ?>



<div class="popular-posts-archive col-xs-12 col-md-6 col-lg-6">
  <div class="pop-img"><?if ( has_post_thumbnail() ) : ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
  </a>
<?php endif;  ?><div class="pop-text"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>
  </a></div><span> <?php the_excerpt(); ?></span></div></div>

<div class="popular-tags"><strong>Popular Tags </strong><i class="fa fa-tag"> </i> <?php wp_tag_cloud( 'smallest=11&largest=11&number=9&orderby=count&separator=, ' ); ?></div>

</div><!--end highlighted content row-->
 <? } else { ?>




<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row"><div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?
if ( has_post_thumbnail() ) : ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
  </a>
<?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
    <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
</div></div>
</div><!-- #post-## -->

 <? }

$counter++;

endwhile;


    else :

      get_template_part( 'content', 'none' );

    endif; ?>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
