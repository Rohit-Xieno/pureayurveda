<?php
// Get Theme Data from style.css
$theme_data = wp_get_theme();

// options page
if( function_exists('acf_add_options_page') ) {
    
	acf_add_options_page();
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Testimonial');
	acf_add_options_sub_page('Blog');
	acf_add_options_sub_page('Shop');
	acf_add_options_sub_page('Newsletter');
	acf_add_options_sub_page('SingleProduct');
    
	acf_add_options_page(array(
			'page_title'    => 'Theme General Settings',
			'menu_title'    => 'Theme Settings',
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
	));
	
	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Header Settings',
			'menu_title'    => 'Header',
			'parent_slug'   => 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Footer Settings',
			'menu_title'    => 'Footer',
			'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Testimonial Settings',
			'menu_title'    => 'Testimonial',
			'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Blog Settings',
			'menu_title'    => 'Blog',
			'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Shop Settings',
			'menu_title'    => 'Shop',
			'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Newsletter Settings',
			'menu_title'    => 'Newsletter',
			'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
			'page_title'    => 'Theme SingleProduct Settings',
			'menu_title'    => 'SingleProduct',
			'parent_slug'   => 'theme-general-settings',
	));
	
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

// comment form (box)
function custom_mini_cart() {
	echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
	echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
	echo '<div class="basket-item-count" style="display: inline;">';
	echo '<span class="cart-items-count count">';
	echo WC()->cart->get_cart_contents_count();
	echo '</span>';
	echo '</div>';
	echo '</a>';
	echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
	echo '<li> <div class="widget_shopping_cart_content">';
	woocommerce_mini_cart();
	echo '</div></li></ul>';
	
	}
	add_shortcode( 'quadlayers-mini-cart', 'custom_mini_cart' );


	// buy now on shop page
	// custom single product button on shop archive page
function add_a_custom_buttons()
{
	global $product;

	// Not for variable and grouped products that doesn't have an "add to cart" button
	if ($product->is_type('variable') || $product->is_type('grouped')) return;

	// Output the custom button linked to the product
	echo '<div style="margin-bottom:10px;">
        <a class="button custom-button" href="' . esc_attr($product->get_permalink()) . '">' . __('Buy Now') . '</a>
    </div>';
}
// add_action('woocommerce_after_shop_loop_item', 'add_a_custom_buttons', 5);
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
// add_action( 'woocommerce_before_shop_loop', 'woocommerce_breadcrumb');


// recently viewed products on shop-page
function wrvp_recently_viewed(){
	$recent_sub_title = get_field('recent_sub_title','option');
	$recent_title = get_field('recent_title','option');
	echo '<div class="recently-viewed-section inverse full-bleed flex gap-10 bg-white relative before:absolute before:w-[100%] before:h-[209px] before:bg-[#F9F8F9] before:left-0 before:right-0 before:top-5 before:z-[-1]">';
	echo '<div class="recently-viewed-title w-[25%] bg-[#F9F8F9] mt-5 pt-7 h-[209px]">';
	echo '<p class="text-[#96225D] text-[22px] tracking-[1.65px] mt-[0] mb-[15px]">';
	echo $recent_sub_title;
	echo '</p>'; 
	echo '<h2 class="heading-h2 pl-[18px] leading-[1.2em] border-l border-[#96225D]">';
	echo $recent_title;
	echo '</h2>';  
	echo '</div>';
	echo do_shortcode('[wrvp_recently_viewed_products number_of_products_in_row="2" posts_per_page="2"]');
	echo '<div class="grey-box bg-[#F9F8F9] w-[25%] h-[209px] mt-5">';
	echo '</div>';
	echo '</div>';
	
}
add_action( 'woocommerce_after_shop_loop', 'wrvp_recently_viewed' );


function custom_text(){
	wc_get_template('templates/shop/recently-viewed.php');
}
add_action( 'woocommerce_after_shop_loop', 'custom_text' );