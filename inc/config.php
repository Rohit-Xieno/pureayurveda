<?php
// Get Theme Data from style.css
$theme_data = wp_get_theme();

// options page
if( function_exists('acf_add_options_page') ) {
    
	acf_add_options_page('Header');
	acf_add_options_page('Footer');
	acf_add_options_page('Testimonial Options');
	acf_add_options_page('Blog');
	
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
function add_a_custom_button()
{
	global $product;

	// Not for variable and grouped products that doesn't have an "add to cart" button
	if ($product->is_type('variable') || $product->is_type('grouped')) return;

	// Output the custom button linked to the product
	echo '<div style="margin-bottom:10px;">
        <a class="button custom-button" href="' . esc_attr($product->get_permalink()) . '">' . __('Buy Now') . '</a>
    </div>';
}
add_action('woocommerce_after_shop_loop_item', 'add_a_custom_button', 5);
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_breadcrumb' );


// recently view products
function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {

	// Get shortcode parameters
	extract(shortcode_atts(array(
		"per_page" => '5'
	), $atts));

	// Get WooCommerce Global
	global $woocommerce;

	// Get recently viewed product cookies data
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
	$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );

	// If no data, quit
	if ( empty( $viewed_products ) )
		return __( 'You have not viewed any product yet!', 'rc_wc_rvp' );

	// Create the object
	ob_start();

	// Get products per page
	if( !isset( $per_page ) ? $number = 5 : $number = $per_page )

	// Create query arguments array
    $query_args = array(
    				'posts_per_page' => $number, 
    				'no_found_rows'  => 1, 
    				'post_status'    => 'publish', 
    				'post_type'      => 'product', 
    				'post__in'       => $viewed_products, 
    				'orderby'        => 'rand'
    				);

	// Add meta_query to query args
	$query_args['meta_query'] = array();

    // Check products stock status
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

	// Create a new query
	$r = new WP_Query($query_args);

	// If query return results
	if ( $r->have_posts() ) {

		$content = '<ul class="rc_wc_rvp_product_list_widget">';

		// Start the loop
		while ( $r->have_posts()) {
			$r->the_post();
			global $product;

			$content .= '<li>
				<a href="' . get_permalink() . '">
					' . ( has_post_thumbnail() ? get_the_post_thumbnail( $r->post->ID, 'shop_thumbnail' ) : woocommerce_placeholder_img( 'shop_thumbnail' ) ) . ' ' . get_the_title() . '
				</a> ' . $product->get_price_html() . '
			</li>';
		}

		$content .= '</ul>';

	}

	// Get clean object
	$content .= ob_get_clean();
	
	// Return whole content
	return $content;
}

// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");