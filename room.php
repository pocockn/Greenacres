<?php

/**
 * Template Name: Rooms
 */

get_header(); 

$args = array(
        'post_status'   => 'published',
        'posts-per_page'    => '-1',
        'post_type' =>  'room'
);

$rooms_query = new WP_Query( $args );

?>


<div class="row">
    <?php if ( $rooms_query->have_posts() ) : while( $rooms_query->have_posts() ) : $rooms_query->the_post(); 

        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full' );
        $thumb_url = $thumb_url_array[0];

    ?>
    <div class="col-sm-6 wowload fadeInUp">
      <div class="rooms">
        <img src="<?php echo $thumb_url; ?>" class="img-responsive">
          <div class="info">
          <h3><?php the_title(); ?></h3>
          <p> Missed lovers way one vanity wishes nay but. Use shy seemed within twenty wished old few regret passed. Absolute one hastened mrs any sensible</p>
          <a href="<?php the_permalink(); ?>" class="btn btn-default">Check Details</a>
          </div>
        </div>
      </div>
  <?php endwhile; endif; ?>
  </div>

<?php

get_footer(); 

?>