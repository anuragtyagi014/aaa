<?php
/**
 * Functions and definitions
 *
 * @package Promina
 */

if(!defined('DEV_MODE')){
    define('DEV_MODE', true);
}

if ( ! function_exists( 'promina_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function promina_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'promina', get_template_directory() . '/languages' );

		// Custom Header
		add_theme_support( "custom-header" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'promina' ),
			'footer-bottom' => esc_html__( 'Footer Bottom', 'promina' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'promina_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'post-formats', array(
			'gallery',
			'video',
		) );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
        /* Add theme image size */
        add_image_size( 'promina-medium', 768, 768, true );
	}
endif;
add_action( 'after_setup_theme', 'promina_setup' );

add_action( 'cms_locations', function ( $cms_locations ) {
	return $cms_locations;
} );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
function promina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'promina_content_width', 640 );
}

add_action( 'after_setup_theme', 'promina_content_width', 0 );

/**
 * Register widget area.
 */
function promina_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'promina' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'promina' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'promina' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'promina' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'promina' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'promina' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	$hidden_sidebar_on = promina_get_opt( 'hidden_sidebar_on', false );
	if($hidden_sidebar_on) {
		register_sidebar( array(
			'name'          => esc_html__( 'Hidden Sidebar', 'promina' ),
			'id'            => 'sidebar-hidden',
			'description'   => esc_html__( 'Add widgets here.', 'promina' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	if (class_exists('ReduxFramework')) {
		$footer_top_column = promina_get_opt( 'footer_top_column', '4' );
		if ( isset( $footer_top_column ) && $footer_top_column ) {

			for ( $i = 1; $i <= $footer_top_column; $i ++ ) {
				register_sidebar( array(
					'name'          => sprintf( esc_html__( 'Footer Top %s', 'promina' ), $i ),
					'id'            => 'sidebar-footer-' . $i,
					'description'   => esc_html__( 'Add widgets here.', 'promina' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="footer-widget-title">',
					'after_title'   => '</h2>',
				) );
			}
		}
	}
}

add_action( 'widgets_init', 'promina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function promina_scripts() {
	$theme = wp_get_theme( get_template() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style('font-awesome-v5', get_template_directory_uri() . '/assets/css/font-awesome5.min.css', array(), '5.8.0' );
    wp_enqueue_style( 'promina-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), $theme->get( 'Version' )  );
	wp_enqueue_style( 'font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
	wp_enqueue_style( 'promina-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'promina-style', get_stylesheet_uri() );
	wp_enqueue_style( 'promina-google-fonts', promina_fonts_url() );

	/* Lib JS */
    wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array( 'jquery' ), '1.4.1', true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array( 'jquery' ), 'all', true );
    wp_enqueue_script( 'enscroll', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), 'all', true );
    wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/js/match-height-min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );

    /* Theme JS */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'promina-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
    wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', true);
	wp_register_script( 'promina-carousel', get_template_directory_uri() . '/assets/js/cms-carousel-owl.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_enqueue_script( 'promina-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_localize_script( 'promina-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    /*
     * Elementor Widget JS
     */
    // Counter Widget
    wp_register_script( 'cms-counter-widget-js', get_template_directory_uri() . '/elementor/js/cms-counter-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Progress Bar Widget
    wp_register_script( 'cms-progressbar-widget-js', get_template_directory_uri() . '/elementor/js/cms-progressbar-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Clients List Widget
    wp_register_script( 'cms-clients-list-widget-js', get_template_directory_uri() . '/elementor/js/cms-clients-list-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Image Carousel
    wp_register_script( 'cms-image-carousel-widget-js', get_template_directory_uri() . '/elementor/js/cms-image-carousel-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Item Carousel
    wp_register_script( 'cms-item-carousel-js', get_template_directory_uri() . '/elementor/js/cms-item-carousel.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Pie Charts Widget
    wp_register_script( 'cms-piecharts-widget-js', get_template_directory_uri() . '/elementor/js/cms-piecharts-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // CMS Post Carousel Widget
    wp_register_script( 'cms-post-carousel-widget-js', get_template_directory_uri() . '/elementor/js/cms-post-carousel-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Google Maps Widget
    $api = promina_get_opt('gm_api_key', 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM');
    $api_js = "https://maps.googleapis.com/maps/api/js?sensor=false&key=".$api;
    wp_register_script('maps-googleapis', $api_js, [], date("Ymd"));
    wp_register_script('custom-gm-widget-js', get_template_directory_uri() . '/elementor/js/custom-gm-widget.js', ['maps-googleapis', 'jquery'], $theme->get( 'Version' ), true);
    wp_register_script('cms-post-grid-widget-js', get_template_directory_uri() . '/elementor/js/cms-post-grid-widget.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-toggle-widget-js', get_template_directory_uri() . '/elementor/js/cms-toggle-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-accordion-widget-js', get_template_directory_uri() . '/elementor/js/cms-accordion-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-alert-widget-js', get_template_directory_uri() . '/elementor/js/cms-alert-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-tabs-widget-js', get_template_directory_uri() . '/elementor/js/cms-tabs-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
}

add_action( 'wp_enqueue_scripts', 'promina_scripts' );

/* add editor styles */
function promina_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}

add_action( 'admin_init', 'promina_add_editor_styles' );

/* add admin styles */
function promina_admin_style() {
	$theme = wp_get_theme( get_template() );
	wp_enqueue_style( 'promina-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
	wp_enqueue_style( 'font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0' );
}

add_action( 'admin_enqueue_scripts', 'promina_admin_style' );

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Page options
 */
require_once get_template_directory() . '/inc/page-options.php';

/**
 * CSS Generator.
 */
if ( ! class_exists( 'CSS_Generator' ) ) {
	require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * Breadcrumb.
 */
require_once get_template_directory() . '/inc/classes/class-breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/* Load list require plugins */
require_once( get_template_directory() . '/inc/require-plugins.php' );

/* Load lib Font */
require_once get_template_directory() . '/inc/libs/fontawesome.php';
require_once get_template_directory() . '/inc/libs/materialdesign.php';


/**
 * Additional widgets for the theme
 */
require_once get_template_directory() . '/widgets/widget-recent-posts.php';
require_once get_template_directory() . '/widgets/widget-social.php';
require_once get_template_directory() . '/widgets/class.widget-extends.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/extends.php';


if ( ! function_exists( 'promina_fonts_url' ) ) :
	/**
	 * Register Google fonts.
	 *
	 * Create your own promina_fonts_url() function to override in a child theme.
	 *
	 * @since league 1.1
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function promina_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		if ( 'off' !== _x( 'on', 'Barlow font: on or off', 'promina' ) ) {
            $fonts[] = 'Barlow:300,400,400i,500,500i,600,600i,700,700i';
		}
		
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'promina' ) ) {
			$fonts[] = 'Roboto:300,400,400i,500,500i,600,600i,700,700i';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;

/* Favicon */
function promina_site_favicon(){
    
    $favicon = promina_get_opt( 'favicon' );
    
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}
add_action('wp_head', 'promina_site_favicon');

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

if(class_exists("Elementor_Theme_Core")){
	if(!function_exists("prominaadd_icons_to_cms_iconpicker_field")){
		add_filter("redux_cms_iconpicker_field/get_icons", "prominaadd_icons_to_cms_iconpicker_field");
		function prominaadd_icons_to_cms_iconpicker_field($icons){
			$custom_icons = [
				'Material Icons' => array(
                    array('zmdi zmdi-3d-rotation' => '3D Rotation'),
                    array('zmdi zmdi-airplane-off' => 'Airplane Off'),
                    array('zmdi zmdi-airplane' => 'Airplane'),
                ),
			];
			$icons = array_merge($custom_icons, $icons);
			return $icons;
		}
	}
} 

if (class_exists('autoptimizeCache')) {
    $myMaxSize = 256000;
    $statArr=autoptimizeCache::stats(); 
    $cacheSize=round($statArr[1]/1024);
    
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0");
    }
}