<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://likewowplugins.com
 * @since             1.0.0
 * @package           CRM Analytics
 *
 * @wordpress-plugin
 * Plugin Name:       CRM Analytics
 * Plugin URI:        http://endif.media/pluginshowcase-greenrope/
 * Description:       Plugin to add Greenrope CRM Analytics to the footer of your WordPress pages. Improved UI give you control over which domain you are tracking.
 * Version:           1.0.0
 * Author:            Ethan Allen
 * Author URI:        http://likewowplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       crm-analytics
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_greenrope_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-greenrope-analytics-deactivator.php';
	Greenrope_Analytics_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_greenrope_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-greenrope-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_greenrope_analytics() {

	$plugin = new Greenrope_Analytics();
	$plugin->run();

}
run_greenrope_analytics();