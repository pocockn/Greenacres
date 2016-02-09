<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


	<div class="row">
		<?php  while ( have_posts() ) : the_post(); ?>
        <div class="col-md-12">
			<?php echo the_content(); ?>
        </div>
        <?php endwhile;?>		
    </div>
			

<?php get_footer(); ?>