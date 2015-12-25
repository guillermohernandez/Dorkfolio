<?php
/**
 * dorkfolio functions and definitions
 *
 * @package dorkfolio 
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'dorkfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dorkfolio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dorkfolio, use a find and replace
	 * to change 'dorkfolio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dorkfolio', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dorkfolio' ),
		'social'  => __( 'Social Links Menu', 'dorkfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dorkfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', dorkfolio_fonts_url() ) );
}
endif; // dorkfolio_setup
add_action( 'after_setup_theme', 'dorkfolio_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dorkfolio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dorkfolio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span class="underline">',
		'after_title'   => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'dorkfolio_widgets_init' );

if ( ! function_exists( 'dorkfolio_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function dorkfolio_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'dorkfolio' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$oxygen = _x( 'on', 'Oxygen font: on or off', 'dorkfolio' );

	if ( 'off' !== $merriweather || 'off' !== $oxygen ) {
		$font_families = array();

		if ( 'off' !== $merriweather )
			$font_families[] = 'Merriweather:400,300,700,400italic,300italic,700italic,900,900italic:latin';

		if ( 'off' !== $oxygen )
			$font_families[] = 'Oxygen:300,400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function dorkfolio_scripts() {


	wp_enqueue_style( 'dorkfolio-style', get_stylesheet_uri() );

	/* Add Foundation CSS */
	wp_enqueue_style( 'foundation-normalize', get_template_directory_uri() . '/foundation/css/normalize.css' );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundation/css/foundation.css' );
	
	/* Add Custom CSS */
	wp_enqueue_style( 'dorkfolio-custom-style', get_template_directory_uri() . '/custom.css', array(), '1' );
	
	/* Add Foundation JS */
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), '1', true );
	
	/* Foundation Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), '1', true );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons.css', array(), '3.4.1' );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'dorkfolio-fonts', dorkfolio_fonts_url(), array(), null );

	wp_enqueue_script( 'dorkfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dorkfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dorkfolio_scripts' );

function dorkfolio_nav_menu($menu){
	$menu = str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown', $menu);
	$menu = str_replace('sub-menu', 'sub-menu dropdown', $menu);
	return $menu;
}
add_filter('wp_nav_menu','dorkfolio_nav_menu');


/*add_filter("the_content", "plugin_myContentFilter");

function plugin_myContentFilter($content)
{
	// If content characters less than 500 then get content
	$length = 200;
	if(strlen($content)<$length+10) return $content;
	// else content characters more than 500 then cut it and add ... the end
	// Take the existing content and return a subset of it
	return substr($content, 0, 200). "...";
}*/


function dorkfolio_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'dorkfolio_custom_excerpt_length', 999 );

function dorkfolio_new_excerpt_more( $more ) {
	//return ' ...';
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continued reading %s', 'dorkfolio' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return '&hellip; ' . $link;
}
add_filter('excerpt_more', 'dorkfolio_new_excerpt_more');

/*function dorkfoliotheme_customize_register( $wp_customize ) {
    // All the code in this tutorial goes here
    $wp_customize->add_setting( 'dorkfolio_logo' ); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dorkfolio_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'dorkfolio' ),
        'section'  => 'title_tagline',
        'settings' => 'dorkfolio_logo',
    ) ) );
}
add_action( 'customize_register', 'dorkfoliotheme_customize_register' );*/


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
