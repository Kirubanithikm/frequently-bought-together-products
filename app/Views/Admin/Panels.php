<?php defined('ABSPATH') or exit ?>
<?php global $post; ?>

    <div id="frequent-products" class="panel woocommerce_options_panel hidden">
        <p class="form-field">
            <label ><?php esc_html_e('Select frequent products', 'woocommerce');?></label>
            <select class="wc-product-search"
                    multiple="multiple"
                    style="width: 50%;"
                    id="frequent_products"
                    name="frequent_products[]"
                    data-sortable="true"
                    data-placeholder="<?php esc_attr_e('Search for a product&hellip;', 'woocommerce');?>"
                    data-action="woocommerce_json_search_products"
                    data-exclude="<?php echo intval($post->ID); ?> ">

                <?php
                $frequent_pids = get_post_meta($post->ID, '_fbtp_data', true);
                if(isset($frequent_pids) && !empty($frequent_pids)) {
                    foreach ($frequent_pids as $frequent_pid) {
                        $product = wc_get_product($frequent_pid);
                        echo $product->get_name();
                        echo '<option value="' . esc_attr($frequent_pid) . '"' . selected(true, true, false) . '>' . esc_html(wp_strip_all_tags($product->get_formatted_name())) . '</option>';
                    }
                }?>
            </select>
        </p>
    </div>