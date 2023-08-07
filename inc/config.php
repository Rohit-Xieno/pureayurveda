<?php
// Get Theme Data from style.css
$theme_data = wp_get_theme();

// options page
if( function_exists('acf_add_options_page') ) {
    
	acf_add_options_page('Header');
	acf_add_options_page('Footer');
	
}

// Core
define( 'THEME_NAME', $theme_data->Name );
define( 'THEME_VERSION', $theme_data->Version );

define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_DIR', get_template_directory() );

define( 'THEME_FRAMEWORK_URI', THEME_URI.'/libs' );
define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/libs' );

define( 'THEME_CUSTOM_ASSETS_IMAGES', THEME_URI.'/assets/images' );
define( 'THEME_CUSTOM_ASSETS_SCTIPT', THEME_URI.'/assets/js' );
define( 'THEME_CUSTOM_ASSETS_STYLE', THEME_URI.'/assets/css' );

if ( ! function_exists( 'pureayurveda_setup' ) ) {
    function pureayurveda_setup() {

        // Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

        /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

        /**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'pureayurveda' ),
				'footer'  => esc_html__( 'Secondary menu', 'pureayurveda' ),
			)
		);

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

        // Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

        // Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );
    }
}
add_action( 'after_setup_theme', 'pureayurveda_setup' );

// add class in link
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);