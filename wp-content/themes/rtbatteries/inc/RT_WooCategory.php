<?php

class RT_WooCategory
{
    public function __construct() {
//        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
//        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
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
//        add_action('woocommerce_shop_loop_item_title', function() {echo '<div class="pruduct-info">';}, 5);
//        add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 12 );
//        add_action('woocommerce_after_shop_loop_item_title', function() {echo '</div>';}, 15);
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
//
//        $corppix = new Corppix();
//        $corppix->ajax_front_to_backend( 'product_filter', [$this, 'product_filter']);
//        $corppix->ajax_front_to_backend( 'active_filters', [$this, 'active_filters']);
//        $corppix->ajax_front_to_backend( 'result_count', [$this, 'result_count']);
//        $corppix->ajax_front_to_backend( 'load_more', [$this, 'load_more']);
    }

    public function hide_categories_links( $terms, $taxonomies ){
        global $global_options;

        $new_terms 	= array();
        $hide_categories = getFieldValue($global_options, 'hide_categories');

        if ( in_array( 'product_cat', $taxonomies ) && !is_admin() && is_shop() ) {
            foreach ( $terms as $key => $term ) {

                if ( ! in_array( $term->term_id, $hide_categories ) ) {
                    $new_terms[] = $term;
                }
            }
            $terms = $new_terms;
        }
        return $terms;
    }

    public function custom_catalog_filtering() {
        if ( !is_archive() ) return;

        global $wp_query;
        global $global_options;

        $current_category = get_queried_object();
        $exclude_categories = getFieldValue($global_options, 'hide_categories');

        $args = [
            'taxonomy'  => 'product_cat',
            'parent'    => is_shop() ? 0 : $current_category->term_id,
            'exclude'   => is_shop() ? $exclude_categories : 0,
            'hide_empty' => true
        ];

        $filters = get_terms($args);
        ?>

        <form action="<?php echo esc_url(admin_url( 'admin-ajax.php' )); ?>" method="GET" id="js-filter" class="shop-controls js-accordion-content">
            <div class="shop-controls-wrap">
                <input type="hidden" name="paged" id="paged" value="1">
                <input type="hidden" name="current_category" value="<?php echo is_shop() ? 'shop' : $current_category->slug; ?>">

                <?php if ( $filters) : ?>

                    <div class="shop-filter">
                        <span class="shop-filter-open" data-role="filter-open"><?php _e('Product type'); ?></span>
                        <div class="shop-filter-inner panel">
                            <?php foreach ($filters as $filter) : ?>
                                <label class="shop-filter-inner_button custom-checkbox">
                                    <?php echo $filter->name; ?>
                                    <input type="checkbox" name="<?php echo $filter->slug; ?>" id="<?php echo $filter->term_id; ?>" value="<?php echo $filter->slug; ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="shop-ordering">
                    <p class="woocommerce-result-count js-result-count">
                        <?php echo $wp_query->found_posts . ' ' . __('items', 'woocommerce'); ?>
                    </p>

                    <span class="shop-ordering-open" data-role="ordering-open"><?php _e('Relevance', 'woocommerce'); ?></span>
                    <div class="shop-ordering-inner panel">
                        <label class="shop-ordering-inner_button custom-checkbox radio">
                            <?php _e('Low to High', 'woocommerce'); ?>
                            <input type="radio" name="orderby" id="price" value="price">
                            <span class="checkmark"></span>
                        </label>
                        <label class="shop-ordering-inner_button custom-checkbox radio">
                            <?php _e('High to Low', 'woocommerce'); ?>
                            <input type="radio" name="orderby" id="price-desc" value="price-desc">
                            <span class="checkmark"></span>
                        </label>
                        <label class="shop-ordering-inner_button custom-checkbox radio">
                            <?php _e('Newest to oldest', 'woocommerce'); ?>
                            <input type="radio" name="orderby" id="date" value="date">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="shop-active-filters js-active-filters">

            </div>
        </form>

        <?php
    }

    public function custom_load_more() {
        if (is_single()) return;
        ?>
        <div class="shop-load-more show">
        </div>
        <?php
    }

    public function out_of_stock_flash() {
        global $product;
        if (!$product->is_in_stock()) {
            echo '<span class="stock-flash">' . __('Sold out', 'woocommerce') . '</span>';
        }
    }


    public function product_second_image() {
        global $product;
        $gallery = $product->get_gallery_image_ids();

        if ( !$gallery ) return;

        $image_2 = wp_get_attachment_url( $gallery[0] );

        echo '<img src="'. $image_2 .'">';
    }

    public function category_images($category) {
        $images = get_fields('term_' . $category->term_id);

        $image_1 = $images['category_image_1'];
        $image_2 = $images['category_image_2'];

        if ( !$image_1 || !$image_2 ) return;

        echo '<img src="'. $image_1['url'] .'">';
        echo '<img src="'. $image_2['url'] .'">';
    }

