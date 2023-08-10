<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>
 <div class="container">
<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>

		<?php wc_get_template_part('content', 'single-product'); ?>
</div>
<section class="product-ratings-reviews-section bg-[#F9F8F9] py-[100px]">
	<div class="container flex">
		<div class="product-ratings-review" style="width: 40%;">
		<h3 class="text-[#96225D] text-[22px] tracking-[1.65px] mt-[0] mb-[15px]">OVERALL RATING FOR</h3>
		<?php the_title(); ?>
		<div class="rating-custom">
    	<?php wc_get_template( 'single-product/rating.php' ); ?>
		</div>
		</div>
		<div class="product-full-review-wrap" style="width: 60%;">
		<div class="product-full-review">
			<?php echo comments_template(); ?>
		</div>
		</div>
	</div>
</section>

<section class="related-product">
<div class="container">
	<div class="row flex">
		<div class="col-1" style="width: 25%;">
			<div class="best-seller-title relative pr-[30px] py-[20px]">
				<h2 class="heading-h2 pl-[18px] pb-[50px] border-l border-[#96225D]">You May<br>  Also Like</h2>
			</div>
		</div>
		<div class="col-3" style="width: 75%; display: flex;">
	<?php 
	global $product; // If not set…

	if( ! is_a( $product, 'WC_Product' ) ){
			$product = wc_get_product(get_the_id());
	}
	
	$args = array(
			'posts_per_page' => 3,
			'columns'        => 3,
			'orderby'        => 'rand',
			'order'          => 'desc',
	);
	
	$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
	$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );
	
	// Set global loop values.
	wc_set_loop_prop( 'name', 'related' );
	wc_set_loop_prop( 'columns', $args['columns'] );
	
	wc_get_template( 'single-product/related.php', $args );
	?>
</div>
</div>
</div>
</section>

<?php endwhile; // end of the loop. 
?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action('woocommerce_sidebar');
?>
</div>
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */