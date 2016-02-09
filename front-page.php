<?php
/**
 * Template Name: Front Page
 */

get_header(); 

?>

    <?php get_template_part( 'inc/partials/home/home', 'banner' ); ?>


    <!-- Welcome to Greenacres -->
    <div id="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="welcome-header"><?php echo sanitize_text_field( get_option( 'welcome_title_home' ) ); ?></h2>
                    <p class="welcome-text">
                    	<?php echo sanitize_text_field( get_option( 'welcome_text_home' ) ); ?>
                    </p>
                    <a href="<?php echo esc_url( get_option( 'book_now_link_home' ) );?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/booknow.png'; ?>" class="img-responsive center-block"></a>
                </div>
                <!-- end of col-md-12 -->
            </div>
            <!-- end of container -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of welcome div -->
    <!-- end of welcome -->


    <?php get_template_part( 'inc/partials/home/gallery', 'featured' ); ?>
    <!-- end of gallery section -->	

<?php get_footer('home'); ?>
