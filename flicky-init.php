<?php
/**
 * Plugin Name:       Flicky Addon - Elementor
 * Plugin URI:        https://github.com/imhossen
 * Description:       Beautful widgets for Elementor.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hossen
 * Author URI:        https://github.com/imhossen
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       flicky-addon
 */
if( ! defined ('ABSPATH') ) {
    exit;
}

/**
 * Widgets Loader
 */

require plugin_dir_path(__FILE__).'flicky-loader.php';