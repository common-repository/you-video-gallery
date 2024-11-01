<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/admin
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Youtube_Video_Gallery_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Youtube_Video_Gallery_Plugin    The ID of this plugin.
	 */
	private $Youtube_Video_Gallery_Plugin;

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
	 * @param      string    $Youtube_Video_Gallery_Plugin       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Youtube_Video_Gallery_Plugin, $version ) {

		$this->Youtube_Video_Gallery_Plugin = $Youtube_Video_Gallery_Plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Youtube_Video_Gallery_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Youtube_Video_Gallery_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Youtube_Video_Gallery_Plugin, plugin_dir_url( __FILE__ ) . 'css/video-gallery-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Youtube_Video_Gallery_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Youtube_Video_Gallery_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->Youtube_Video_Gallery_Plugin, plugin_dir_url( __FILE__ ) . 'js/video-gallery-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

}