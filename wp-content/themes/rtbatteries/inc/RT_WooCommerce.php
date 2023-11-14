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
        add_filter( 'body_class', [$this, 'woocommerce_active_body_class'] );
        add_action( 'after_setup_theme', [$this, 'woocommerce_setup'] );

        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        // Wrappers
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
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
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
        $args['home'] = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M4.43117 2.54138L3.75154 1.80783L4.43117 2.54138ZM6.30653 1.12003L6.60324 2.075L6.30653 1.12003ZM9.56882 2.54138L8.88919 3.27493L9.56882 2.54138ZM7.69347 1.12003L7.39676 2.075L7.69347 1.12003ZM2.31042 12.2454L1.84592 13.1309H1.84592L2.31042 12.2454ZM1.26158 11.1656L0.365356 11.6092L1.26158 11.1656ZM12.7384 11.1656L13.6346 11.6092L12.7384 11.1656ZM11.6896 12.2454L12.1541 13.1309L11.6896 12.2454ZM12.9246 6.2061L13.8948 5.96404L12.9246 6.2061ZM11.7288 4.54261L12.4085 3.80906L11.7288 4.54261ZM12.5988 5.45312L13.4389 4.91073L12.5988 5.45312ZM1.07544 6.2061L0.10518 5.96404L1.07544 6.2061ZM2.27118 4.54261L1.59154 3.80906L2.27118 4.54261ZM1.4012 5.45312L0.561074 4.91073H0.561074L1.4012 5.45312ZM7.88823 8.06595L7.62941 9.03188L7.88823 8.06595ZM8.94889 9.12661L9.91481 8.86779V8.86779L8.94889 9.12661ZM6.11177 8.06595L5.85295 7.10003L6.11177 8.06595ZM5.05111 9.12661L4.08519 8.86779H4.08519L5.05111 9.12661ZM12 7.48089V8.5616H14V7.48089H12ZM9.16 11.5146H4.84V13.5146H9.16V11.5146ZM2 8.5616V7.48089H0V8.5616H2ZM2.95081 5.27616L5.11081 3.27494L3.75154 1.80783L1.59154 3.80906L2.95081 5.27616ZM8.88919 3.27493L11.0492 5.27616L12.4085 3.80906L10.2485 1.80783L8.88919 3.27493ZM5.11081 3.27494C5.57632 2.84364 5.88375 2.55978 6.13707 2.35946C6.3811 2.16649 6.51188 2.10339 6.60324 2.075L6.00982 0.165067C5.58775 0.296204 5.23484 0.523161 4.89653 0.790683C4.56753 1.05085 4.19399 1.3979 3.75154 1.80783L5.11081 3.27494ZM10.2485 1.80783C9.80601 1.3979 9.43247 1.05085 9.10347 0.790682C8.76516 0.52316 8.41225 0.296204 7.99018 0.165067L7.39676 2.075C7.48812 2.10339 7.6189 2.16649 7.86293 2.35946C8.11625 2.55978 8.42368 2.84364 8.88919 3.27493L10.2485 1.80783ZM6.60324 2.075C6.86223 1.99453 7.13777 1.99453 7.39676 2.075L7.99018 0.165067C7.34469 -0.0354911 6.65531 -0.0354911 6.00982 0.165067L6.60324 2.075ZM4.84 11.5146C4.15096 11.5146 3.69607 11.5138 3.3475 11.4845C3.01148 11.4562 2.86463 11.4068 2.77493 11.3598L1.84592 13.1309C2.26961 13.3532 2.71548 13.4384 3.17987 13.4775C3.6317 13.5155 4.18492 13.5146 4.84 13.5146V11.5146ZM0 8.5616C0 9.23742 -0.00073421 9.80271 0.0358328 10.2634C0.0732608 10.735 0.154444 11.1831 0.365356 11.6092L2.15781 10.7221C2.10714 10.6197 2.05753 10.4576 2.02956 10.1052C2.00073 9.74196 2 9.26948 2 8.5616H0ZM2.77493 11.3598C2.51372 11.2228 2.29599 11.0012 2.15781 10.7221L0.365356 11.6092C0.687369 12.2598 1.20395 12.7942 1.84592 13.1309L2.77493 11.3598ZM12 8.5616C12 9.26948 11.9993 9.74196 11.9704 10.1052C11.9425 10.4576 11.8929 10.6197 11.8422 10.7221L13.6346 11.6092C13.8456 11.1831 13.9267 10.735 13.9642 10.2634C14.0007 9.80271 14 9.23742 14 8.5616H12ZM9.16 13.5146C9.81508 13.5146 10.3683 13.5155 10.8201 13.4775C11.2845 13.4384 11.7304 13.3532 12.1541 13.1309L11.2251 11.3598C11.1354 11.4068 10.9885 11.4562 10.6525 11.4845C10.3039 11.5138 9.84904 11.5146 9.16 11.5146V13.5146ZM11.8422 10.7221C11.704 11.0012 11.4863 11.2228 11.2251 11.3598L12.1541 13.1309C12.796 12.7942 13.3126 12.2598 13.6346 11.6092L11.8422 10.7221ZM14 7.48089C14 6.88263 14.007 6.41348 13.8948 5.96404L11.9543 6.44816C11.993 6.60349 12 6.78261 12 7.48089H14ZM11.0492 5.27616C11.5543 5.74415 11.6749 5.86573 11.7587 5.99552L13.4389 4.91073C13.187 4.5205 12.8395 4.20841 12.4085 3.80906L11.0492 5.27616ZM13.8948 5.96404C13.8016 5.59022 13.6477 5.23411 13.4389 4.91073L11.7587 5.99552C11.8475 6.13303 11.9138 6.28598 11.9543 6.44816L13.8948 5.96404ZM2 7.48089C2 6.78261 2.00695 6.60349 2.0457 6.44816L0.10518 5.96404C-0.00695002 6.41348 0 6.88263 0 7.48089H2ZM1.59154 3.80906C1.16051 4.20841 0.813012 4.5205 0.561074 4.91073L2.24132 5.99552C2.32512 5.86573 2.44569 5.74415 2.95081 5.27616L1.59154 3.80906ZM2.0457 6.44816C2.08616 6.28598 2.15254 6.13303 2.24132 5.99552L0.561074 4.91073C0.352294 5.23411 0.198442 5.59022 0.10518 5.96404L2.0457 6.44816ZM8 10.0148V12.5148H10V10.0148H8ZM6 12.5148V10.0148H4V12.5148H6ZM7 9.01484C7.24156 9.01484 7.38937 9.01508 7.50139 9.02019C7.60805 9.02506 7.63315 9.03288 7.62941 9.03188L8.14705 7.10003C7.79708 7.00625 7.4006 7.01484 7 7.01484V9.01484ZM10 10.0148C10 9.61424 10.0086 9.21777 9.91481 8.86779L7.98296 9.38543C7.98196 9.38169 7.98979 9.40679 7.99465 9.51345C7.99976 9.62547 8 9.77328 8 10.0148H10ZM7.62941 9.03188C7.80196 9.07811 7.93673 9.21289 7.98296 9.38543L9.91481 8.86779C9.68365 8.00506 9.00978 7.33119 8.14705 7.10003L7.62941 9.03188ZM7 7.01484C6.5994 7.01484 6.20292 7.00625 5.85295 7.10003L6.37059 9.03188C6.36685 9.03288 6.39195 9.02506 6.49861 9.02019C6.61063 9.01508 6.75844 9.01484 7 9.01484V7.01484ZM6 10.0148C6 9.77328 6.00024 9.62547 6.00535 9.51345C6.01021 9.40679 6.01804 9.38169 6.01704 9.38543L4.08519 8.86779C3.99141 9.21777 4 9.61424 4 10.0148H6ZM5.85295 7.10003C4.99022 7.33119 4.31635 8.00506 4.08519 8.86779L6.01704 9.38543C6.06327 9.21289 6.19804 9.07811 6.37059 9.03188L5.85295 7.10003Z" fill="#333333"/>
                    </svg>';
        $args['wrap_after'] = '</ul>';

        return $args;
    }
}