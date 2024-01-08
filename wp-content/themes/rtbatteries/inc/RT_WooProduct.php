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

        add_action('woocommerce_before_main_content', 'woocommerce_template_single_title', 25);

        add_action('woocommerce_single_product_summary',  function() {echo '<div class="label-heading">';}, 4);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5);
        add_action('woocommerce_single_product_summary', [$this, 'custom_stock_status'], 6);
        add_action('woocommerce_single_product_summary',  function() {echo '</div>';}, 8);
        add_action('woocommerce_single_product_summary',  function() {echo '<div class="product product-item">';}, 9);

        add_action('woocommerce_single_product_summary',  function() {echo '</div>';}, 59);
        add_action('woocommerce_single_product_summary', [$this, 'custom_specifications'], 60);

        // content-product.php
        add_action('woocommerce_after_single_product_summary', [$this, 'custom_description'], 30);
        add_action('woocommerce_after_single_product_summary', [$this, 'custom_reviews'], 40);
    }

    public function custom_stock_status() {
        global $product;
        $status = $product->get_stock_status();
        echo '<p class='.$status.'>'.  pll__( $status ) .'</p>';
    }

    public function custom_specifications() {
        global $product; ?>

        <div class="specification-table">
            <p class="subtitle"><?php pll_e('Specifications') ?></p>
            <?php wc_display_product_attributes($product); ?>
        </div>

        <?php
    }

    public function custom_description() {
        ?>

        <div class="seo-text">
            <p class="title"><?php pll_e('Product Details') ?></p>
            <div class="content-wrapper">
                <div class="content editor">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="btn-primary lg ghost read-more-seo">
                <p><?php pll_e('read more') ?></p>
            </div>
        </div>

        <?php
    }

    public function custom_reviews() {
        ?>

        <div class="reviews">
            <?php comments_template(); ?>
        </div>

        <?php
    }

}
