<?php

/**
 * Fired during plugin activation.
 *
 * @link       http://likewowplugins.com
 * @since      1.0.0
 *
 * @package    crm-analytics
 * @subpackage crm-analytics/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    crm-analytics
 * @subpackage crm-analytics/includes
 * @author     Ethan Allen
 */
class Greenrope_Analytics_Activator {

	/**
	 * Initialize default options for plugin. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		/**
		 * Default Options on plugin activation
		 *
		 */ 
		function greenrope_analytics_default_options() {

			if(get_option('crm_analytics_settings') == ''){		

				$greenrope_analytics_settings = array (
					'enable_plugin' => false,		// Enable plugin switch
					'crm_acct' => '',			// GreenRope account number
					'crm_url' => ''
				);

				update_option('crm_analytics_settings', $greenrope_analytics_settings);

			}

		}

	}

}