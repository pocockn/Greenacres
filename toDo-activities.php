<?php
/**
 * template Name: To Do Activities
 */

get_header(); 


?>

   <!-- Title and map section -->
    <section>
            <div class="row">
            <?php  while ( have_posts() ) : the_post(); 

                $post_id = get_the_ID();

                $iframe_nearby = get_post_meta ( $post_id, 'greenacre_iframe' );
            
            ?>
                <div class="col-md-12">
                    <p><?php the_content(); ?></p>
                </div>
                <div class="col-md-12">
                    <div id="map-canvas-activites" style="height:400px; width:100%"></div>
                </div>
            <?php endwhile;?>  
            </div>
    </section>

			
<?php 


get_footer(); 

?>