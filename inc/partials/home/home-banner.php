<?php
// Grab the home banner image post so we can use it's post ID
$home_banner = get_posts( array(
                'post_type' => 'home-banner',
                'posts_per_page' => 1
               ) );

?>

<!-- banner -->
    <div class="banner">
        <?php echo  get_the_post_thumbnail( $home_banner[0]->ID, 'full', array( 'class' => 'img-responsive' ) ); ?>
        <div class="welcome-message">
            <div class="wrap-info">
                <div class="information">
                    <h1 class="animated fadeInDown"><?php echo sanitize_text_field( get_option( 'banner_text_first' ) ); ?></h1>
                    <p class="animated fadeInUp"><?php echo sanitize_text_field( get_option( 'banner_text_second' ) ); ?></p>
                </div>
            </div>
        </div>
    </div>
<!-- banner-->