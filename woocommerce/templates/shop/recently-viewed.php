<?php
/**
 * The template for displaying Recently Viewed product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/shop/recently-viewed.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
?>

<?php
/*
<section class="shop-product-review-section pb-80">
  <h2>Product Review</h2>
  <?php
    $params = array(
      'posts_per_page' => -1,
      'post_type' => 'product',
    );
    $post_query = new WP_Query($params);
    ?>
    <div class="owl-carousel owl-theme" id="latestProducts">
      <?php
      if ($post_query->have_posts()) :
        while ($post_query->have_posts()) :
          $post_query->the_post();
      ?>
          <div class="item flex gap-x-[40px]">
            <div class="w-2/4">
              <div class="full-product relative">
                <a href="<?php the_permalink(); ?>">
                  <?php $full_product_img = wp_get_attachment_image_src(get_post_thumbnail_id($post_query->ID), 'single-post-thumbnail'); ?>
                  <img class="img-fluid w-[100%] !max-w-[412px] !h-[350px] rounded-none object-cover" src="<?php echo $full_product_img[0]; ?> ">
                </a>
              </div>
            </div>
            <div class="w-2/4">
              <div class="product-details">
                <h4 class="heading-h4"><?php the_title(); ?></h4>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
</section>
*/?>

<!-- newsletter section start -->
<?php get_template_part( 'partials/modules/module', 'newsletter' ); ?>


<!-- Testimonial Section -->
<?php get_template_part( 'partials/modules/module', 'testimonial' ); ?>

