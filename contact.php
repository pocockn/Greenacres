<?php
/*
 Template Name: Contact
*/

 get_header();
 ?>

<div class="row">
    <div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d158858.182370726!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1446567889480" width="100%" height="350" frameborder="0" style="border:0"></iframe>
    </div>
</div>

<!-- end of title and map section -->

<section>
        <div class="row">
            <div class="col-md-6 text-center">
                <?php  while ( have_posts() ) : the_post(); ?>
                    <h6>Write to us</h6>
                    <?php echo the_content(); ?>
                </div>
                <?php endwhile;?>   
            <?php if ( is_active_sidebar( 'contact_side' ) ) : ?>
                <?php dynamic_sidebar( 'contact_side' ); ?>
            <?php endif; ?>
        </div>
</section>

<?php get_footer(); ?>
