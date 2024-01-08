<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $notices ) {
	return;
}

?>

<div class="overlay message-modal woocommerce-message success opened">
    <?php foreach ( $notices as $notice ) : ?>
        <div class="overlay-content " <?php echo wc_get_notice_data_attr( $notice ); ?> role="alert">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/succ.png" alt="success" title="success">
            <p class="modal-title"><?php pll_e('Success!') ?></p>

            <p class="modal-desc">
                <?php echo wc_kses_notice( $notice['notice'] ); ?>
            </p>

            <div class="btn-primary lg bright-inversed close">
                <p><?php pll_e('Continue') ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
