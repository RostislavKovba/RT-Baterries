<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id  = $product->get_image_id();
$attachment_ids     = $product->get_gallery_image_ids();
?>

<div class="column main-product-slider">
	<div class="swiper product-slider-preview">
        <div class="swiper-wrapper">

            <?php foreach ($attachment_ids as $attachment_id) : ?>

                <div class="swiper-slide">
                    <?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
                </div>

            <?php endforeach; ?>

	    </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
	</div>

    <div thumbsSlider="" class="swiper product-slider-mini">
        <div class="swiper-wrapper">
            <?php foreach ($attachment_ids as $attachment_id) : ?>

                <div class="swiper-slide">
                    <?php echo wp_get_attachment_image($attachment_id, 'thumbnail', true); ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
