<?php
/*
 Template Name: Testimonials
*/

$postTitleError = '';

if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

	if ( trim( $_POST['user_testimonial'] ) === '' && trim( $_POST['entry_name'] ) ) {
		$postTitleError = 'Please enter a name and testimonial';
		$hasError = true;
	} else {

$testimonial_post = array(
	'post_title'	=>	strip_tags( stripslashes ( $_POST['entry_name'] ) ),
	'post_content'	=> 	strip_tags( stripslashes( $_POST['user_testimonial'] ) ),
	'post_type'		=>  'testimonials',
	'post_status'	=>	'pending'
);

		$post_id = wp_insert_post( $testimonial_post );

		if ($post_id) {
			wp_redirect( home_url() );
			exit;
		}
	}
}

$args = array(
        'post_status'   => 'published',
        'posts-per_page'    => '6',
        'post_status'   => 'publish',
        'post_type' =>  'testimonials'
);

$testimonial_query = new WP_Query( $args );

get_header(); ?>

    <!-- Title and map section -->
    <section>
            <div class="row">
                <div class="col-md-12">
                    <p>What people are saying about Greenacres Bed &amp; Breakfast</p>
                </div>
            </div>
    </section>
    <!-- end of title and map section -->
    <?php 
    if ( $testimonial_query->have_posts() ) : while( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>

    <section>
            <div class="row">
                <div class="col-md-12">
                   <p><i>"<?php the_content(); ?>"</i><span><b> <?php the_title(); ?></b></span></p>
                </div>
            </div>
    </section>
    
    <?php endwhile; endif; ?>
    <?php wp_reset_postdata(); ?>
    <?php wp_reset_query(); ?>

        <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
            <div class="col-md-12">
                <h6><?php the_content(); ?></h6>
        <?php endwhile; endif; ?>
                <form role="form" method="post" action="">
                	<div class="form-group">
                		<input id="textinput" name="entry_name" type="text" placeholder="Name" class="form-control" value="<?php if ( isset( $_POST['entry_name'] ) ) echo $_POST['entry_name']; ?>">
                	</div>
                    <div class="form-group">
                        <textarea class="form-control" rows="8" id="user_testimonial" name="user_testimonial" placeholder="Please enter your testimonial for Greenacres, it will be published after it is approved" required><?php if ( isset( $_POST['user_testimonial'] ) ) { echo sanitize_text_field( $_POST['user_testimonial'] ); } ?></textarea>
                        <?php if ( $postTitleError != '' ) { ?>
                        	<span class="error"><?php echo $postTitleError; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 ">
                        	<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                        	<input type="hidden" name="submitted" id="submitted" value="true" />
                            <button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php get_footer(); ?>
