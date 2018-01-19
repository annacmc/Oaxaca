<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->
	<?php do_action( 'storefront_before_footer' ); ?>
<div id="footer-widget-container" class="container-fluid no-gutters footer-widget-container"><div class="row no-gutters">
				 <?php if ( is_active_sidebar( 'full_width_footer' ) ) : ?>
	<div id="full-width-footer" class="widget-area col-12 no-gutters">
		<?php dynamic_sidebar( 'full_width_footer' ); ?>
	</div><!-- #footer-sidebar -->
<?php endif; ?></div></div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="col-12">


			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
