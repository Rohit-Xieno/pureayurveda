<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="container">
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
	
</header>
<!-- <div class="left-sidebar-filter">
	<?php /* dynamic_sidebar('shop-page-sidebar'); */ ?>
</div> -->
<button type="button" id="column2" style="background-color: green; padding: 10px 20px;">2 column</button>
<button type="button" id="column4" style="background-color: green; padding: 10px 20px;">4 column</button>
<div class="special-product-col relative flex justify-end rounded-tr-[80px] rounded-none px-[30px] py-[60px] bg-[#DDE0EF] bg-[url(http://localhost/pureayurveda/wp-content/uploads/2023/06/2-layers.png)] bg-no-repeat bg-cover">
        <div class="special-product-content max-w-[340px] w-[100%] bg-[rgba(255,255,255,0.3)] backdrop-blur-[50px] absolute left-[50%] translate-x-[-50%] top-0 bottom-0 px-[30px] py-[60px]">
          <h3 class="text-[36px] text-[#47203E] text-center mb-[54px] tracking-[1.35px] uppercase relative after:w-[2px] after:h-[30px] after:bg-[#96225D] after:absolute after:top-[calc(100%+1px)] after:left-[50%] after:translate-x-[-50%]"><?php the_field('special_product_heading') ?></h3>
          <p class="text-center text-[14px] text-white"><?php the_field('special_product_content') ?></p>
          <a href="<?php the_field('special_product_buy_link'); ?>" class="text-[18px] text-[#96225D] underline block text-center mt-[55px]"><?php the_field('special_product_buy_now'); ?></a>
        </div>
      </div>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
?>

<?php
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

// echo do_shortcode("[woocommerce_recently_viewed_products per_page='5']");
?>
</div>
<?php
get_footer( 'shop' );