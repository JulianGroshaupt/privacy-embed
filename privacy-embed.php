<?php

/**
 * Plugin Name:       Privacy Embed
 * Plugin URI:        https://julian-groshaupt.de/projekte/wordpress/privacy-embed
 * Description:       Providing shortcodes to privacy-friendly embed external elements (like YouTube videos).
 * Version:           1.0.1
 * Requires at least: 5.7 
 * Requires PHP:      5.1.2
 * Author:            Julian Groshaupt
 * Author URI:        https://julian-groshaupt.de/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text-Domain:       privacy-embed
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

// require settings
require_once('settings.php');

// require functions
require_once('functions/privacy_embed__does_file_exists.php');
require_once('functions/privacy_embed__add_jpg_to_wordpress_media.php');

// require shortcodes
require_once('shortcodes/youtube.php');
require_once('shortcodes/spotify.php');

// require wpbakery files
if (defined('WPB_VC_VERSION')) {
  require_once('wpbakery/youtube.php');
  require_once('wpbakery/spotify.php');
}

// load jquery
wp_enqueue_script('jquery');

// load javascript
$js_file = plugins_url('public/js/script.js', __FILE__);
wp_enqueue_script('privacy-embed--script', $js_file);

// load css
$css_file = plugins_url('public/css/style.css', __FILE__);
wp_enqueue_style('privacy-embed--style', $css_file);
