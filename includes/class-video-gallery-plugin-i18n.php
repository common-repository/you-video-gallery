<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/includes
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Youtube_Video_Gallery_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'video-gallery-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}