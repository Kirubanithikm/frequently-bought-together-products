<?php global $post; ?>
<?php defined('ABSPATH') or exit ?>
<br><br>
<div class="related products ct-hidden-sm ct-hidden-md">
    <?php
    global $post;
    ?>
    <br><br>
    <h4> <?php esc_html_e('Frequently Bought Together products', 'woocommerce');?> </h4>
    <?php
    $frequent_pids = get_post_meta($post->ID, '_fbtp_data', true);
    $fp_total_price = 0;
    if(isset($frequent_pids) && !empty($frequent_pids)) {
        foreach ($frequent_pids as $frequent_pid) {
            $product = wc_get_product($frequent_pid);
            echo "<br>";
            echo $product->get_name();
            echo "<br>";
            echo $product->get_image();
            $fp_total_price += $product->get_price();
            echo "<br>";
            echo "price ";
            echo $product->get_price_html();
            echo "<br>";
        }
    }
    echo "Total price ";
    echo wc_price($fp_total_price);
    echo "<br>";
    ?>
    <?php
    global $post;
    $post_id= $post ->ID;
    ?>
    <form method="post">
        <input type="hidden" name="product_id" value="<?php echo $post_id= $post ->ID; ?>">
        <input type="submit" value="Add to cart" name="frequent_products_submit" class="btn regular-button regular-main-button add2cart submit" />
    </form>
    <?php \FBTP\App\Controllers\Frontend\Product::addCart(); ?>
</div>