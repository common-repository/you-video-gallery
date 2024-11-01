<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Youtube_Video_Gallery_Plugin
 * @subpackage Youtube_Video_Gallery_Plugin/includes
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Youtube_Video_Gallery_Plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Youtube_Video_Gallery_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $Youtube_Video_Gallery_Plugin    The string used to uniquely identify this plugin.
	 */
	protected $Youtube_Video_Gallery_Plugin;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */

	

	public function __construct() {

		$this->Youtube_Video_Gallery_Plugin = 'video-gallery-plugin';
		$this->version = '1.0.0';
		$this->define();
		
		$this->admin_menu();
		$this->admin_scripts();
		$this->add_options_link();
		$this->add_shortcode();

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Youtube_Video_Gallery_Plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Youtube_Video_Gallery_Plugin_i18n. Defines internationalization functionality.
	 * - Youtube_Video_Gallery_Plugin_Admin. Defines all hooks for the admin area.
	 * - Youtube_Video_Gallery_Plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-video-gallery-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-video-gallery-plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-video-gallery-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-video-gallery-plugin-public.php';

		$this->loader = new Youtube_Video_Gallery_Plugin_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Youtube_Video_Gallery_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Youtube_Video_Gallery_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Youtube_Video_Gallery_Plugin_Admin( $this->get_Youtube_Video_Gallery_Plugin(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Youtube_Video_Gallery_Plugin_Public( $this->get_Youtube_Video_Gallery_Plugin(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_Youtube_Video_Gallery_Plugin() {
		return $this->Youtube_Video_Gallery_Plugin;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Youtube_Video_Gallery_Plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Youtube_Video_Gallery_Plugin_Loader    Admin Menu on Options Settings Page
	 */
	public function admin_menu() {
		add_action('admin_menu', array($this, 'add_Youtube_Video_Gallery_Plugin_menu'));
	}


	// 
	public function add_Youtube_Video_Gallery_Plugin_menu(){
		add_options_page('Youtube - Video Gallery Plugin Help', 'Video Gallery Plugin', 'manage_options', 'youtube-video-gallery-plugin', array($this, 'add_Youtube_Video_Gallery_Plugin_options'));
	}

	// Callback Function
	function add_Youtube_Video_Gallery_Plugin_options() {
		if (!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		
		$this->youtube_video_gallery_plugin_page_header();

		include 'help.php';

		$this->youtube_video_gallery_plugin_page_footer();
	}


	//Add 'Settings' link on plugins page
	public function add_options_link(){
		add_filter('plugin_action_links', array($this, 'youtube_video_gallery_plugin_options_link'), 100, 2);	
	}


	// Callback Function of Video Plugin Options Link
	public function youtube_video_gallery_plugin_options_link( $links, $file ) {

  		// if( !defined('VIDEO_GALLERY_PLUGIN_PRO') ){
		//  	$links[] = '<a href="' . VIDEO_GALLERY_PLUGIN_PRO_URL . '" style="color:#fff; padding:3px 10px; background: red;" target="_blank">'._x('Upgrade', 'Plugin action link label.', 'jeweltheme').'</a>';
		// }

		
		// check to make sure we are on the correct plugin
	        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=youtube-video-gallery-plugin">Settings</a>';
	        
	        // add the link to the list
	        array_unshift($links, $settings_link);


	    return $links;
	    
	}



	// Admin Scripts
	public function admin_scripts() {

		//Add admin scripts
		if(is_admin() && isset($_GET['page']) && $_GET['page'] == 'youtube-video-gallery-plugin') {
			add_action('init', array($this, 'admin_scripts'));
		}

	}


	//Register Shortcode
	public function add_shortcode() {
		add_shortcode('yvp', array($this, 'video_gallery_plugin_shortcode'));
	}


	// Video Gallery Plugin Shortcode Function
	public function video_gallery_plugin_shortcode( $atts ) {

		extract( shortcode_atts( array(
			'listtype' 			=> 'search',
			'video_id' 		    => 'hd nature',
			'autoplay' 			=> 'false',
			'loop' 				=> 'false',
			'theme' 			=> 'false',
			'maxwidth' 			=> '',
			'center' 			=> 'false',
			'right' 			=> 'false',
            'left' 				=> 'false'

		), $atts ) );

		$listtype = htmlentities($listtype);
		$video_id = htmlentities($video_id);

		return '<div class="video-gallery-plugin-placeholder" data-listtype="'.$listtype.'" data-video_id="'.$video_id.'" data-autoplay="'.$autoplay.'" data-loop="'.$loop.'" data-maxwidth="'.$maxwidth.'" data-center="'.$center.'" data-right="'.$right.'" data-left="'.$left.'"></div>';
	}


	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}


	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function define() {
		define('VIDEO_GALLERY_PLUGIN_PRO_URL', 'https://jeweltheme.com/product/youtube-video-gallery-plugin//');
		define('VIDEO_GALLERY_PLUGIN_DIR', 'https://jeweltheme.com/product/youtube-video-gallery-plugin//');
		$plugin_video_gallery_plugin = plugin_basename(__FILE__);
	}



	// The Youtube - Video Gallery Plugin Admin Options Page
	public function youtube_video_gallery_plugin_page_header($title = 'Youtube - Video Gallery Plugin'){?>
		<style>
			.lz-right-ul{
				padding-left: 10px !important;
			}

			.lz-right-ul li{
				list-style: circle !important;
			}
		</style>
	<?php

	echo '<div style="margin: 10px 20px 0 2px;">    
	<div class="metabox-holder columns-2">
		<div class="postbox-container"> 
			<div id="top-sortables" class="meta-box-sortables ui-sortable">

				<table cellpadding="2" cellspacing="1" width="100%" class="fixed" border="0">
					<tr>
						<td valign="top"><h3>'.$title.'</h3></td>
					</tr>
				</table>
				<hr />

				<!--Main Table-->
				<table cellpadding="8" cellspacing="1" width="100%" class="fixed">
					<tr>
						<td valign="top">';

	}


	// The VIDEO_GALLERY_PLugin Theme footer
	public function youtube_video_gallery_plugin_page_footer(){
    
		    echo '</td>
		    <td width="200" valign="top" id="wp-awesome-right-bar">';
		    
		    if(!defined('VIDEO_GALLERY_PLUGIN_PRO')){
		        
		        echo '
		        <div class="postbox" style="min-width:0px !important;">
		            <h2 class="hndle ui-sortable-handle">
		                <span>Premium Version</span>
		            </h2>
		            <div class="inside">
		                <i>Upgrade to the premium version and get the following features </i>:<br>
		                <ul class="lz-right-ul">
		                    <li>Shortcode Generator from Editor</li>
		                    <li>Show Related Videos</li>
		                    <li>Show Informations</li>
		                    <li>IV Load Policy</li>
		                    <li>Allow Full Screen</li>
		                    <li>Control Options</li>
		                    <li>HD Video Options </li>
		                    <li>And many more ...</li>
		                </ul>
		                <center><a class="button button-primary" href="https://jeweltheme.com/product/youtube-video-gallery-plugin//">Upgrade Now</a></center>
		            </div>
		        </div>';
        
		    }else{
		    
		        echo '
		        <div class="postbox" style="min-width:0px !important;">
		            <h2 class="hndle ui-sortable-handle">
		                <span>Recommedations</span>
		            </h2>
		            <div class="inside">
		                <i>We recommed that you enable atleast one of the following security features</i>:<br>
		                <ul class="lz-right-ul">
		                    <li>Rename Login Page</li>
		                    <li>Login Challenge Question</li>
		                    <li>reCAPTCHA</li>
		                    <li>Two Factor Auth - Email</li>
		                    <li>Two Factor Auth - App</li>
		                </ul>
		            </div>
		        </div>';
		    }
		    
		    echo '</td>
		    </tr>
		    </table>
		    <br />
		    <div style="width:45%;background:#FFF;padding:15px; margin:auto">
		        <b>Let your friends know that you have "Youtube - Video Gallery Plugin" Looks on your website :</b>
		        <form method="get" action="http://twitter.com/intent/tweet" id="tweet" onsubmit="return dotweet(this);">
		            <textarea name="text" cols="45" row="3" style="resize:none;">I just Installed "Youtube - Video Gallery Plugin" on my @WordPress site and my "Youtube - Video Gallery" is looking Great. Thanks @jwthemeltd</textarea>
		            &nbsp; &nbsp; <input type="submit" value="Tweet!" class="button button-primary" onsubmit="return false;" id="twitter-btn" style="margin-top:20px;"/>
		        </form>
		        
		    </div>
		    <br />
		    
		    <script>
		    function dotweet(ele){
		        window.open(jQuery("#"+ele.id).attr("action")+"?"+jQuery("#"+ele.id).serialize(), "_blank", "scrollbars=no, menubar=no, height=400, width=500, resizable=yes, toolbar=no, status=no");
		        return false;
		    }
		    </script>
		    
		    <hr />
		    <a href="https://jeweltheme.com/product/youtube-video-gallery-plugin/" target="_blank">Youtube - Video Gallery Plugin</a> v'.$this->version.'. You can report any bugs <a href="https://wordpress.org/plugins/wp-awesome-faq/" target="_blank">here</a>.

		</div>  
		</div>
		</div>
		</div>';

		}



/**		Free Version Specific	**/
	
	public function free(){
		add_action('admin_notices', array($this, 'showProFeature'));
		add_action('wp_ajax_yvp_upgrade_nag_dismiss', array($this, 'upgradeNagDismiss'));
	}
	
	public $nags = 13;
	public $max_nags = 4;
	public $nag_key = 'yvp_upgrade_dismisses';
	
	public function upgradeNagDismisses( $add = false ){
		$nags = get_option($this->nag_key);
		$nags = $nags ? array((int)$nags[0], (int)$nags[1]) : array(0, 0);
		$nags[1] += ($nags[0] >= $this->nags) ? 1 : 0;
		$nags[0] = $nags[0] >= $this->nags ? 0 : (($add || $nags[0]) ? ($nags[0]+1) : $nags[0]);
		update_option($this->nag_key, $nags);
		return $nags;
	}
	
	public function upgradeNagDismiss(){
		$this->upgradeNagDismisses( true );
		echo 1;
		die();
	}
	
	public function showProFeature(){
		if( get_admin_page_title() === 'YourChannel' ) return false;
		
		$nags = $this->upgradeNagDismisses();
		if(($nags[0] && ($nags[0] <= $this->nags)) || ($nags[1] > $this->max_nags)) return false;
				
		$notice = $this->proVersionFeatures( true ); ?>
			<div class="updated yvp-nag">
				<p>
					<span style="display:inline-block;width:90%;">
						<b>YourChannel Pro Feature: </b>
						<a href="https://jeweltheme.com/product/youtube-video-gallery-plugin/?notice=<?php echo $this->$version; ?>" target="_blank">
							<?php echo $notice; ?>
						</a>
					</span><span style="text-align:right;display:inline-block;width:10%;">
						<a href="#dismiss" id="yvp-later" style="color:#E68B8B;">X</a>
					</span>
				</p>
			</div>
			<script type="text/javascript">
				jQuery('body').on('click', '#yvp-later', function(e){
					e.preventDefault();
					jQuery('.yvp-nag p').html('Ok, we\'ll ask you again.');
					window.setTimeout(function(){
						jQuery('.yvp-nag').slideUp();
					}, 1000);
					jQuery.post('admin-ajax.php', {'action':'yvp_upgrade_nag_dismiss'}, function(re){
						console.log(re);
					});
				});
			</script>
		<?php	
		
		if($nags[1] === $this->max_nags){
			update_option( $this->nag_key, array((int)$nags[0], (int)$nags[1]+1) );
			echo '<div class="updated yvp-nag"><p>We won\'t ask you to upgrade anymore. Thanks for using <a href="https://jeweltheme.com/product/youtube-video-gallery-plugin/?notice">YourChannel</a></p></div>';
		}	
	}
	
	public function proVersionFeatures( $random = false ){
		$features = array(
			'Multiple channels.',		
			'List videos from a certain playlist in the <i>Videos</i> section.',
			'Let users search YouTube - can be restricted to your channel.',
			'Search bar below banner.',
			'Show videos by a search term.',
			'Change colors to match with your site.',
			'Show video stats/ratings (2 styles).',
			'Limit number of videos on page.',
			'Sort uploads (latest, most liked, most viewed).',
			'Autoplay next video.',
			'Preload any or first video.',
			'Custom CSS input.',
			'Show a subscribe button (multiple styles).',
			'Show other social media links in banner.',
			'Specify grid column numbers. <b>New</b>',
			'Blacklist videos. <b>New</b>',
			'Pagination with Previous / Next buttons. <b>New</b>',
			'Widget.'
		);
		if($random) return $features[ rand(0, sizeof($features)-1) ];
		
		foreach($features as $f){
			echo '<li>'. $f .'</li>';
		}
	}	




}