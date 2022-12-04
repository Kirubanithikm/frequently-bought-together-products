<?php
/**
 * Frequently bought together products for woocommerce
 *
 * @package   frequently-bought-together-products-woocommerce
 * @author    Kirubanithi G <kirubanithikm@gmail.com>
 * @license   GPL-3.0-or-later
 */

namespace FBTP\App\Controllers\Admin;
use FBTP\App\Helpers\Functions;

if (!defined('ABSPATH')) {exit;}

class Admin
{
    /**
     * Update or save data as array in db using meta key
     * @hooked save_post
     * @return void
     */
    function savePost()
    {
        global $post;
        if (isset($_POST['frequent_products'])) {
            $frequent_pids = $_POST['frequent_products'];
            update_post_meta($post->ID, "_fbtp_data", $frequent_pids);
        }
    }

    /**
     * Create admin product tab
     * @hooked woocommerce_product_data_tabs
     * @return array
     */
    function adminProductTab($frequent_product_tab)
    {
        $frequent_product_tab['frequent_products[]'] = array(
            'label' => __('Frequent products', 'woocommerce'),
            'target' => 'frequent-products',
            'class' => array(),
            'priority' => 45,
        );
        return $frequent_product_tab;
    }

    /**
     * Admin panel - view file
     * @hooked woocommerce_product_data_panels
     * @return void
     */
    function addPanel()
    {
        $data=[];
        Functions::view('Admin/Panels',$data,true);
    }
}