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

$active = "active";
get_header(); ?>


	<div class="row">
	<div class="col-md-12">
		<div class="carousel fade article-slide" id="article-photo-carousel">
			<div class="carousel-inner cont-slider">
				<?php  while ( have_posts() ) : the_post(); 
					$id = get_the_ID();
					$meta = get_post_meta( $id, 'greenacre_repeatable' ); 
					$i = 0;
					// loop through the meta data, image attachment ID's stored within an array
					// get the URL with the wp function wp_get_attachment_image_src
					foreach ( $meta as $meta_single ) {
						foreach ( $meta_single as $single_array ) {
							$gallery_image = wp_get_attachment_image_src( $single_array['image'], 'full' ); ?>
							<div class="item <?php if ( $i == 0 ) { echo $active; } ?>">
								<img alt="" title="" src="<?php echo $gallery_image[0]; ?>" class="img-responsive">
							</div>
					<?php $i++;	}
					} ?>
        	</div>

        	<ol class="carousel-indicators">
        	<?php $j = 0;
        	foreach ( $meta as $meta_single ) {
				foreach ( $meta_single as $single_array ) {
					$thumbnail_image = wp_get_attachment_image_src( $single_array['image'], 'full' ); ?>
				<li class="<?php if ( $j == 0 ) { echo $active; } ?>" data-slide-to="<?php echo $j; ?>" data-target="#article-photo-carousel">
					<img alt="" src="<?php echo $thumbnail_image[0]; ?>" class="img-responsive">
				</li>
			<?php $j++;	}
				}	
			endwhile; ?>

    	</div>
    </div>
  </div>
			
<?php get_footer(); ?>