<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<div class="checkout-wrapper flex gap-10 justify-between">


<form name="checkout" method="post" class="checkout woocommerce-checkout w-[65%]" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<!-- <div id="order_review" class="woocommerce-checkout-review-order">
		<?php /* do_action( 'woocommerce_checkout_order_review' ); */ ?>
	</div> -->

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<div class="cart-collaterals !w-[35%]">
	<div class="bg-[#F9F8F9] p-[40px]">
<div class="actions mb-5">
	<form method="post">
<?php if ( wc_coupons_enabled() ) { ?>
	<div class="coupon flex justify-end relative pt-[35px]">
		<label for="coupon_code" class="screen-reader-text coupon-code-label"><?php esc_html_e( 'Add a discount code', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text w-full h-[55px] bg-transparent border-2 border-[#AA90A4] p-2" id="coupon_code" value="" /> <button type="submit" class="!px-7 !bg-transparent !border-2 !border-solid !border-[#AA90A4] !ml-[18px] !rounded-none button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Add', 'woocommerce' ); ?></button>
		<?php do_action( 'woocommerce_cart_coupon' ); ?>
	</div>
<?php } ?>

<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
</form>

<div class="woocommerce_cart_actions">

	<?php do_action( 'woocommerce_cart_actions' ); ?>
</div>
<div class="woocommerce-cart-nonce">

	<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
</div>
</div>

<div class="woocommerce_cart_collaterals">


	
		<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>
			
	
	</div>
	<div class="card-accept">
	<h3>We accept</h3>
	<div class="payment-cards flex items-center justify-between">
		<h4>Cash on Delivery</h4>
		<div class="cards">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Credit-Card-Icons.svg" alt="">
		</div>
	</div>
	<p class="text-sm pt-5">Prices and delivery costs are not confirmed until you've reached the checkout.</p> <p class="text-sm pt-5">30 days withdrawal and free returns. Read more about <a href="#" class="underline">return and refund policy</a></p>
</div>
</div>
</div>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
