<?php

class RT_WooCategory
{
    public function __construct() {
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//        remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
//        remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
//

//        add_action('woocommerce_before_shop_loop', [$this, 'custom_catalog_filtering'], 15);
//        add_action('woocommerce_after_main_content', [$this, 'custom_load_more'], 5);
//
//        add_filter( 'single_product_archive_thumbnail_size', function(){return 300; }, 10 );
//        add_filter( 'woocommerce_product_add_to_cart_text', function (){return __('View', 'woocommerce');}, 10 );
//        add_filter( 'woocommerce_product_add_to_cart_url', function($url, $product) {return $product->get_permalink();}, 10, 2 );
//
//        add_action('woocommerce_before_shop_loop_item_title', [$this, 'out_of_stock_flash'], 5);
//        add_action('woocommerce_before_shop_loop_item_title', function() {echo '<div class="pruduct-image">';}, 9);
//        add_action('woocommerce_before_shop_loop_item_title', [$this, 'product_second_image'], 11);
//        add_action('woocommerce_before_shop_loop_item_title', function() {echo '</div>';}, 12);
//
//        add_action('woocommerce_shop_loop_item_title', ['custom_specifications'], 15);
//
//        add_action( 'woocommerce_product_query', [$this, 'custom_sale_category'] );
////        add_action( 'woocommerce_product_query', [$this, 'custom_archive_category'] );
//
//        /**
//         * Content product cat
//         */
//        add_action('woocommerce_before_subcategory_title', function() {echo '<div class="pruduct-image">';}, 9);
//        add_action('woocommerce_before_subcategory_title', [$this, 'category_images'], 10 );
//        add_action('woocommerce_before_subcategory_title', function() {echo '</div>';}, 12);
//
//        add_filter('woocommerce_subcategory_count_html', '__return_false');
//
//        add_filter('get_terms', [$this, 'hide_categories_links'], 10, 2);


    }



}