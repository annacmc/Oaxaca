<?php
/**
 * The template for displaying category archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

	
  	<header class="page-header">
      <div id="author-description" class="row">

  <div class="col-xs-12 col-sm-12 col-md-4 text-right"><? echo get_avatar( get_the_author_meta('user_email'), $size = '350'); ?></div>
  <div class="col-xs-12 col-sm-12 col-md-8">
<h3><? echo $curauth->display_name; ?></h3><p><?
echo $curauth->description; ?></p>
</div>

 
</div>
			</header><!-- .page-header -->



	<div id="primary">
		<main id="main" class="site-main" role="main">

<h2 class="underline-header"><? echo $curauth->first_name; ?>'s Stories</h2>
 <? if ( have_posts() ) : 

 while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row"><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><?
if ( has_post_thumbnail() ) : ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  <img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
  </a>
<?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); 
    ?> <p class="tiny-face"><? echo get_avatar( get_the_author_meta('user_email'), $size = '30'); ?> by <?php the_author();?></p>
</div></div>
</div><!-- #post-## -->

<?
endwhile;


		else :

			get_template_part( 'content', 'none' );

		endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
