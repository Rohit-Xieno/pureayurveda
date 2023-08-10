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




// breadcrumb
// function the_breadcrumb() {
// 	global $post;
// 	echo '<ul id="breadcrumbs">';
// 	if (!is_home()) {
// 			echo '<li><a href="';
// 			echo get_option('home');
// 			echo '">';
// 			echo 'Home';
// 			echo '</a></li><li class="separator"> / </li>';
// 			if (is_category() || is_single()) {
// 					echo '<li>';
// 					the_category(' </li><li class="separator"> / </li><li> ');
// 					if (is_single()) {
// 							echo '</li><li class="separator"> / </li><li>';
// 							the_title();
// 							echo '</li>';
// 					}
// 			} elseif (is_page()) {
// 					if($post->post_parent){
// 							$anc = get_post_ancestors( $post->ID );
// 							$title = get_the_title();
// 							foreach ( $anc as $ancestor ) {
// 									$output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
// 							}
// 							echo $output;
// 							echo '<strong title="'.$title.'"> '.$title.'</strong>';
// 					} else {
// 							echo '<li><strong> '.get_the_title().'</strong></li>';
// 					}
// 			}
// 	}
// 	elseif (is_tag()) {single_tag_title();}
// 	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
// 	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
// 	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
// 	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
// 	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
// 	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
// 	echo '</ul>';
// }

// Breadcrumbs for single blog post
// function get_single_blog_post_breadcrumb() {
// 	echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
// 	if (is_category() || is_single()) {
// 			echo "&nbsp; / &nbsp;";
// 			echo '<a href="'.esc_url(get_post_type_archive_link('post')).'" rel="nofollow">Blog</a>';
// 			// the_category(' &bull; ');
// 					if (is_single()) {
// 							echo " &nbsp; / &nbsp; ";
// 							the_title();
// 					}
// 	} elseif (is_page()) {
// 			echo "&nbsp; / &nbsp;";
// 			echo the_title();
// 	} elseif (is_search()) {
// 			echo "&nbsp; / &nbsp;Search Results for... ";
// 			echo '"<em>';
// 			echo the_search_query();
// 			echo '</em>"';
// 	}
// }