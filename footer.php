<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #body div element.
 */
?>
    </div> <!-- end of container -->
    <footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4><?php echo sanitize_text_field( get_option( 'footer_title' ) ); ?></h4>
                    <p><?php echo sanitize_text_field( get_option( 'footer_text' ) ); ?></p>
                </div>

                <div class="col-sm-3">
                    <h4>Quick Links</h4>
                    <?php /* Primary navigation */
                        wp_nav_menu( array(
                          'menu' => 'top_menu',
                          'depth' => 2,
                          'container' => false,
                          'menu_class' => 'list-unstyled',
                          //Process nav menu using our custom nav walker
                          'walker' => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div>
                <div class="col-sm-4 subscribe">
                    <h4>Keep up to date with the latest offers</h4>
                    <?php if ( is_active_sidebar( 'footer_form' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_form' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->

        <!--/.footer-bottom-->
    </footer>
    <!-- end of footer section -->
    <div class="text-center copyright">Site by Blueprint Web Designs</a>
    </div>

	<?php wp_footer(); ?>
	
</body>
</html>