    function custom_sale_category( $query ) {
        if ( "sale" !== $query->get( 'product_cat' ) ) return;
        $query->set( 'post_type', 'product' );
        $query->set( 'product_cat', null );
        $product_ids_on_sale = wc_get_product_ids_on_sale() ? wc_get_product_ids_on_sale() : array();
        $query->set( 'post__in', $product_ids_on_sale );
    }

    /**
     * Collecting WP_Query args
     *
     * @return array
     */
    function get_filter_args() {
        $current_category = $_GET['current_category'];

        $post_type = 'product';
        $taxonomy  = 'product_cat';
        $orderby   = explode('-', $_GET['orderby'])[0];
        $order     = explode('-', $_GET['orderby'])[1] ? : 'ASC';

        $args = [
            'post_type'		 => $post_type,
            'post_status'    => 'publish',
            'orderby'        => $orderby,
            'order'          => $order,
            'posts_per_page' => get_option( 'posts_per_page' ),
            'paged'          => $_GET['paged'],
        ];

        if ($orderby == 'price') {
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
        }

        if( $filters = get_terms( $taxonomy ) ) {
            $filter_data = [];

            foreach ( $filters as $fil ) {
                if ( isset( $_GET[ $fil->slug ] ) )
                    $filter_data[] = $fil->slug;
            }

            // fill filter data in case of it empty
            if ( empty($filter_data) ) {
                $filter_empty = true;
                $filter_data[] = $current_category;
            }

            $args['tax_query'][] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $filter_data
            ];
        }

        // Shop page
        if($current_category == 'shop' && $filter_empty) {
            unset($args['tax_query']);
        }
        // Sale category
        if ($current_category == 'sale') {
            $product_ids_on_sale = wc_get_product_ids_on_sale() ? wc_get_product_ids_on_sale() : array();
            unset($args['tax_query']);
            $args['post__in']  = $product_ids_on_sale;
        }
        // Archive category
        if ($current_category == 'archive') {
            unset($args['tax_query']);
            $args['meta_query'][] = [
                [
                    'key'     => '_stock_status',
                    'value'   => 'outofstock',
                    'compare' => 'IN'
                ]
            ];
        }

        $args['tax_query']['relation'] = 'AND';
        $args['tax_query'][] = [
            'taxonomy'  => 'product_visibility',
            'terms'     => ['exclude-from-catalog'],
            'field'     => 'name',
            'operator'  => 'NOT IN',
        ];

        return $args;
    }

    /**
     * Products filtering
     */
    function product_filter() {

        $args = $this->get_filter_args();

//        debug($args);

        query_posts($args);

        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                wc_get_template_part( 'content', 'product' );
            }
        }

        die();
    }

    /**
     * Show active filters
     */
    function active_filters() {

        $filters = get_terms( 'product_cat' );
        $is_empty_filters = true;
        $html = '';

        foreach ( $filters as $fil ) {
            if ( isset( $_GET[ $fil->slug ] ) ) {
                $html .= sprintf(
                    '<input type="checkbox" id="%1$d" value="%2$s" checked>
                <label for="%1$d" class="active-filter-item">%3$s</label>',
                    $fil->term_id,
                    $fil->slug,
                    $fil->name
                );
                $is_empty_filters = false;
            }
        }

//    if ( isset( $_GET['orderby'] ) ) {
//        $html .= sprintf(
//            '<input type="checkbox" name="orderby" id="%1$d" value="%2$s" checked>
//                <label for="%1$d" class="active-filter-item">%3$s</label>',
//            $_GET['orderby'],
//            $_GET['orderby'],
//            $_GET['orderby']
//        );
//        $is_empty_filters = false;
//    }

        if (!$is_empty_filters) {
            echo '<div class="active-filters_inner custom-checkbox-wide">';
            echo $html;
            printf(
                '<a href="%s"class="filter-clear">%s</a>',
                esc_url(get_permalink()),
                esc_html(__("Clear all"))
            );
            echo '</div>';
        }

        die();
    }

    /**
     * Show count of filtered products
     */
    function result_count() {

        $args = $this->get_filter_args();

        global $wp_query;
        query_posts($args);
        echo $wp_query->found_posts .' '. __('items', 'woocommerce');

        die();
    }

    /**
     * Show load more button
     */
    function load_more() {
        global $wp_query;
        $args = $this->get_filter_args();
        query_posts($args);

        $found_posts = $wp_query->found_posts;
        $showing_posts = $args['posts_per_page'] * $args['paged'];

        if ( $found_posts > $showing_posts ) :
            ?>

            <p class="shop-load-more_count">
                <?php printf('Showing %d of %d products', $showing_posts, $found_posts) ?>
            </p>
            <p class="shop-load-more_button">
			<span id="js-loadmore">
				<?php _e('+ View More'); ?>
			</span>
            </p>


        <?php
        endif;

        die();
    }

}