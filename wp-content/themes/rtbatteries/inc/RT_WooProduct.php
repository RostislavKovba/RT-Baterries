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
//        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
//        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//
//        add_action('woocommerce_single_variation', [$this, 'custom_variation_price'], 19);
//
//        add_action('woocommerce_before_single_product_summary', function() {echo '<div class="shop-product-inner">';}, 5);
//
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

    public function custom_price_wrap() {
        global $product;
        if( $product->is_in_stock() ) return;
        echo '<div class="shop-product_price ' . $product->get_stock_status() . '">';
    }

    public function custom_price_wrap_end() {
        global $product;
        if( $product->is_in_stock() ) return;
        echo '</div><!-- .shop-product_price -->';
    }

    public function custom_price_variations_wrap() {
        global $product;
        if ( !$this::is_product_flower($product) && $product->get_type() != 'pw-gift-card' ) return;
        if ( !$product->is_in_stock() ) return;

        echo '<div class="shop-product_price-variations">';
    }
    public function custom_price_variations_wrap_end() {
        global $product;
        if ( !$this::is_product_flower($product) && $product->get_type() != 'pw-gift-card' ) return;
        if ( !$product->is_in_stock() ) return;
        echo '</div><!-- .shop-product_price-variations -->';
    }

    public function custom_price_message( $price, $product ) {
        if ($this::is_product_flower($product)) {
            if ($product->get_type() == 'simple') {
                $price .= ' / ' . __('1 piece');
            }
        }
        return $price;
    }

    public function get_the_variation_price_html( $product, $name, $term_slug ){
        foreach ( $product->get_available_variations() as $variation ){
            if($variation['attributes'][$name] == $term_slug && $term_slug != 'custom-price'){
//                debug($variation);
//                return strip_tags( get_woocommerce_currency_symbol() . $variation['display_price'] );
                return strip_tags($variation['price_html']);
            }
        }
    }
    public function custom_variations($html, $args) {
        $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), [
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => __('Choose an option', 'woocommerce'),
        ]);

        /** @var WC_Product_Variable $product */
        $options          = $args['options'];
        $product          = $args['product'];
        $attribute        = $args['attribute'];
        $name             = $args['name'] ?: 'attribute_'.sanitize_title($attribute);
        $id               = $args['id'] ?: sanitize_title($attribute);
        $class            = $args['class'];
        $show_option_none = (bool)$args['show_option_none'];
        // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.
        $show_option_none_text = $args['show_option_none'] ?: __('Choose an option', 'woocommerce');

        // Get selected value.
        if($attribute && $product instanceof WC_Product && $args['selected'] === false) {
            $selected_key     = 'attribute_'.sanitize_title($attribute);
            $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key]))
                : $product->get_variation_default_attribute($attribute); // WPCS: input var ok, CSRF ok, sanitization ok.
        }

        if(empty($options) && ! empty($product) && ! empty($attribute)) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[$attribute];
        }

        $radios = '<div class="custom-wc-variations">';

        if( ! empty($options)) {
            if($product && taxonomy_exists($attribute)) {
                $terms = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);

                foreach ($terms as $term) {
                    if(in_array($term->slug, $options, true)) {
                        $price_html = $this->get_the_variation_price_html( $product, $name, $term->slug );

                        $radios .= '<span class="custom-checkbox-wide">';
                        $radios .= '<input type="radio" name="custom_'.esc_attr($name).'" data-value="'.esc_attr($term->slug).'" id="'
                            .esc_attr($name).'_'.esc_attr($term->slug).'" data-variation-name="'.esc_attr($name).'" '
                            .checked(sanitize_title($args['selected']), $term->slug, false).' data-role="variation">';
                        $radios .= '<label for="'.esc_attr($name).'_'.esc_attr($term->slug).'">';
                        $radios .= esc_html(apply_filters('woocommerce_variation_option_name', $term->name) . ' ' . $price_html);
                        $radios .= '</label>';
                        $radios .= '</span>';

                    }
                }
            } else {
                foreach ($options as $option) {
                    $checked = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'],
                        sanitize_title($option), false) : checked($args['selected'], $option, false);
                    $radios .= '<span class="custom-checkbox-wide">';
                    $radios  .= '<input type="radio" name="custom_'.esc_attr($name).'" data-value="'.esc_attr($option).'" id="'
                        .esc_attr($name).'_'.esc_attr($option).'" data-variation-name="'.esc_attr($name).'" '.$checked.'>';
                    $radios  .= '<label for="'.esc_attr($name).'_'.esc_attr($option).'">';
                    $radios  .= esc_html(apply_filters('woocommerce_variation_option_name', $option));
                    $radios  .= '</label>';
                    $radios  .= '</span>';
                }
            }
        }

        $radios .= '</div>';

        return $html.$radios;

    }

    public function custom_quantity_label() {
        if( !is_single() ) return;
        echo __('Custom number', 'woocommerce');
    }

    public function custom_quantity_options() {
        global $product;
        if ( !$this::is_product_flower($product) ) return;
        if ( !$product->is_in_stock() ) return;
        if ( $product->get_type() == 'variable' ) return;

        $product_fields = get_fields($product->get_id());
        $min = getFieldValue($product_fields, 'min_count');
        ?>
        <div class="price-variations">
            <span class="price-variations_label"><?php _e('Number of flowers'); ?></span>
            <span class="custom-checkbox-wide">
            <input type="radio" name="custom_quantity"  value="10" id="10" data-role="custom-number" checked>
            <label for="10">10</label>
        </span>
            <span class="custom-checkbox-wide">
            <input type="radio" name="custom_quantity" value="15" id="15" data-role="custom-number">
            <label for="15">15</label>
        </span>
            <span class="custom-checkbox-wide">
            <input type="radio" name="custom_quantity" value="20" id="20" data-role="custom-number">
            <label for="20">20</label>
        </span>
            <span class="custom-checkbox-wide">
            <input type="radio" name="custom_quantity" data-value="custom-number" value="<?php echo $min; ?>" id="custom-number" data-role="custom-number">
            <label for="custom-number"><?php _e('Custom number', 'woocommerce') ?></label>
        </span>
        </div>
        <?php
    }

    public function custom_variation_price() {
        $product_fields = get_fields();
        $min_count = getFieldValue($product_fields,'min_count');
        ?>
        <div class="shop-product_price-custom" id="custom-price">
            <label class="">
                <?php _e('Custom price'); ?>
                <input type="number"
                       name="custom_price"
                       min="<?php echo $min_count; ?>"
                       value="<?php echo $min_count; ?>"
                       placeholder="<?php echo __('Insert price requested with minimum ', 'woocommerce') . $min_count; ?>">
            </label>
        </div>
        <?php
    }

    public function custom_additional_products() {
        global $product;
        global $global_options;
        if ( !$this::is_product_flower($product) ) return;
        if ( !$product->is_in_stock() ) return;

        $additional_category = getFieldValue($global_options, 'product_category_additional');
        $additional_category = get_term( $additional_category, 'product_cat');

        $additions = new WP_Query([
            'type'           => 'product',
            'product_cat'    => $additional_category->slug,
            'orderby'        => 'menu_order',
            'posts_per_page' => -1,
            'meta_query'     => [
                [
                    'key'   => '_stock_status',
                    'value' => 'instock'
                ]
            ]
        ])
        ?>

        <div class="shop-product_additions">
            <h3 class="additions-title"><?php _e('Pair with'); ?></h3>
            <div class="additions-list">
                <div class="additions-list-item">
                    <label>
                        <input type="radio" form="product-form" name="addition" value="0" checked>
                        <div class="additions-list-item_product">
                            <div class="additions-list-item_image">
                                <img src="<?php echo get_template_directory_uri(). '/template-parts/images/vase-empty.png' ?>" alt="vase-empty">
                            </div>

                        </div>
                        <div class="checkmark"></div>
                    </label>
                    <h4><?php _e('No vase', 'woocommerce'); ?></h4>
                </div>

                <?php while($additions->have_posts()) : $additions->the_post(); global $product;?>
                    <div class="additions-list-item">
                        <label>
                            <input type="radio" form="product-form" name="addition" value="<?php the_ID(); ?>">
                            <div class="additions-list-item_product">
                                <div class="additions-list-item_image">
                                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
                                </div>
                            </div>
                            <div class="checkmark"></div>
                        </label>
                        <a href="<?php the_permalink(); ?>" target="_blank">
                            <h4><?php the_title(); ?></h4>
                            <?php echo $product->get_price_html(); ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <?php
        wp_reset_postdata();
    }

    public function custom_post_card() {
        global $product;
        if ( !$this::is_product_flower($product) ) return;
        if ( !$product->is_in_stock() ) return;
        ?>
        <div class="shop-product_postcard">
            <label class="postcard-checkbox custom-checkbox" data-role="postcard-open">
                <?php _e('Add postcard'); ?>
                <input type="checkbox" name="postcard">
                <span class="checkmark"></span>
            </label>

            <label class="postcard-text">
                <?php _e('Add warm words'); ?>
                <textarea name="postcard_text" form="product-form" placeholder="<?php _e('INSERT WORDS HERE'); ?>" rows="5" maxlength="30"></textarea>
                <span class="char-limit">30/0</span>
            </label>
        </div>
        <?php
    }

    public function custom_delivery_date() {
        global $product;
        if ( !$this::is_product_flower($product) ) return;
        if( !$product->is_in_stock() ) return;
        ?>
        <div class="shop-product_delivery-date">
            <input type="text" id="datepicker" autocomplete="off" form="product-form" class="datepicker" name="delivery_date" placeholder="<?php _e('Delivery date'); ?>" value="">
            <label for="datepicker">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 3V1M14 3V5M14 3H6M14 3H17C17.5304 3 18.0391 3.21071 18.4142 3.58579C18.7893 3.96086 19 4.46957 19 5V9M6 3H3C2.46957 3 1.96086 3.21071 1.58579 3.58579C1.21071 3.96086 1 4.46957 1 5V9M6 3V1M6 3V5M1 9V18C1 18.5304 1.21071 19.0391 1.58579 19.4142C1.96086 19.7893 2.46957 20 3 20H17C17.5304 20 18.0391 19.7893 18.4142 19.4142C18.7893 19.0391 19 18.5304 19 18V9M1 9H19" stroke="black" stroke-linecap="square" stroke-linejoin="round"/>
            </svg>
            </label>
        </div>
        <?php
    }

    public function custom_single_add_to_cart_button() {
        global $product;
        ?>
        <div class="shop-product_add-to-cart">
            <button class="shop-product_add-to-cart-btn btn-primary" data-role="js-add-to-cart" <?php if(!$product->is_in_stock()) echo 'disabled'; ?>>
                <?php echo '+ ' . __('Add to cart', 'woocommerce'); ?>
            </button>
        </div>
        <?php
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

    /**
     * Add to cart checked additional product
     */
    public function addition_add_to_cart() {
        $product_id = absint($_POST['product_id']);

        if(WC()->cart->add_to_cart($product_id, 1, 0, [], ['delivery_date' => $_POST['delivery_date']])) {
            WC_AJAX :: get_refreshed_fragments();
        } else {
            $data = array(
                'error' => true,
                'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
            echo wp_send_json($data);
        }

        die();
    }

    public static function is_product_flower($product) {
        global $global_options;
        $flowers_category = getFieldValue($global_options, 'product_category_with_additional');
        $flowers_category = get_term( $flowers_category, 'product_cat');
        return has_term( $flowers_category->slug, 'product_cat', $product->get_id() );
    }

    public static function is_product_has_gallery($product) {
        $gallery_image_ids = $product->get_gallery_image_ids();

        return ( !empty($gallery_image_ids) );
    }
}