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
//
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//
        add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);
//
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_price_wrap'], 9);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_price_wrap'], 9);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_price_wrap_end'], 11);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_price_variations_wrap'], 11);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_quantity_options'], 12);
//        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 13);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_price_variations_wrap_end'], 14);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_additional_products'], 15);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_post_card'], 25);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_delivery_date'], 35);
//        add_action('woocommerce_single_product_summary', function() {echo '</form>';}, 36);
//        add_action('woocommerce_single_product_summary', [$this, 'custom_single_add_to_cart_button'], 45);
//        add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70);
//
//        add_action('woocommerce_single_product_summary', function() {echo '</div><!-- .shop-product-inner -->';}, 90);
//
//
//        add_filter( 'woocommerce_product_tabs', [$this, 'custom_share_tab'] );
    }

    public function custom_out_of_stock_text($text, $product) {
        if ( !$product->is_in_stock() ) {
            $text = __('Sold out', 'woocommerce');
        }
        return $text;
    }

    public function custom_quantity_input_min($min, $product) {
        $product_fields = get_fields($product->get_id());
        $min            = getFieldValue($product_fields, 'min_count');

        return $min;
    }
    public function custom_price_class($price_class) {
        global $product;
        if( $product->is_in_stock() )
            $price_class .= ' shop-product_price ' . $product->get_stock_status();

        return $price_class;
    }


    public function custom_share_tab( $tabs ) {

        unset( $tabs['additional_information'] );

        $tabs['delivery_return_tab'] = array(
            'title' => __( 'Delivery & Return', 'woocommerce' ),
            'priority' => 40,
            'callback' => 'custom_delivery_return_tab_content'
        );
        $tabs['share_tab'] = array(
            'title' => __( 'Share', 'woocommerce' ),
            'priority' => 50,
            'callback' => 'custom_share_tab_content'
        );
        return $tabs;
    }

}