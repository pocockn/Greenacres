<?php
/**
 * template Name: To Do
 */

get_header(); ?>

   <!-- Title and map section -->
    <section>
            <div class="row">
            <?php  while ( have_posts() ) : the_post(); ?>
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            <?php endwhile;?>  
            </div>
    </section>


    <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper">
                        <a href="<?php echo get_site_url(); ?>//food-drink"><img src="<?php echo get_template_directory_uri() ?>/assets/images/todo1.jpg" class="img-responsive pull-left"></a>
                        <div class="text-center overlay">
                            <h3>Food &amp; Drink</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper">
                    <a href="<?php echo get_site_url(); ?>/lesuire-activities"><img src="<?php echo get_template_directory_uri() ?>/assets/images/todo2.jpg" class="img-responsive pull-right"></a>
                    <div class="text-center overlay">
                        <h3>Lesuire &amp; Activities</h3>
                    </div>
                    </div>
                </div>
            </div>
    </section>
			

<?php 

get_footer(); 

?>
