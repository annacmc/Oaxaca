	<div  id="popular-posts" class="row row-full">

			<h1 class="underline-header"> Most Popular </h1>
	
		
<?php
if ( function_exists('wpp_get_mostpopular') ) {
 
    $args = array(
        'range' => 'last30days',
        'limit' => 6,
         'post_type' => 'post',
        'thumbnail_width' => 500,
        'wpp_start' => '<div class="row justify-content-center">',
        'post_html' => ' <div class="popular-post-col col-xs-12 col-md-6 col-lg-2"> <div class="classWithPad">{thumb_img}<span class="post-card-title">{title}</span></div></div>',
        'wpp_end' => '</div>',
    );
 
    wpp_get_mostpopular( $args );
 
}
?>

</div>