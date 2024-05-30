<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://prachsproste.eu
 * @since             1.0.0
 * @package           Antraktor
 *
 * @wordpress-plugin
 * Plugin Name:       Antraktor
 * Plugin URI:        https://atraktor.prachsproste.eu
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            Ezzop6
 * Author URI:        https://prachsproste.eu/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       antraktor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

require_once plugin_dir_path(__FILE__) . 'CONSTANTS.php';

function activate_antraktor() {
	require_once plugin_dir_path(__FILE__) . 'includes/class_antraktor_activator.php';
	AntraktorActivator::activate();
}


function deactivate_antraktor() {
	require_once plugin_dir_path(__FILE__) . 'includes/class_antraktor_deactivator.php';
	AntraktorDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_antraktor');
register_deactivation_hook(__FILE__, 'deactivate_antraktor');

require_once plugin_dir_path(__FILE__) . 'includes/class_antraktor.php';


function run_antraktor() {
	$plugin = new Antraktor();
	$plugin->run();
}
run_antraktor();
