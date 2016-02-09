<?php

/**
 * Template Name: Gallery
 */

get_header(); 

$args = array(
        'post_status'   => 'published',
        'posts-per_page'    => '-1',
        'post_type' =>  'gallery'
);

$gallery_query = new WP_Query( $args );

?>

    <?php 

    $i = 0;

    if ( $gallery_query->have_posts() ) : while( $gallery_query->have_posts() ) : $gallery_query->the_post(); 

        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full' );
        $thumb_url = $thumb_url_array[0];

    // If the current counter dividied by 3 leaves no remainder add a row
    // This splits our archive into rows with 3 elements in
    if ($i % 3 == 0) { ?>         

    <div class="row gallery">
    <?php } ?>

        <div class="col-md-4 col-sm-6 col-xs-12 wowload fadeInUp">
            <a href="http://test.greenacresbnb.co.uk/wordpress/gallery-test/" title="Foods" class="gallery-image">
            <img src="<?php echo $thumb_url; ?>" class="img-responsive"></a>
        </div>

    <?php 
    $i++;

    if ( $i != 0 && $i % 3 == 0 ) { ?>

    </div><!--/.row-->
    <?php 
    }
    endwhile; endif;  ?>     

<?php

get_footer('gallery'); 

?>
