<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jeweltheme.com
 * @since             1.0.0
 * @package           Youtube - Video Gallery Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       You Video Gallery
 * Plugin URI:        https://jeweltheme.com/shop/youtube-video-gallery-plugin/
 * Description:       You Video Gallery is Youtube Video Gallery WordPress plugin
 * Version:           1.0.5.1
 * Author:            Liton Arefin
 * Author URI: 		  https://wordpress.org/plugins/ultimate-blocks-for-gutenberg/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       video-gallery-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( __FILE__ ) . '/includes/easy-blocks.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-video-gallery-plugin-activator.php
 */
function activate_Youtube_Video_Gallery_Plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-video-gallery-plugin-activator.php';
	Youtube_Video_Gallery_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-video-gallery-plugin-deactivator.php
 */
function deactivate_Youtube_Video_Gallery_Plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-video-gallery-plugin-deactivator.php';
	Youtube_Video_Gallery_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Youtube_Video_Gallery_Plugin' );
register_deactivation_hook( __FILE__, 'deactivate_Youtube_Video_Gallery_Plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-video-gallery-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Youtube_Video_Gallery_Plugin() {

	$plugin = new Youtube_Video_Gallery_Plugin();
	$plugin->run();

}
run_Youtube_Video_Gallery_Plugin();