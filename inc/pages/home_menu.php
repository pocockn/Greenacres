<?php

/**
* Class for Admin_Menu functions
* Including adding option pages and settings
**/

function greenacres_home_menu_display() { ?>
	<div id="wrap">
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			<?php
			        settings_fields("section");
			        do_settings_sections("theme-options");
	           
	            submit_button(); 
			?>
		</form>
	</div>

<?php } 


/**
* Functions for creating the HTML for our options page
**/

function display_first_banner_text()
{
	?>
    	<input type="text" size="35" name="banner_text_first" id="banner_text_first" value="<?php echo sanitize_text_field( get_option('banner_text_first') ); ?>" />
    <?php
}

function display_second_banner_text()
{
	?>
    	<input type="text"  size="35" name="banner_text_second" id="banner_text_second" value="<?php echo sanitize_text_field( get_option('banner_text_second') ); ?>" />
    <?php
}

function welcome_title()
{
	?>
    	<input type="text" size="35" name="welcome_title_home" id="welcome_title_home" value="<?php echo sanitize_text_field( get_option('welcome_title_home') ); ?>" />
    <?php
}

function welcome_text()
{
	?>
    	<textarea id="welcome_text_home" name="welcome_text_home" rows="6" cols="70"><?php echo sanitize_text_field( get_option('welcome_text_home') ); ?></textarea>
    <?php
}

function book_now_link()
{
	?>
    	<input type="text" size="35" name="book_now_link_home" id="book_now_link_home" value="<?php echo get_option('book_now_link_home'); ?>" />
    <?php
}

/**
* Footer HTML
**/

function display_footer_title() {
	?>

    	<input type="text" size="35" name="footer_title" id="footer_title" value="<?php echo get_option('footer_title'); ?>" />
    <?php
}

function display_footer_text()
{
	?>
    	<textarea id="footer_text" name="footer_text" rows="6" cols="70"><?php echo sanitize_text_field( get_option('footer_text') ); ?></textarea>
    <?php
}



/**
* Validate the data before it's entered into the database
**/

function greenacres_validate_input( $input ) {

	if ( isset( $input ) ) {
		$output = strip_tags( stripslashes( $input ) );
	}	

	return apply_filters( 'greenacres_validate_input', $output);
}
