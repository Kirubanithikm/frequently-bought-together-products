<?php
/**
 * Frequently bought together products for woocommerce
 *
 * @package           frequently-bought-together-products-woocommerce
 * @author            Kirubanithi G <kirubanithikm@gmail.com>
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Frequently Bought Together Products for WooCommerce
 * Plugin URI:        http://wordpress.org/plugins/hello-wordpress/
 * Description:       Show frequently bought together products in your product page
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Kirubanithi G
 * Author URI:        http://example.org/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {exit;}

/**
 * Define plugin path
 */
if (!defined('FBTP_PLUGIN_PATH')) {
    define('FBTP_PLUGIN_PATH', plugin_dir_path(__FILE__));
}

if (file_exists(__DIR__. '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
} else {
    wp_die('Frequently bought together products is unable to find the autoload file.');
}

// To init the hooks
if (class_exists('FBTP\App\Route')) {
    new FBTP\App\Route();
} else {
    wp_die('Frequently bought together products plugin for WooCommerce is unable to find the Route class.');
}