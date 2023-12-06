<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="catalog-page">
    <?php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );

    ?>
    <header class="woocommerce-products-header">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>
    </header>

    <?php
    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action( 'woocommerce_before_shop_loop' );
    ?>

    <div class="container d-flex">
        <div class="filter-wrapper">
            <div class="filter">
            <?php
            /**
             * Hook: woocommerce_sidebar.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action( 'woocommerce_sidebar' );
            ?>
            </div>
        </div>

        <div class="product-list">
            <?php
            if ( woocommerce_product_loop() ) {

                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content', 'product' );
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action( 'woocommerce_no_products_found' );
            }

            ?>
        </div>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>

    <section class="video-section video-section-extended extra scroll-y">
        <div class="container">
            <p class="title title_2">Build your own battery</p>
        </div>

        <div class="video-line">
            <div class="wrap">
                <div class="btn-round btn-round-secondary light">
                    <svg viewBox="0 0 38 38" fill="none">
                        <circle cx="19" cy="19" r="19" fill="#00E04F"/>
                        <path d="M27.8668 19.0005H19.0001M19.0001 19.0005H10.1334M19.0001 19.0005V27.8671M19.0001 19.0005V10.1338" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="btn-round btn-round-secondary light">
                    <svg viewBox="0 0 39 40" fill="none">
                        <circle cx="19.3514" cy="19.8123" r="19.3514" fill="white"/>
                        <path d="M10.3203 19.8125H28.3816" stroke="#00E04F" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    <div class="btn-secondary go-to-builder md next">
        <p>Go to builder</p>
        <svg viewBox="0 0 36 16" fill="none">
            <path d="M28.7346 1L35 8M35 8L28.7346 15M35 8H0.999998" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>

</div>
<?php

get_footer( 'shop' );
