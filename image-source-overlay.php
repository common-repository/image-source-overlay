<?php
/**
 * Plugin Name: Image Source Overlay
 * Plugin URI:
 * Text Domain: image-source-overlay
 * Description: Adds overlay with image sources.
 * Version: 1.1.3
 * Author: Eduard Stehlík
 * Author URI: http://stehled.com
 * License: GPLv3
 */

define('IMAGE_SO__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('IMAGE_SO__BASE', plugin_basename(__FILE__));
define('IMAGE_SO__PLUGIN_URL', plugins_url('',__FILE__));
define('IMAGE_SO__VERSION_NUMBER', '1.1.1');

register_activation_hook( __FILE__, array('Image_SO\Inc\Core\Image_SO_Activator', 'activate'));

require_once(IMAGE_SO__PLUGIN_DIR . 'inc/core/class.image_so_activator.php');
require_once(IMAGE_SO__PLUGIN_DIR . 'inc/core/class.image_so_base.php');
require_once(IMAGE_SO__PLUGIN_DIR . 'inc/core/class.image_so_init.php');
require_once(IMAGE_SO__PLUGIN_DIR . 'inc/core/class.image_so_updater.php');

if (!class_exists('Image_SO_Init', false)) {
    new \Image_SO\Inc\Core\Image_SO_Init();
}

if (is_admin() && !class_exists('Image_SO_Admin', false)) {
    require_once(IMAGE_SO__PLUGIN_DIR . 'inc/admin/class.image_so_admin.php');
    new \Image_SO\Inc\Admin\Image_SO_Admin();
}

