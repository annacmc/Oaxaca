<?php
/**
Template name: Fancy Home
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

get_header(); ?>

		<?php get_template_part( 'template-parts/content', 'home-slider' ); ?>
		 <?php get_sidebar( 'top' ); ?>
<div class="row">
		<div id="primary" class="content-area col-lg-8
		<?php
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
echo ' col-lg-push-2'; }
?>
">
		<main id="main" class="site-main row" role="main">
			<div class="container">

			<span class="headliner"><h1> Latest Posts </h1></span>

					

			<?php
			while ( have_posts() ) :
the_post();
?>
<?php
$args = array( 'numberposts' => 4 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
	<div class="card">
      <div class="row">
      	 <div class="col-md-6">
          <div class="card-img-top">
          	<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img src="<?php the_post_thumbnail_url(); ?>"/>
	</a>
<?php endif; ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-block">
            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="card-text">Little blurb. Written by.</p>
            <a href="#">Read More</a>
          </div>
        </div>

      </div>
    </div>
<?php endforeach; ?>
							

			
</div>
</div>


<?php endwhile;
wp_reset_query();
 // End of the loop. ?>
 <div class="card-deck">
<?php
query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
?>


  <div class="card">
    <?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>"/>
	</a>
<?php endif; ?>
    <div class="card-body">
      <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    
      <p class="card-text"><small class="text-muted">Written by Author</small></p>
    </div>
  </div>

<?php
endwhile; endif;
wp_reset_query();
?>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .row -->
<?php get_footer(); ?>
