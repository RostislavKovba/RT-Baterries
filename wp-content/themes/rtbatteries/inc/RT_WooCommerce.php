<?php

class RT_WooCommerce {
	public function __construct() {
		$this->general_customize();
        $this->category_customize();
        $this->pruduct_customize();
	}

	public function general_customize() {
		add_filter('woocommerce_enqueue_styles', '__return_empty_array' );
//		add_filter('wc_add_to_cart_message_html', [$this, 'custom_add_to_cart_message'], 10, 3 );
        add_filter( 'body_class', [$this, 'woocommerce_active_body_class'] );
        add_action( 'after_setup_theme', [$this, 'woocommerce_setup'] );

        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

        // Wrappers
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        add_action('woocommerce_before_main_content', function() {echo '<div class="container">';}, 5);
        add_action('woocommerce_after_main_content', function() {echo '</div><!-- .container -->';}, 15);

        // Quantity buttons
        add_action('woocommerce_before_quantity_input_field', [$this, 'custom_quantity_button_minus']);
        add_action('woocommerce_after_quantity_input_field', [$this, 'custom_quantity_button_plus']);

        add_filter('woocommerce_breadcrumb_defaults', [$this, 'woocommerce_breadcrumb_custom']);

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

    public function woocommerce_setup() {
        add_theme_support(
            'woocommerce',
            array(
                'thumbnail_image_width' => 150,
                'single_image_width'    => 300,
                'product_grid'          => array(
                    'default_rows'    => 3,
                    'min_rows'        => 1,
                    'default_columns' => 4,
                    'min_columns'     => 1,
                    'max_columns'     => 6,
                ),
            )
        );
    }

    public function woocommerce_active_body_class( $classes ) {
        $classes[] = 'woocommerce-active';
        return $classes;
    }

    /**
     * Quantity buttons
     */
    public function custom_quantity_button_minus() {
        echo '<input type="button" class="quantity-toggle-button minus" value="-">';
    }

    public function custom_quantity_button_plus() {
        echo '<input type="button" class="quantity-toggle-button plus" value="+">';
    }


    public function woocommerce_breadcrumb_custom($args) {
        $args['delimiter'] = '';
        $args['wrap_before'] = '<ul class="breadcrumbs">';
        $args['before'] = '<li>';
        $args['after'] = '</li>';
        $args['home'] = 'svg added in global/breadcrumb.php';
        $args['wrap_after'] = '</ul>';

        return $args;
    }

}
