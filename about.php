<?php
/*
 Template Name: About
*/

get_header(); ?>


	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-md-12">
			 <?php the_post_thumbnail( 'full', array( 'class' => 'about-image' ) ); ?>
        </div>
        <div class="col-md-12">
			<?php echo the_content(); ?>
        </div>
        <?php endwhile; endif; ?>		
    </div>


<?php 

get_footer(); 

?>
