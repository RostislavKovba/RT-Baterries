<?php
/**
 * RomeTech-Batteries theme
 */

class RT_Batteries
{
	private string $version = '1.0.0';

	public function __construct() {
		$this->defines();
		$this->init_post_types();

		add_action( 'after_setup_theme', [$this, 'setup'] );
		add_action( 'after_setup_theme', [$this, 'content_width'], 0 );
		add_action( 'widgets_init', [$this, 'widgets_init'] );
		add_action( 'wp_enqueue_scripts', [$this, 'scripts'] );
	}

	public function setup() {
		if ( ! defined( '_S_VERSION' ) ) {
			// Replace the version number of the theme on each release.
			define( '_S_VERSION', '1.0.0' );
		}

		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on rtbatteries, use a find and replace
			* to change 'rtbatteries' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'rtbatteries', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rtbatteries' ),
			)
		);

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
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

		// Set up the WordPress core custom background feature.
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	public function defines() {
		if (defined('_S_VERSION')) return;
		define( '_S_VERSION', $this->version );
	}

	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'rtbatteries_content_width', 640 );
	}

	public function widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'rtbatteries' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'rtbatteries' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	public function scripts() {
		wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style( 'rtbatteries-style', THEME_URL . '/assets/css/app.css', array(), _S_VERSION );

		wp_enqueue_script('jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), _S_VERSION, true);
		wp_enqueue_script( 'rtbatteries-script', THEME_URL . '/assets/js/all.js', array('jquery-script'), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function init_post_types() {
		require THEME_DIR . '/inc/RT_Post_Type.php';
	}
}