<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till the header of the page
 *
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <?php wp_head();  ?>
</head>

<body id="home">

    <!-- header -->
    <nav class="navbar  navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo-new.png'?>" class="navbar-header" alt="holiday crown"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <?php /* Primary navigation */
                wp_nav_menu( array(
                  'menu' => 'top_menu',
                  'depth' => 2,
                  'container' => false,
                  'menu_class' => 'nav navbar-nav',
                  //Process nav menu using our custom nav walker
                  'walker' => new wp_bootstrap_navwalker())
                );
            ?>
            </div>
            <!-- navbar-collapse -->
        </div>
        <!-- container-fluid -->
    </nav>
    <!-- If the site isn't the home page, display a title -->
	<?php
		if( !is_front_page() ) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h6><?php echo get_the_title(); ?></h6>
            </div>
        </div>

    <?php } ?>


