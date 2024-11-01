<link rel="stylesheet" type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/you-video-gallery/admin/css/video-gallery-plugin-admin.css" media="all" />

<div class="wrap video-gallery-plugin">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2>Youtube - Video Gallery Plugin Help</h2>

	<p>A great and very Simple way to show Youtube Videos. Fully Responsive Youtube Video Player. <br><br>

   <strong> You can choose following Options. </strong>

		<ul>
			<li>A regulair playlist (the default), user_uploads (channel)</li>
			<li>You can  </li>
			<li>make a list with search keywords or make your own list all with the use of shortcodes</li>
		</ul>
	<p>

	<h3> Youtube - Video Gallery Plugin Shortcode Options</h3>

    <ul>
		<li>listtype="playlist" <i>-- listtype playlist, user_uploads, search (the default) or custom</i>
		<li>video_id="hd nature" <i>-- Here the playlist ID, channel (user_uploads) name ,search keywords (max 20) or fill in ID's seperated by comma.</i>
		<li>autoplay="false" <i>-- If set to true the player will play onload. (not recommended)</i>
		<li>loop="false" <i>-- The player will play the entire playlist and then start again at the first video.</i>
		<li>maxwidth="" <i>-- Here you can set the maxwidth in % or px. (example 500px or 50%)</i>
		<li>center="false" <i>-- If maxwidth is set you can optional center the player.</i>
		<li>right="false" <i>-- If maxwidth is set you can optional float the player to the right. Then set the maxwidth in % <b>not</b> in px</i>
		<li>left="false" <i>-- If maxwidth is set you can optional float the player to the left.  Then set the maxwidth in % <b>not</b> in px</i>
	</ul>

	<h3>Youtube - Video Gallery Plugin shortcode examples</h3>

	<p><strong>Ex: [yvp video_id="hd nature" theme="true"]</strong> - Search HD nature with white color</p>

	<p><strong>Ex: [yvp listtype="user_uploads" video_id="PLfdtiltiRHWH9JN1NBpJRFUhN96KBfPmd"]</strong> - Channel user "Build a Shopping Cart with PHP", hide video controls, hide thumbs and black skin (default)</p>

    <p><strong>Ex: [yvp listtype="playlist" video_id="PL92D03D9BED0E5588" maxwidth="500px" center="true"]</strong> - Playlist, maxwidth 500px and centered</p>

    <p><strong>Ex: [yvp listtype="playlist" video_id="PL92D03D9BED0E5588" maxwidth="40%" right="true"]</strong> - Playlist, maxwidth 40% and float to the right</p>

    <p><strong>Ex: [yvp listtype="custom" video_id="gFftC9O9EZ0,-Fv-iUhLcys,Vv2YXjCWg1A,eIa7YxlHq3A" left="true"]</strong> - Custom Playlist with ID's, comma seperated</p>

    Here you can prepare the shortcode. Copy and paste into your page.
    <textarea name="test" style="width:100%;height:40px;overflow: auto;" wrap="off">[yvp listtype="search" video_id="here the search words"]</textarea>

    <h3>How to find your ID ?</h3>
    
    <h4>Youtube Video ID</h4>
    <img src="<?php echo WP_PLUGIN_URL; ?>/you-video-gallery/admin/image/youtube_id.png" width="600" height="127" /> <br>

    <h4>Youtube Playlist Video ID</h4>
    <img src="<?php echo WP_PLUGIN_URL; ?>/you-video-gallery/admin/image/playlist_id.png" width="1100" height="127" />

    <h3>Restrictions</h3>
    <p>This is the default playlist player from youtube and uses flash and html5. On some devices it will use the video overlay from the used OS, so it will play a video but not a complete playlist (for example on a iphone).</p></p>
</div>



<?php 

// Is the premium features there ?
if(file_exists( VIDEO_GALLERY_PLUGIN_DIR.'/premium.php')){
    
    // Include the file
    include_once( VIDEO_GALLERY_PLUGIN_DIR.'/premium.php');
    
    video_gallery_plugin_init();
    
}