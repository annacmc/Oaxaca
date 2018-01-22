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

		</main><!-- #main -->

		<div class="container-fluid single-post-widgets">
			<div class="row">

				<?php if ( is_active_sidebar( 'single-post' ) ) : ?>
					<div id="home-page-1" class="widget-area col-12">
						<?php dynamic_sidebar( 'single-post' ); ?>
					</div><!-- #footer-sidebar -->
				<?php endif; ?> 
			</div><!-- end home-page-1 widgets row -->
</div><!-- end widget container -->
		</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
