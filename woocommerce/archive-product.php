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
<div class="text-center mb-14">
	<h1 class="heading-h2 mb-0 relative pb-5 before:absolute before:left-[50%] before:top-[-40px] before:w-[2px] before:h-[30px] before:translate-x-[-50%] before:bg-[#96225D]"><?php echo get_field('shop_title', 'option'); ?></h1>
	<p class="text-[#AA90A4]"><?php echo get_field('shop_text', 'option'); ?></p>
</div>
<div class="pa-products-views flex justify-between items-center border-y border-[#C8C8C8] ">
	<div class="pa-products-grids border-r border-[#C8C8C8] p-4">
		<button type="button" id="columnT" class="mr-4 grey-color"><img class="w-[22px] h-[22px]" src="<?php echo get_template_directory_uri(); ?>/assets/images/grid.png" alt=""></button>
		<button type="button" id="columnF" class="view-button-active grey-color"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/column-4.svg" alt=""></button>
	</div>
	<div class="pa-shop-product-search flex-1 border-r border-[#C8C8C8] pr-4">
		<?php get_product_search_form();?>
	</div>
	<div class="pa-shop-product-sorting p-4">
		<?php do_action( 'woo_custom_catalog_ordering' ); ?>
	</div>
</div>


<?php
$special_product_image = get_field('special_product_image', 'option');
$special_product_image_two = get_field('special_product_image_two', 'option');
?>
<section class="special-product-col overflow-hidden mt-12 relative flex justify-end rounded-t-[80px] rounded-b-none px-[30px] bg-[#DDE0EF] bg-no-repeat bg-cover relative before:absolute before:left-0 before:w-full before:h-full before:bg-[#aa90a4] before:opacity-50 before:rounded-t-[80px] before:rounded-b-none before:z-10" style="background-image: url('<?php echo esc_url($special_product_image['url']); ?>');">
        <div class="special-product-content max-w-[340px] w-[100%] bg-[rgba(255,255,255,0.3)] backdrop-blur-[50px] left-[50%] translate-x-[-50%] top-0 bottom-0 px-[30px] py-[60px] z-20">
          <h3 class="text-[36px] text-[#47203E] text-center mb-[54px] tracking-[1.35px] uppercase leading-[1.3em] relative after:w-[2px] after:h-[30px] after:bg-[#96225D] after:absolute after:top-[calc(100%+1px)] after:left-[50%] after:translate-x-[-50%]"><?php the_field('special_product_heading', 'option') ?></h3>
          <p class="text-center text-[14px] text-white"><?php the_field('special_product_content', 'option') ?></p>
					<?php
						$product_link = get_field('special_product_buy_link', 'option');
						if($product_link) :
							$link_url = $product_link['url'];
							$link_title = $product_link['title'];
							$link_target = $product_link['target'] ? $product_link['target'] : '_self';
					?>
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="text-[18px] text-[#96225D] underline block text-center mt-[25px]"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
        </div>
				<h4 class="text-[100px] text-white uppercase absolute -bottom-12 left-0">NEW LAUNCH</h4>
      </section>

			<div class="price-filter">

				<?php echo do_shortcode('[woof_front_builder]'); ?>
				<?php dynamic_sidebar('products-page-sidebar'); ?>
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

	?>
	<div class="shop_wc_products">
		<?php
	woocommerce_product_loop_start();
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			// do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
			
		}
	}

	woocommerce_product_loop_end();
	?>
	</div>
	<?php
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