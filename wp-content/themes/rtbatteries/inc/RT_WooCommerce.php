<?php

class RT_WooCommerce {
	public function __construct() {
        add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		$this->general_customize();
        $this->category_customize();
        $this->pruduct_customize();
	}

	public function general_customize() {
//		add_filter('woocommerce_enqueue_styles', '__return_empty_array' );
//		add_filter('wc_add_to_cart_message_html', [$this, 'custom_add_to_cart_message'], 10, 3 );

        // Wrappers
        add_action('woocommerce_before_main_content', function() {echo '<div class="container">';}, 5);
        add_action('woocommerce_after_main_content', function() {echo '</div><!-- .container -->';}, 15);

        // Quantity buttons
        add_action('woocommerce_before_quantity_input_field', [$this, 'custom_quantity_button_minus']);
        add_action('woocommerce_after_quantity_input_field', [$this, 'custom_quantity_button_plus']);

		// Checkout
//		remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//		add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 10 );
	}
    public function category_customize() {
        require get_template_directory() . '/inc/RT_WooCategory.php';
        new RT_WooCategory();
    }

	public function pruduct_customize() {
		require get_template_directory() . '/inc/RT_WooProduct.php';
		new RT_WooProduct();
	}

    /**
     * Quantity buttons
     */
    public function custom_quantity_button_minus() {
        echo '<input type="button" data-action="minus" class="quantity-toggle-button" value="-">';
    }

    public function custom_quantity_button_plus() {
        echo '<input type="button" data-action="plus" class="quantity-toggle-button" value="+">';
    }
}