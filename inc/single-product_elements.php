<?php
// custom single product button on shop archive page
add_action('woocommerce_after_shop_loop_item', 'add_a_buy_now_btn', 5);
function add_a_buy_now_btn()
{
	global $product;

	// Not for variable and grouped products that doesn't have an "add to cart" button
	if ($product->is_type('variable') || $product->is_type('grouped')) return;

	// Output the custom button linked to the product
	echo '<div style="margin-bottom:10px;">
        <a class="button custom-button" href="' . esc_attr($product->get_permalink()) . '">' . __('Buy Now') . '</a>
    </div>';
}
?>
<?php
add_action('woocommerce_after_add_to_cart_form', 'add_content_after_addtocart', 8);
add_action('woocommerce_after_add_to_cart_form', 'add_a_buy_now_btn', 9);
add_action('woocommerce_after_add_to_cart_form', 'single_product_accordion', 10);

// buy now button on single product page

function add_content_after_addtocart()
{
	$current_product_id = get_the_ID();
	$product = wc_get_product($current_product_id);
	$checkout_url = wc_get_checkout_url();
	if ($product->is_type('simple')) {
		echo '<a href="' . $checkout_url . '?add-to-cart=' . $current_product_id . '" class="buy-now button">Add to Cart</a>';
	}
	
}
?>
<?php
function single_product_accordion(){
?>
<div class="single-product-accordion">
		<div class="row">
			<div class="col">
				<div class="tabs">
					<div class="tab">
						<input type="radio" id="rd1" name="rd">
						<label class="tab-label" for="rd1">Product Description</label>
						<div class="tab-content">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="tab">
						<input type="radio" id="rd2" name="rd">
						<label class="tab-label" for="rd2">Shipping & Returns</label>
						<div class="tab-content">
							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
						</div>
					</div>
					<div class="tab">
						<input type="radio" id="rd3" name="rd">
						<label class="tab-label" for="rd3">More Info</label>
						<div class="tab-content">
						It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
	

do_shortcode('[Sassy_Social_Share]');



function tonerbadge(){
	wc_get_template('templates/single-product/custom-elements.php');
}
add_action('woocommerce_after_add_to_cart_form', 'tonerbadge', 11);