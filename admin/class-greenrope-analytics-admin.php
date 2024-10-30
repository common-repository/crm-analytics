<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://endif.media
 * @since      1.0.0
 *
 * @package    crm-analytics
 * @subpackage crm-analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    crm-analytics
 * @subpackage crm-analytics/admin
 * @author     Ethan Allen
 */
class Greenrope_Analytics_Admin {


	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;


	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;		

	}


	/**
	 * Register the CSS for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) .  'css/crm-analytics.css', array(), $this->version, false );	
    }


	/**
	 * Register the menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function greenrope_analytics_register_analytics_menu(){
		add_menu_page( 'CRM Analytics', 'CRM Analytics', 'manage_options', 'greenrope_analytics_menu_page', array( $this, 'greenrope_analytics_display_options_page' ), 'dashicons-chart-line'); //dashicons-chart-pie dashicons-chart-line
	}


	/**
	 * Function that displays the options form.
	 *
	 * @since    1.0.0
	 */
	public function greenrope_analytics_display_options_page() {
		//include plugins_url( 'greenrope-analytics/admin/partials/greenrope-analytics-options-form.php');
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/greenrope-analytics-options-form.php';
	}


	/**
	 * Add CSS to alter menu button.
	 *
	 * @since    1.0.0
	 */
	public function greenrope_analytics_menu_icon_style() {

		/**
		 * This function provides style to the plugin menu icon.
		 *
		 * The Greenrope_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		echo '<style type="text/css">
				a.toplevel_page_gra_endif_analytics_menu_page img {
				  width: 1.4em;
				}
				.toplevel_page_greenrope_analytics_menu_page .dashicons-chart-line:before {
				    color: #80C346 !important;
				}
			  </style>';

	}


	/**
	 * Display admin notice.
	 *
	 * @since    1.0.0
	 */
	public function greenrope_analytics_admin_notice() {

		/**
		 * This function is notifies the user that Greenrope Analytics
		 * is disabled.
		 *
		 * The Greenrope_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$plugin_settings_page = '<a href="' . admin_url( 'admin.php?page=greenrope_analytics_menu_page' ) . '">' . __('plugin settings page', 'greenrope-analytics' ) . '</a>';
		$greenrope_analytics_settings = get_option('greenrope_analytics_settings');

		if ( !current_user_can( 'manage_options' ) ) return;

		if ($greenrope_analytics_settings['enable_plugin'] != true) {

		    echo '<div class="error">

			       <p>'.__('CRM Analytics is disabled. Please visit the ', 'crm-analytics' ). $plugin_settings_page . __(' to enable.', 'greenrope-analytics' ).'</p>

			     </div>';
		}

	}
	

}