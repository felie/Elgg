<?php

	/**
	 * Elgg blog plugin
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	/**
	 * Blog initialisation
	 *
	 * These parameters are required for the event API, but we won't use them:
	 * 
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */

		function blog_init() {
			
			// Load system configuration
				global $CONFIG;
				
			// Load translations
				register_translations($CONFIG->pluginspath . "blog/languages/");
				
			// Set up menu for logged in users
				if (isloggedin()) {
					add_menu(elgg_echo('blog'), $CONFIG->wwwroot . "mod/blog/",array(
						menu_item(elgg_echo('blog:read'),$CONFIG->wwwroot."mod/blog/?username=" . $_SESSION['user']->username),
						menu_item(elgg_echo('blog:addpost'),$CONFIG->wwwroot."mod/blog/add.php"),
					));
				}
				
		}

	// Make sure the blog initialisation function is called on initialisation
		register_event_handler('init','system','blog_init');
		
	// Register actions
		global $CONFIG;
		register_action("blog/add",false,$CONFIG->pluginspath . "blog/actions/add.php");
		
?>