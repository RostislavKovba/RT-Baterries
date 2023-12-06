<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post" class="cart">
    <div class="wrapper-line">
        <?php
        woocommerce_quantity_input(array(
            'input_name'   => 'quantity',
            'input_value'  => '1',
            'min_value'    => '1',
            'max_value'    => $product->get_max_purchase_quantity(),
        ));
        ?>

        <span class="price">
            <?php echo $product->get_price_html(); ?>
        </span>

        <button type="submit" class="button mobile">
            <svg width="29" height="24" viewBox="0 0 29 24" fill="none">
                <path d="M6.56338 4.59375H24.9103C26.852 4.59375 28.289 6.44456 27.8524 8.38316L26.2265 15.6019C25.9104 17.0056 24.6904 18 23.2844 18H11.9848C10.5788 18 9.35886 17.0056 9.0427 15.6019L6.56338 4.59375ZM6.56338 4.59375L6.24511 3.61542C5.83412 2.35211 4.68028 1.5 3.38063 1.5H1.53101M23.531 8.1H20.231" stroke="white" stroke-width="2" stroke-linecap="round"></path>
                <path d="M12.6533 22C12.6533 23.1046 11.7751 24 10.6918 24C9.60844 24 8.73022 23.1046 8.73022 22C8.73022 20.8954 9.60844 20 10.6918 20C11.7751 20 12.6533 20.8954 12.6533 22Z" fill="white"></path>
                <path d="M25.7302 22C25.7302 23.1046 24.852 24 23.7687 24C22.6854 24 21.8071 23.1046 21.8071 22C21.8071 20.8954 22.6854 20 23.7687 20C24.852 20 25.7302 20.8954 25.7302 22Z" fill="white"></path>
            </svg>
        </button>
    </div>

    <button type="submit" class="button desktop"><?php echo esc_html( $product->add_to_cart_text() ); ?></button>
    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
</form>

