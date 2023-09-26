<?php
/**
 * RomeTech-Batteries theme
 */

class RT_Batteries
{
	private string $domain = 'rtbatteries';

	public function __construct() {
		$this->define_constants();
		$this->options_page_init();
		$this->woocommerce_init();

		add_action( 'after_setup_theme', [$this, 'setup'] );
//		add_action( 'widgets_init', [$this, 'widgets_init'] );
		add_action( 'wp_enqueue_scripts', [$this, 'scripts_init'] );
	}

	public function setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rtbatteries, use a find and replace
		* to change 'rtbatteries' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( _S_DOMAIN, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'rtbatteries_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		register_nav_menus(
			[
				'menu-primary'  => esc_html__( 'Primary', _S_DOMAIN ),
				'menu-mobile'   => esc_html__( 'Mobile', _S_DOMAIN ),
				'menu-shop'     => esc_html__( 'Shop', _S_DOMAIN ),
				'menu-footer-1' => esc_html__( 'Footer 1', _S_DOMAIN ),
				'menu-footer-2' => esc_html__( 'Footer 2', _S_DOMAIN ),
			]
		);
	}

	public function define_constants() {
		define( '_S_DOMAIN',  $this->domain );
		define( 'ASSETS_CSS', THEME_URL.'/assets/css/' );
		define( 'ASSETS_JS',  THEME_URL.'/assets/js/' );
		define( 'ASSETS_IMG', THEME_URL.'/images/' );
	}

	public function widgets_init() {
		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', _S_DOMAIN ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', _S_DOMAIN ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]
		);
	}

	public function scripts_init() {
		wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), null );
		wp_enqueue_style( 'rtb-style', ASSETS_CSS . 'app.css', array(), null );

		wp_enqueue_script('jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
		wp_enqueue_script( 'rtb-script', ASSETS_JS . 'all.js', array('jquery-script'), null, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function options_page_init() {
		if ( !function_exists( 'acf_add_options_page' ) ) return;

		acf_add_options_page([
			'page_title' => 'Main contact info',
			'menu_title' => 'Contact info',
			'menu_slug'  => 'contact',
			'post_id'    => 'contact',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-phone',
			'redirect'   => false,
			'position'   => 29,
		]);

		acf_add_options_page([
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'post_id'    => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		]);
	}

    public function woocommerce_init() {
        if ( !class_exists( 'WooCommerce' ) ) return;

        require THEME_DIR . '/inc/RT_WooCommerce.php';
        require THEME_DIR . '/inc/woocommerce.php';

        new RT_WooCommerce();
    }
}