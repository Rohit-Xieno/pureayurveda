<?php
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
?>
<?php
// hide related products in single product page
/**
* Remove related products output
*/

// use Automattic\WooCommerce\Blocks\BlockTypes\Breadcrumbs;

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


//hide tab in single product page
add_filter( 'woocommerce_product_tabs', '__return_empty_array', 98 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 5);


//add heading in cart page
// function woocommerce_cart_heading(){
	
// the_title( '<h1 class="entry-title">', '</h1>' );

// }

// add_action('woocommerce_before_cart', 'woocommerce_cart_heading');



add_action( 'wp_enqueue_scripts' , function () {
	wp_register_script( 'ajax_load_more' , 'load_more.js' , array( 'jquery' ) );
	wp_localize_script( 'ajax_load_more' , 'AjaxLoad' , array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) , ) );
	wp_enqueue_script( 'ajax_load_more' );
} );
add_action( 'wp_ajax_nopriv_getmoreposts', array( __CLASS__ , 'fetch_data' ) );
add_action( 'wp_ajax_getmoreposts', array( __CLASS__ , 'fetch_data' ) );

function fetch_data () {
	if ( !$_POST[ 'paged' ] ) { 
			$json = array( 'status' => 'error' , 'message' => 'no pagination found' ); 
	} else {
			$query = new WP_Query( array( 'post_type' => 'post' , 'post_status' => 'publish' , 'posts_per_page' => 9 , 'paged' => (int)$_POST[ 'paged' ] ) );
			if ( $query -> found_posts > 0 ) {
					$json = array( 'status' => 'ok' , 'message' => 'all ok' , 'posts' => $query -> posts );
			} else{
					$json = array( 'status' => 'error' , 'message' => 'no posts found' );
			}
	}
	header( 'Content-Type: application/json; charset=utf-8' );
	echo json_encode( $json );
	exit;
}



// product sorting
 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 add_action( 'woo_custom_catalog_ordering', 'woocommerce_catalog_ordering', 30 ); 

 add_action( 'woocommerce_after_add_to_cart_form', 'custom_img', 9 );
 function custom_img(){ ?>
 <div class="mt-10 border-y border-[#ccc] py-8">
		<img src="<?php echo get_template_directory_uri()."/assets/images/tonerbadges.svg"?>" alt="">
 </div>
	<?php
}
?>
