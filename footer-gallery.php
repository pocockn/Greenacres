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

    <div id="blueimp-gallery" class="blueimp-gallery" data-show="fade" data-hide="fade" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

	<?php wp_footer(); ?>
	
</body>
</html>
