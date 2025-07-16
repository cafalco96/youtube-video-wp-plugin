<?php
/**
 * Youtube Videos Gallery Plugin
 *
 * @package     PluginPackage
 * @author      Carlos Falconi
 * @copyright   2025 Carlos Falconi
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Youtube Videos Gallery
 * Plugin URI:  https://cafalco96.github.io/
 * Description: Brings a gallery of YouTube videos to your WordPress site.
 * Version:     1.0.0
 * Author:      Carlos Falconi
 * Author URI:  https://cafalco96.github.io/
 * Text Domain: youtube-video-gallery
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

 // Url validation 
 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
 }

 //Load scripts
 require_once(plugin_dir_path(__FILE__) . 'includes/youtube-videos-gallery-scripts.php');

 //Load shortcodes
  require_once(plugin_dir_path(__FILE__) . 'includes/youtube-videos-gallery-shortcode.php');

  //Load admin scripts
  if ( is_admin() ) {
    require_once(plugin_dir_path(__FILE__) . 'includes/youtube-videos-gallery-cpt.php');
    require_once(plugin_dir_path(__FILE__) . 'includes/youtube-videos-gallery-fields.php');
  }