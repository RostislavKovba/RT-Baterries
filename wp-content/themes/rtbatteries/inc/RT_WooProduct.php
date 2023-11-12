<?php

class RT_WooProduct
{
    public function __construct() {
//        add_filter('woocommerce_dropdown_variation_attribute_options_html', [$this, 'custom_variations'], 10, 2);
//        add_filter('woocommerce_product_price_class', [$this, 'custom_price_class'], 10);
//        add_filter('woocommerce_get_availability_text', [$this, 'custom_out_of_stock_text'], 10, 2);
//
//        add_filter( 'woocommerce_quantity_input_min', [$this, 'custom_quantity_input_min'], 10, 2 );
//        add_filter( 'woocommerce_get_price_html', [$this, 'custom_price_message'], 10, 2 );
//
//        add_action('woocommerce_before_quantity_input_field', [$this, 'custom_quantity_label'], 10);
        // content-single-product.php
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


        add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);

        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5);
        add_action('woocommerce_single_product_summary', [$this, 'custom_specifications'], 60);

        add_action('woocommerce_after_single_product_summary', [$this, 'custom_description'], 30);

        // content-product.php
        add_action('woocommerce_after_single_product_summary', [$this, 'custom_description'], 30);
    }

    public function custom_specifications() {
        global $product;
        echo '<h2>'. pll__('Specifications') .'</h2>';
        wc_display_product_attributes($product);
    }

    public function custom_description() {
        echo '<h2>'. pll__('Product Details') .'</h2>';
        the_content();
    }
}