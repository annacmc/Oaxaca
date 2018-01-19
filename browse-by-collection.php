	<div class="row"> <!-- begin browse by collection -->
  <div class="col-md-12 browse-destinations d-none d-md-block d-lg-block d-xl-block">
    <h3 class="underline-header"> Browse by Collection </h3>
    <p> Some of the most popular collections, curated just for you. See the full list of collections <a href="collection/"> here </a></p>

  </div><!--end browse by collection col header -->
</div><!--end row -->
<div class="row">

<?php
        $categories = get_terms(
            array(
                'collection'

            ),
            array(
                'hide_empty' => false,
              
            )
        );

        foreach( $categories AS $cat )
        {
           if ($cat->count > 1) {
           $taxonomy = new WP_Query( array( 'posts_per_page' => 1, 'post_type' =>'post', 'tax_query' => array( array('taxonomy' => 'collection', 'field' => 'slug', 'terms' => $cat->slug ) )) );


            while ( $taxonomy->have_posts() )
            {

                $taxonomy->the_post();
            ?>

                <div class="col-md-4 destinations">
                 <div class="col-12 destination-grid" style="background-image: url(<?php 
echo get_the_post_thumbnail_url(); ?>);">
                     <span class="text-overlay"> <h2><a href="<?php bloginfo( 'wpurl' ); ?>/destination/<?php echo $cat->slug ?>">
                          <?php echo $cat->name ?></a></h2>
                          <p><?php echo $cat->description ?></p></span>
                        
                    
                    <div class="overlay"></div></div>

               
                </div>

            <?php
        }
            }
        }
        wp_reset_postdata();
?>
</div> <!-- end browse by collection -->