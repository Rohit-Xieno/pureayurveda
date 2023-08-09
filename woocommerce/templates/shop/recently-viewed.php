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

<section class="shop-product-review-section">
  <h2>Product Review</h2>
  <?php
    $params = array(
      'posts_per_page' => -1, //No of product to be fetched
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
                  <img class="img-fluid w-[100%] !h-[350px] rounded-none object-cover" src="<?php echo $full_product_img[0]; ?> ">
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

<!-- newsletter section start -->
<section class="home-newsletter-section">
  <div class="container">
    <?php
      $newsletter_image = get_field('newsletter_image');
    ?>
    <div style="background-image: url('<?php echo esc_url($newsletter_image['url']); ?>');" class="home-newsletter-row mt-[-250px] relative pt-[200px] pb-[80px] bg-[#47203E] overflow-hidden bg-repeat-x ">
      <div class="text-center">
        <h3 class="heading-h3 uppercase text-[#AA90A4] after:bg-[#AA90A4]"><?php the_field('newsletter_sub_title'); ?></h3>
        <h2 class="heading-h2 text-white mb-[25px]"><?php the_field('newsletter_title'); ?></h2>
      </div>
      <form action="" class="subscribe-form">
        <input type="text" placeholder="type your email here..." class="subscribe-field">
        <button type="button" class="subscribe-btn">Subscribe Now</button>
      </form>
    </div>
  </div>
</section>
<!-- newsletter section end -->

<!-- Testimonial sectin start -->
<section class="testimonial-section py-[90px]">
  <?php 
    $testimonial_sub_title = get_field('testimonial_sub_title', 'option');
    $testimonial_title = get_field('testimonial_title', 'option');
  ?>
  <div class="container">
    <div class="text-center">
      <h3 class="heading-h3 uppercase"><?php echo $testimonial_sub_title ?></h3>
      <h2 class="heading-h2"><?php echo $testimonial_title ?></h2>
    </div>
    <div class="testimonial-carousel relative">
      <?php

      $testimonial = array(
        'posts_per_page' => -1,
        'post_type' => 'testimonial'
      );
      $testimonial_query = new WP_Query($testimonial);
      if ($testimonial_query->have_posts()) :
      ?>
        <div class="owl-carousel owl-theme px-[180px]" id="testimonial-carousel">
          <?php while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
            <div class="item">
              <?php $testimonial_img = wp_get_attachment_image_src(get_post_thumbnail_id($testimonial_query->ID)); ?>
              <img src="<?php echo $testimonial_img[0] ?>" alt="customer" class="w-[60px] h-[60px] m-auto rounded-full">
              <h4><?php the_title(); ?></h4>
              <h6><?php the_field('designation') ?></h6>
              <!-- <p></p> -->
              <?php the_content(); ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<!-- Testimonial sectin end -->