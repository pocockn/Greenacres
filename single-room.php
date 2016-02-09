<?php

get_header();

// Start the loop.
while ( have_posts() ) : the_post();

$post_id = get_the_ID();

$amentities = get_post_meta ( $post_id, 'greenacre_repeatable' );


?>

<!-- RoomDetails -->
       <?php get_template_part( 'inc/partials/room', 'gallery' ); ?>
        <!-- RoomCarousel-->

        <div class="room-features">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                   <?php the_content(); ?>
                </div>
                <div class="col-sm-12 col-md-4 amenitites">
                    <h3>Amenitites</h3>
                    <ul class="room-details">
                    <?php
                        foreach ( $amentities as $key ) {
                            foreach ( $key as $i => $j ) { ?>
                            <li>  <?php echo $j['amenitie']; ?> </li>
                    <?php  }  
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>

<?php

endwhile; 

wp_reset_postdata();

get_footer(); 

?>