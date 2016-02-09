<?php

/**
* Class for Admin_Menu functions
* Including adding option pages and settings
**/


class Admin_Menu {

	/*
	* Add the menu page to give the home options their own page
	*/

	public static function create_home_menu_page() {

		add_menu_page(
			'Greenacres Home',	// Title to be dispayed in the menu
			'Home',		// text to be displayed 
			'administrator', 	// who can view
			'home_menu',	// unique ID
			'greenacres_home_menu_display',	// name of the callback function
			'dashicons-admin-multisite',  // Icon on menu page
			'3'
		);
	}

	public static function display_theme_panel_fields() {
		add_settings_section("section", "Home Options", null, "theme-options");
		
		add_settings_field("banner_text_first", "First Line of Banner Text", "display_first_banner_text", "theme-options", "section");
		add_settings_field("banner_text_second", "Second Line of Banner Text", "display_second_banner_text", "theme-options", "section");
		add_settings_field("welcome_title_home", "Welcome Title", "welcome_title", "theme-options", "section");
		add_settings_field("welcome_text_home", "Welcome Text", "welcome_text", "theme-options", "section");
		add_settings_field("book_now_link_home", "Link For the Book Now Button", "book_now_link", "theme-options", "section");
			
		/* 
	    *  third parameter is a callback to fire before setting is saved to DB
	    *  Utilise this callback to handle validation
	    */

	    register_setting("section", "banner_text_first", "greenacres_validate_input" );
	    register_setting("section", "banner_text_second", "greenacres_validate_input" );
	    register_setting("section", "welcome_title_home", "greenacres_validate_input" );
	    register_setting("section", "welcome_text_home", "greenacres_validate_input" );
	    register_setting("section", "book_now_link_home");


		/* 
	    *  Footer Options
	    */

	    add_settings_field("footer_title", "Footer Title, Company Name", "display_footer_title", "theme-options", "section");
		add_settings_field("footer_text", "Footer Text, Short Company Description", "display_footer_text", "theme-options", "section");
			
		/* 
	    *  third parameter is a callback to fire before setting is saved to DB
	    *  Utilise this callback to handle validation
	    */

	    register_setting("section", "footer_title", "greenacres_validate_input" );
	    register_setting("section", "footer_text", "greenacres_validate_input" );


	}
}



?>