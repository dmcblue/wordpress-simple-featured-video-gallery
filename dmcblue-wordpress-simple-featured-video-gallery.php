<?php
/*
Plugin Name: Simple Featured Video Gallery
Plugin URI: https://github.com/dmcblue/wordpress-simple-featured-video-gallery
Description: Simple viewer for Youtube videos
Author: dmcblue@gmail.com
Version: 0.1.0

*/

/* Code starts here */

$pluginName = "Simple Featured Video Gallery";
$pluginVer  = "0.1.0";

/** Load Shortcodes **/

class SimpleFeaturedVideoGallery {
    public static function enqueueClientStyles() {
		//*
        wp_register_style( 'SimpleFeaturedVideoGallery-Style-Bundle',
            plugins_url('dmcblue-wordpress-simple-featured-video-gallery.css', __FILE__)
        );
        wp_enqueue_style('SimpleFeaturedVideoGallery-Style-Bundle');
		//*/
    }
    public static function enqueueClientScripts() {
        wp_register_script('SimpleFeaturedVideoGallery-Script-bundle',
            plugins_url('dmcblue-wordpress-simple-featured-video-gallery.js', __FILE__)
        );
        wp_enqueue_script('SimpleFeaturedVideoGallery-Script-bundle');
    }
	public static function shortCodeDan($atts, $content) {
		$codes = !empty($atts['codes']) ? explode(',', $atts['codes']) : [];
        ob_start();
        ?>
            <div class="dmcblue-video-gallery">
				<iframe class="dmcblue-video-showcase" width="560" height="315" src="https://www.youtube.com/embed/<?php echo reset($codes); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				<div class="dmcblue-video-showcase-gallery">
					<?php foreach($codes as $code): ?>
					<div class="dmcblue-video-showcase-gallery-item" data-id="<?php echo $code; ?>" style="flex: <?php echo count($codes); ?>">
						<img src="https://i.ytimg.com/vi/<?php echo $code; ?>/hqdefault.jpg" />
					</div>
					<?php endforeach; ?>
				</div>
			</div>
        <?php
        return ob_get_clean();
    }
}

/** Enqueue Styles and Scripts **/
add_action('wp_enqueue_scripts', array('SimpleFeaturedVideoGallery', 'enqueueClientStyles' ));
add_action('wp_enqueue_scripts', array('SimpleFeaturedVideoGallery', 'enqueueClientScripts'));

add_shortcode('simple_featured_video_gallery', array('SimpleFeaturedVideoGallery', 'shortCodeDan'));
