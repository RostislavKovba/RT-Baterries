<?php

class RT_WooCommerce {
	public function __construct() {
		if ( ! class_exists( 'WooCommerce' ) ) return;

        add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		$this->general_customize();
//		$this->pruduct_customize();
//		$this->cart_customize();
	}

	public function general_customize() {
		add_filter('woocommerce_enqueue_styles', '__return_empty_array' );
//		add_filter('wc_add_to_cart_message_html', [$this, 'custom_add_to_cart_message'], 10, 3 );

		// Quantity buttons
//		add_action('woocommerce_before_quantity_input_field', [$this, 'custom_quantity_button_minus']);
//		add_action('woocommerce_after_quantity_input_field', [$this, 'custom_quantity_button_plus']);

		// Checkout
//		remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//		add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 10 );
	}

	public function pruduct_customize() {
		require get_template_directory() . '/src/inc/class-wc-product-customize.php';
		new Product_Customize();
	}

	public function cart_customize() {
		require get_template_directory() . '/src/inc/class-wc-cart-customize.php';
		new Cart_Customize();
	}
}