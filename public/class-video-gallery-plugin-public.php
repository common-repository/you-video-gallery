<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/public
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Youtube_Video_Gallery_Plugin_Public {

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
	 * @param      string    $Youtube_Video_Gallery_Plugin       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Youtube_Video_Gallery_Plugin, $version ) {

		$this->Youtube_Video_Gallery_Plugin = $Youtube_Video_Gallery_Plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		if(!is_admin()) {
			wp_register_style('video-gallery-plugin', plugins_url('css/video-gallery-plugin-public.css', __FILE__), false, '1', 'screen');
			wp_enqueue_style('video-gallery-plugin');

			wp_register_style('vgp-venobox', plugins_url('css/venobox.css', __FILE__), false, '1', 'screen');
			wp_enqueue_style('vgp-venobox');
			
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		if(!is_admin()) {
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

			// wp_enqueue_script( $this->Youtube_Video_Gallery_Plugin, plugin_dir_url( __FILE__ ) . 'js/jquery.video-gallery-plugin.js', false , $this->version, false );

			//wp_enqueue_script('jquery');
			wp_enqueue_script( $this->Youtube_Video_Gallery_Plugin, plugin_dir_url( __FILE__ ) . 'js/jquery.video-gallery-plugin.js', false , $this->version, true );
			wp_register_script( 'vgp-venobox', plugin_dir_url( __FILE__ ) . 'js/venobox.min.js', false , $this->version, true );
			wp_enqueue_script( 'vgp-venobox' );
			
		}

	}

}



add_action( 'wp_footer', 'kite_custom_time_script',1000 );

function kite_custom_time_script(){ ?>

	<script type="text/javascript">
		var $ = jQuery.noConflict();
		$(document).ready(function($) {
            "use strict";
	    
	    	/* default settings */
    		$('.venobox').venobox();

	});


	</script>

<?php }