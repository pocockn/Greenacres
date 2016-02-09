 <?php
 
 $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' =>  'DESC',
);

$gallery_home_items = new WP_Query( $args );

?>

  <!-- reservation-information -->
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
            <?php if ( $gallery_home_items->have_posts() ) : while ( $gallery_home_items->have_posts() ) : $gallery_home_items->the_post();  

                 $thumb_id = get_post_thumbnail_id();
                 $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full' );
                 $thumb_url = $thumb_url_array[0];

            ?>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php get_home_url(); ?>/wordpress/gallery/" class="portfolio-box">
                        <img src="<?php echo $thumb_url ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category Name
                                </div>
                                <div class="project-name">
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; endif; ?>
            </div>
        </div>
    </section>