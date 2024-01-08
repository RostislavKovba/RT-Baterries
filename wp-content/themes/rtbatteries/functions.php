<?php
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );

require THEME_DIR . '/inc/RT_Batteries.php';

// Custom template tags for this theme.
require THEME_DIR . '/inc/template-tags.php';

// Register strings for translations.
require THEME_DIR . '/inc/custom-translations.php';

// Customizer additions.
require THEME_DIR . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require THEME_DIR . '/inc/jetpack.php';
}

// Init theme
new RT_Batteries();

function debug($data) {
	echo '<pre class="debug">';
//        var_dump($data);
	print_r($data);
	echo '</pre>';
}

function wt_mime_types($mime_types) {
    $mime_types['webp'] = 'image/webp'; //Adding webp extension
    return $mime_types;
}
add_filter('upload_mimes', 'wt_mime_types', 1, 1);
