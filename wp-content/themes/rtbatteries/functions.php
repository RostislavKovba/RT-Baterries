<?php
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );

require THEME_DIR . '/inc/RT_Batteries.php';
// Implement the Custom Header feature.
require THEME_DIR . '/inc/custom-header.php';
// Custom template tags for this theme.
require THEME_DIR . '/inc/template-tags.php';
// Functions which enhance the theme by hooking into WordPress.
require THEME_DIR . '/inc/template-functions.php';
// Customizer additions.
require THEME_DIR . '/inc/customizer.php';
// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require THEME_DIR . '/inc/jetpack.php';
}
// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require THEME_DIR . '/inc/woocommerce.php';
}

// Init theme
new RT_Batteries();

// Post types
new RT_Post_Type(['name'=>'review']);