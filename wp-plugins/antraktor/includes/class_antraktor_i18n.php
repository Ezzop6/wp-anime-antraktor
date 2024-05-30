<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://prachsproste.eu
 * @since      1.0.0
 *
 * @package    Antraktor
 * @subpackage Antraktor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Antraktor
 * @subpackage Antraktor/includes
 * @author     Michal Ratschman <ezzop6@gmail.com>
 */
class AntraktorI18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'antraktor',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
