<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. ?>

		<div class="single-post-widgets">
			<div class="row">

				<?php if ( is_active_sidebar( 'bottom-of-post-widget' ) ) : ?>
					<div id="home-page-1" class="widget-area col-12">
						<?php dynamic_sidebar( 'bottom-of-post-widget' ); ?>
					</div><!-- #footer-sidebar -->
				<?php endif; ?> 
			</div><!-- end home-page-1 widgets row -->
</div><!-- end widget container -->
		</main><!-- #main -->

		</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
