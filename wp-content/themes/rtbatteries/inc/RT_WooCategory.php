<?php

class RT_WooCategory
{
    public function __construct() {
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//        remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
//        remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

//        add_action('woocommerce_before_shop_loop', [$this, 'custom_catalog_filtering'], 15);
//        add_action('woocommerce_after_main_content', [$this, 'custom_load_more'], 5);

//        add_filter( 'single_product_archive_thumbnail_size', function(){return 300; }, 10 );
//        add_filter( 'woocommerce_product_add_to_cart_text', function (){return __('View', 'woocommerce');}, 10 );
//
        add_action('woocommerce_before_shop_loop', function() {echo '<div class="container d-flex">';}, 40);
        add_action('woocommerce_before_shop_loop', [$this, 'shop_sidebar'], 50);

        add_action('woocommerce_before_shop_loop_item', [$this, 'wishlist_sign'], 5);

//        add_action('woocommerce_before_shop_loop_item_title', [$this, 'out_of_stock_flash'], 5);
//        add_action('woocommerce_before_shop_loop_item_title', function() {echo '<div class="pruduct-image">';}, 9);
//        add_action('woocommerce_before_shop_loop_item_title', [$this, 'product_second_image'], 11);
//        add_action('woocommerce_before_shop_loop_item_title', function() {echo '</div>';}, 12);
        add_action('woocommerce_after_shop_loop_item_title', [$this, 'product_sku'], 4);

//
//        add_action('woocommerce_shop_loop_item_title', ['custom_specifications'], 15);
//
        add_action('woocommerce_after_main_content', function() {echo '</div>';}, 10);
    }

    public function wishlist_sign() {
        ?>
        <svg class="wish" width="22" height="18" viewBox="0 0 22 18" fill="none">
            <path d="M9.62607 16.4599L10.1941 15.8945L9.62607 16.4599ZM2.89475 9.69683L2.32669 10.2622L2.89475 9.69683ZM12.4334 16.4599L13.0015 17.0253L12.4334 16.4599ZM10.0536 2.50428L10.6216 1.93889V1.93889L10.0536 2.50428ZM19.1648 9.69683L18.5967 9.13144V9.13144L19.1648 9.69683ZM12.006 2.50428L12.574 3.06967V3.06967L12.006 2.50428ZM11.0298 3.48508L10.4617 4.05047C10.6121 4.20159 10.8165 4.28655 11.0298 4.28655C11.243 4.28655 11.4474 4.20159 11.5978 4.05047L11.0298 3.48508ZM10.1941 15.8945L3.4628 9.13144L2.32669 10.2622L9.05801 17.0253L10.1941 15.8945ZM11.8654 15.8945C11.4034 16.3586 10.6561 16.3586 10.1941 15.8945L9.05801 17.0253C10.1465 18.1189 11.913 18.1189 13.0015 17.0253L11.8654 15.8945ZM3.4628 3.06967C5.12636 1.39827 7.82194 1.39827 9.4855 3.06967L10.6216 1.93889C8.33147 -0.362058 4.61684 -0.362058 2.32669 1.93888L3.4628 3.06967ZM2.32669 1.93888C0.0386213 4.23774 0.0386217 7.96337 2.32669 10.2622L3.4628 9.13144C1.79717 7.45796 1.79717 4.74315 3.4628 3.06967L2.32669 1.93888ZM18.5967 9.13144L11.8654 15.8945L13.0015 17.0253L19.7328 10.2622L18.5967 9.13144ZM18.5967 3.06967C20.2623 4.74315 20.2623 7.45796 18.5967 9.13144L19.7328 10.2622C22.0209 7.96337 22.0209 4.23774 19.7328 1.93888L18.5967 3.06967ZM12.574 3.06967C14.2376 1.39827 16.9332 1.39827 18.5967 3.06967L19.7328 1.93888C17.4427 -0.362058 13.728 -0.362057 11.4379 1.93889L12.574 3.06967ZM11.5978 4.05047L12.574 3.06967L11.4379 1.93889L10.4617 2.91969L11.5978 4.05047ZM9.4855 3.06967L10.4617 4.05047L11.5978 2.91969L10.6216 1.93889L9.4855 3.06967Z" fill="#333333" fill-opacity="0.6"></path>
        </svg>
        <?php
    }

    public function product_sku() {
        global $product;
        if (!$product->get_sku()) return;
        ?>
        <p class="product-series">
            <?php echo pll__('Series') . ': ' . $product->get_sku(); ?>
        </p>
        <?php
    }

    public function shop_sidebar() {
        dynamic_sidebar('sidebar-shop');
    }
}
