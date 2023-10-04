<?php get_header(); ?>
<section class="py-[90px]">
      <div class="container">
        
<?php if (have_posts()) { ?>
  <ul class="grid grid-cols-4 gap-x-[40px]">
  <?php while ( have_posts() ) : the_post(); ?>
<li>
    <?php
    if ($post->post_type == "post") { ?>
      <!-- blog archieve -->
      <div class="home-blog-col mt-[40px]">
        <?php $trending_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
        <?php 
          if ($trending_img) { ?>
            <img src="<?php echo $trending_img[0]; ?>" alt="" class="w-[100%] h-56 rounded-none object-cover">
          <?php }
          else{ ?>
            <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" class="w-[100%] h-56 rounded-none object-cover">
          <?php }
        ?>
        <h3 class="heading-h4 leading-[1.3em] relative after:absolute after:w-[30px] after:h-[2px] after:bg-[#AA90A4] after:top-[calc(100%+10px)] after:left-0"><?php the_title(); ?></h3>
        <p class="mb-[27px] mt-[26px]"><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
        <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline">Read More</a>
      </div>
    <?php } 

    if ($post->post_type == "product") { ?>
      <!-- product archieve -->
      <div class="trending-product-col group">
        <div class="best-product-thumbnail relative">
          <div class="favourite-icon bg-dark-purple-rgba w-[50px] h-[50px] justify-center items-center cursor-pointer hidden group-hover:flex absolute top-0 right-0 group-hover:transition-all hover:transition-all">
            <?php echo do_shortcode('[ti_wishlists_addtowishlist loop=yes]'); ?>
          </div>
          <?php $trending_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID)); ?>
          <?php if(!empty($trending_img)) : ?>
            <img src="<?php echo $trending_img[0] ?>" alt="" class="w-[100%] max-w-[100%] h-[350px] object-cover rounded-tl-[45px]">
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri().'/assets/images/woocommerce-placeholder.png' ?>" alt="" class="woocommerce-placeholder w-[100%] max-w-[100%] h-[350px] object-cover rounded-tl-[45px]">
          <?php endif; ?>
          <?php $product_id = get_the_ID(); ?>
          <?php echo '<a href="?add-to-cart=' . get_the_id($product_id) . '" class="bg-dark-purple-rgba text-[14px] text-white px-[15px] py-[10px] max-w-[226px] w-[100%] justify-center m-auto hidden group-hover:flex absolute left-0 right-0 bottom-[40px]">Add To Cart +</a>'; ?>
        </div>
        <h4 class="heading-h4"><?php the_title(); ?></h4>
        <div class="star-review">
          <img src="<?php get_template_directory_uri() . '/assets/images/star.png' ?>" alt="">
        </div>
        <div class="pa-product-price">
          <span class="text-[22px] text-[#47203E]"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?></span>
          <del class="text-[18px] text-[#AA90A4] ml-[10px]"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?></del>
        </div>
        <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline"> Buy Now </a>
      </div>
    <?php }
   
    ?>
</li>
          
<?php endwhile; ?>
</ul> 
<?php } else { echo "not found"; } ?>
      </div>
</section>
<?php get_footer(); ?>