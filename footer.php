<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loose
 */

?>

	</div><!-- #content -->

		
			<div id="left-sidebar" class="left-sidebar-area">
				<div class="left-sidebar-content">
					<div class="left-header">
					<div class="left-logo">
						<?php if ( has_custom_logo() ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
						<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<button class="left-sidebar-close" title="<?php esc_html_e( 'Close', 'loose' ); ?>"><svg><path d="M18.984 6.422l-5.578 5.578 5.578 5.578-1.406 1.406-5.578-5.578-5.578 5.578-1.406-1.406 5.578-5.578-5.578-5.578 1.406-1.406 5.578 5.578 5.578-5.578z"></path></svg></button>
					</div>
					</div>
					<nav id="site-navigation" class="main-navigation" role="navigation">
								<?php
								wp_nav_menu(
									 array(
										 'theme_location' => 'primary',
										 'menu_id' => 'primary-menu',
									 )
									);
?>
					</nav><!-- #site-navigation -->
					<div class="left-nav-social">
						<?php echo loose_social_profiles(); // WPCS: XSS OK. ?>
					</div>
					<?php get_sidebar( 'left' ); ?>
					<div class="site-info">
			<?php echo '<p>&copy; ' . esc_html( date( 'Y' ) ) . ' ' . esc_html( get_bloginfo( 'name' ) ) . '</p>'; ?>
					</div><!-- .site-info -->
				</div>
			</div> 
		<div class="left-sidebar-bg">
		</div><!-- .left-sidebar-bg -->
		
		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php
if ( function_exists('wpp_get_mostpopular') ) {
 
    $args = array(
        'range' => 'all',
        'thumbnail_width' => 225,
        'thumbnail_height' => 135,
        'wpp_start' => '<ul class="wpp-grid">',
        'post_html' => '<li>{thumb_img}<div class="wpp-grid-overlay"></div>{title}</li>'
    );
 
    wpp_get_mostpopular( $args );
 
}
?>
	
			<div class="container-fluid popular-posts">
<span class="headliner"><h1> Most Popular</h1></span>

	<div class="row">
	
			 <div class="card-deck">



  <div class="card">

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>"/>
	</a>

    <div class="card-body">
      <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    
      <p class="card-text"><small class="text-muted">Written by Author</small></p>
    </div>
  </div>



</div>
</div>
</div>
		<div class="site-info">
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php
			if ( has_custom_logo() ) :
				the_custom_logo();
			else :
				bloginfo( 'name' );
			endif;
			?>
			</a></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'loose' ) ); ?>">
								   <?php
				// translators: WordPress.
				printf( esc_html__( 'Proudly powered by %s', 'loose' ), 'WordPress' );
				?>
				</a>
			<span class="sep"> | </span>
			<?php
			// translators: theme neame and theme author..
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'loose' ), 'Loose', '<a href="https://fatthemes.com/" rel="designer">Fat Themes</a>' );
				?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
		
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
