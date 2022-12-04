<?php
/**
 * Frequently bought together products for woocommerce
 *
 * @package   frequently-bought-together-products-woocommerce
 * @author    Kirubanithi G <kirubanithikm@gmail.com>
 * @license   GPL-3.0-or-later
 */

namespace FBTP\App;
if (!defined('ABSPATH')) {exit;}

class Route
{

    /**
     * init the hooks and classes
     */
    function __construct()
    {
        $admin = new Controllers\Admin\Admin();
        $product = new Controllers\Frontend\Product();
        $function = new Helpers\Functions();

        if(is_admin()){
            add_action('save_post', array($admin,'savePost'));
            add_filter('woocommerce_product_data_panels',array($admin,'addPanel'));
            add_action('woocommerce_product_data_tabs',array($admin,'adminProductTab'));
            add_action( 'admin_notices', array($function,'woocommerceDeactivateError'));
        }

        add_action('wp',array($product,'addCart'));
        add_action('woocommerce_after_single_product',array($product,'productView'));
    }
}