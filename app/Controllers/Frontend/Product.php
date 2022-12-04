<?php
/**
 * Frequently bought together products for woocommerce
 *
 * @package   frequently-bought-together-products-woocommerce
 * @author    Kirubanithi G <kirubanithikm@gmail.com>
 * @license   GPL-3.0-or-later
 */

namespace FBTP\App\Controllers\Frontend;
use FBTP\App\Helpers\Functions;

if (!defined('ABSPATH')) {exit;}

class Product
{

    /**
     * Frequently bought together product(s) are add to the cart
     * @hooked wp
     * @return void
     * @throws \Exception
     */
    public static function addCart()
    {
        if (isset($_POST['frequent_products_submit']) && !is_admin()) {
            $value = $_POST['product_id'];
            $frequent_pids = get_post_meta($value, '_fbtp_data', true);
            foreach ($frequent_pids as $frequent_pid) {
                WC()->cart->add_to_cart($frequent_pid);
            }

            $url = get_permalink($value);
            wp_safe_redirect($url);
            exit;
        }
    }

    /**
     * Show frequently bought together product(s) in product view page
     * @hooked woocommerce_after_single_product
     * @return void
     */
    function productView()
    {
        $data = [];
        Functions::view('Frontend/Product', $data, true);
    }
}