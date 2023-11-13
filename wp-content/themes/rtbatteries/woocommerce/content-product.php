<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
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