

<?php
/**
 * The template used for displaying page content in category.php
 *
 * @package storefront
 */





if( $counter == 1 ) {  ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row"><div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?
if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
	</a>
<?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
		<h2><a href="<?php the_permalink(); ?>" title="Read more"> <? echo $counter; ?> BIG TESTING FIRST IMG <?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
</div></div>
</div><!-- #post-## -->/

<? $counter++;
} else { ?>



<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row"><div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?
if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img class="latest-posts-thumbnail" src="<?php the_post_thumbnail_url(); ?>"/>
	</a>
<?php endif;  ?></div><div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
		<h2><a href="<?php the_permalink(); ?>" title="Read more"><? echo $counter; ?> remaining posts<?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
</div></div>
</div><!-- #post-## -->/

<?php }

$counter++;
?>





