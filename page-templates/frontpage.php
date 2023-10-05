<?php /* Template Name: FrontPage */ ?>
<?php get_header(); ?>

<!-- hero section start -->

<h1 style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;"><?php the_title(); ?></h1>

<section class="hero-section">
  <?php if (have_rows('hero_repeater')) : ?>
    <div id="owl-demo" class="owl-carousel owl-theme">
      <?php while (have_rows('hero_repeater')) : the_row(); 
        $hero_slider_img = get_sub_field('hero_slider_image');
      ?>
        <div style="background-image: url('<?php echo esc_url($hero_slider_img['url']); ?>')" class="item item1 bg-no-repeat bg-cover pt-[340px] pb-[180px]">
          <div class="container">
            <div class="pa-hero-content-col relative px-[35px] py-[60px] max-w-[525px] w-[100%] before:absolute before:w-[100%] before:h-[100%] before:border before:border-[#96225D] before:z-[-1] before:right-[-8px] before:bottom-[-8px] before:rounded-tl-[183px] before:rounded-none">
              <span class="text-[22px] text-white tracking-[1.65px] mb-[20px] block"><?php the_sub_field('hero_sub_title') ?></span>
              <p class="text-[46px] text-[#241822] leading-[1.2em] mb-[40px]"><?php the_sub_field('hero_title') ?></p>
              <a href="<?php the_sub_field('hero_button_link') ?>" class="pa-button"><?php the_sub_field('hero_button_text') ?></a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>



<!-- hero section end -->

<!-- Latest products section start -->
<section class="pa-latest-products-section py-[95px] bg-white">
  <div class="container">
    <div class="text-center">
      <p class="heading-h3"><?php the_field('latest_product_sub_title'); ?></p>
      <h2 class="heading-h2"><?php the_field('latest_product_title'); ?></h2>
    </div>
    <?php
    $params = array(
      'posts_per_page' => 3, //No of product to be fetched
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
            
            <div class="w-3/5 product-img-wrap">
              <div class="full-product relative">
                <a href="#" class="px-[35px] py-[13px] text-[18px] text-white bg-dark-purple-rgba inline-block rounded-br-[25px] rounded-none absolute left-0 top-0">Latest</a>
                <a href="<?php the_permalink(); ?>">
                  <?php $full_product_img = wp_get_attachment_image_src(get_post_thumbnail_id($post_query->ID), 'single-post-thumbnail'); ?>
                  <?php if(!empty($full_product_img)) : ?>
                  <img class="img-fluid w-[100%] h-[550px] object-cover" src="<?php echo $full_product_img[0]; ?> ">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" class="img-fluid w-[100%] h-[550px] object-cover">
                  <?php endif; ?>
                  <p class="text-[14px] text-[#241822] max-w-[230px] p-[20px] bg-opacity-[0.6] bg-white absolute right-[44px] bottom-[72px]"><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                </a>
              </div>
            </div>
            <div class="w-2/5 latest-product-full-width">
              <div class="product-details">
                <?php $latest_product_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                <?php if(!empty($latest_product_img)) : ?>
                  <img src="<?php echo $latest_product_img[0] ?>" alt="" class="max-w-[300px] h-[300px] object-cover rounded-tl-[50px]">
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" class="max-w-[300px] h-[300px] object-cover rounded-tl-[50px]">
                <?php endif; ?>
                <h3 class="heading-h4"><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
                <div class="product-price mt-[12px]">
                  <span class="text-[22px] text-[#47203E]"><?php echo get_woocommerce_currency_symbol().$product->get_regular_price(); ?></span>
                  <del class="text-[18px] text-[#AA90A4] ml-[10px]"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price(); ?></del>
                </div>
                <a href="<?php the_permalink(); ?>" class="pa-button mt-[20px] max-w-[300px] w-[100%] text-center">View Product</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<!-- Latest products section end -->

<!-- Best Sellers section start -->
<section class="best-seller-section bg-white relative before:absolute before:w-[100%] before:h-[260px] before:bg-[#F9F8F9] before:left-0 before:right-0 before:top-[95px]">
  <div class="container flex items-center">
    <div class="best-seller-title relative pr-[30px] py-[20px] w-3/12">
      <p class="text-[#96225D] text-[22px] tracking-[1.65px] mt-[0] mb-[15px]"><?php the_field('best_seller_sub_title'); ?></p>
      <h2 class="heading-h2 pl-[18px] pb-[50px] border-l border-[#96225D]"><?php the_field('best_seller_title'); ?></h2>
    </div>

    <div class="best-seller-product relative bg-white grid grid-cols-3 gap-x-[40px] gap-y-0 p-[40px]">
      <?php
      $best_seller = array(
        'posts_per_page' => 3, //Number of product to be fetched
        'post_type' => array('product'),
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
      );
      $post_query_seller = new WP_Query($best_seller);
      ?>
      <?php
      if ($post_query_seller->have_posts()) :
        while ($post_query_seller->have_posts()) :
          $post_query_seller->the_post();
      ?>
          <div class="best-product-col group transition-all hover:transition-all">
            <div class="best-product-thumbnail relative">
              <div class="favourite-icon bg-dark-purple-rgba w-[50px] h-[50px] justify-center items-center cursor-pointer hidden group-hover:flex absolute top-0 right-0 group-hover:transition-all hover:transition-all">
                <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
              </div>
              <?php $best_seller_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
              <a href="<?php the_permalink(); ?>">
              <?php if(!empty($best_seller_img)) : ?>
                <img src="<?php echo $best_seller_img[0] ?>" alt="" class="max-w-[300px] h-[300px] w-[100%] object-cover rounded-tl-[50px]">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" class="max-w-[300px] h-[300px] w-[100%] object-cover rounded-tl-[50px]">
              <?php endif; ?>
              </a>
              <div class="hidden group-hover:flex absolute left-[50%] translate-x-[-50%] bottom-[40px]"><?php echo do_shortcode('[add_to_cart id=' . $id . ']') ?></div>
            </div>
            <h3 class="heading-h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="star-review">
              <ul class="woocommerce">
                <li>
                  <?php if ($average = $product->get_average_rating()) : ?>
                    <?php echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average) . '"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>'; ?>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
            <div class="pa-product-price">
              <span class="text-[22px] text-[#47203E]"><?php echo get_woocommerce_currency_symbol().$product->get_regular_price(); ?></span><del class="text-[18px] text-[#AA90A4] ml-[10px]"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price(); ?></del>
            </div>
            <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline">Buy Now</a>
          </div>
      <?php
        endwhile;
      endif;
      ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<!-- Best Sellers section end -->


<!-- Special Products section start -->
<?php
$special_product_image = get_field('special_product_image');
$special_product_image_two = get_field('special_product_image_two');
?>
<section class="special-product-section py-[90px]">
  <div class="container">
    <div class="special-product-row grid grid-cols-2 gap-x-[40px]">
      <div style="background-image: url('<?php echo esc_url($special_product_image['url']); ?>');" class="special-product-col flex justify-end rounded-tl-[80px] rounded-none px-[30px] py-[60px] bg-[#DDE0EF] bg-no-repeat bg-contain">
        <div class="special-product-content">
          <p class="text-[18px] text-[#47203E] mb-[54px] tracking-[1.35px] uppercase relative after:w-[30px] after:h-[2px] after:bg-[#96225D] after:absolute after:top-[calc(100%+20px)] after:left-0"><?php the_field('special_product_sub_title'); ?></p>
          <h2 class="text-[36px] text-[#241822] leading-[1.3em] uppercase"><?php the_field('special_product_title') ?></h2>
          <a href="<?php the_field('special_product_pre_link'); ?>" class="text-[18px] text-[#96225D] underline block text-right mt-[55px]"><?php the_field('special_product_pre_order'); ?></a>
        </div>
      </div>
      <div style="background-image: url('<?php echo esc_url($special_product_image_two['url']); ?>');" class="special-product-col relative flex justify-end rounded-tr-[80px] rounded-none px-[30px] py-[60px] bg-[#DDE0EF] bg-no-repeat bg-cover">
        <div class="special-product-content max-w-[340px] w-[100%] bg-[rgba(255,255,255,0.3)] backdrop-blur-[50px] absolute left-[50%] translate-x-[-50%] top-0 bottom-0 px-[30px] py-[60px]">
          <h3 class="text-[36px] text-[#47203E] text-center mb-[54px] tracking-[1.35px] uppercase relative after:w-[2px] after:h-[30px] after:bg-[#96225D] after:absolute after:top-[calc(100%+1px)] after:left-[50%] after:translate-x-[-50%]"><?php the_field('special_product_heading') ?></h3>
          <p class="text-center text-[14px] text-white"><?php the_field('special_product_content') ?></p>
          <a href="<?php the_field('special_product_buy_link'); ?>" class="text-[18px] text-[#96225D] underline block text-center mt-[55px]"><?php the_field('special_product_buy_now'); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Special Products section end -->

<!-- product slider section start-->
<section class="product-slider-section pb-[80px]">
  <div class="product-container max-w-[1730px] m-auto px-[15px]">
    <?php $leaf_pattern_img = get_field('product_slider_leaf_pattern'); ?>
    <div style="background-image: url('<?php echo esc_url($leaf_pattern_img['url']); ?>');" class="product-row flex relative before:absolute before:border before:border-[#96225D] before:rounded-tl-[100px] before:rounded-br-[100px] before:rounded-none before:w-[100%] before:h-[calc(100%+64px)] before:max-w-[1170px] before:m-auto before:left-[50%] before:translate-x-[-50%] before:z-[-1] before:top-[-32px] after:absolute after:bg-cover after:w-[240px] after:h-[100%] after:right-[0]">
      <div class="product-slider-wrap flex w-[100%] relative overflow-hidden items-center bg-[#f9f8f9]">
        <div class="product-carousel w-2/5 max-w-[566px] flex relative overflow-hidden h-[100%] before:absolute before:right-0 before:z-[9] before:w-[180px] before:h-[100%] before:bg-gradient-to-tr before:from-[#F9F8F9] before:from-50% before:to-transparent before:to-50% before:rotate-[-180deg]">
          <?php
          $product_slider = array(
            'posts_per_page' => 3, //No of product to be fetched
            'post_type' => 'product',
            'product_cat'    => 'facial-oils'
          );
          $post_query_slider = new WP_Query($product_slider);
          ?>
          <?php
          if ($post_query_slider->have_posts()) :

          ?>
            <div class="owl-carousel owl-theme relative h-[100%]" id="owl-product">
              <?php
              while ($post_query_slider->have_posts()) :
                $post_query_slider->the_post();
              ?>
                <div class="item">
                  <?php $product_slider_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                  <?php if(!empty($product_slider_img)) : ?>
                    <img src="<?php echo $product_slider_img[0] ?>" alt="">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" />
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>
        <!-- <div class="product-space"></div> -->
        <div class="product-slider-content-wrap w-3/5 pl-[40px]">
          <div class="product-content-wrap relative z-10 pt-[35px] pb-[50px]">
            <?php 
              $product_slider_title = get_field('product_slider_title');
              $product_slider_title_red = get_field('product_slider_title_red');
              $product_slider_text = get_field('product_slider_text');
            ?>
            <div class="row-title">
              <h2 class="text-[44px] text-[#241822] font-[300] leading-[1.2] mb-[50px] relative after:absolute after:w-[30px] after:h-[2px] after:bg-[#96225D] after:top-[calc(100%+20px)] after:left-0"><?php echo $product_slider_title ?> <span class="text-[#96225D] font-[400]"><?php echo $product_slider_title_red ?></span></h2>
              <p class="text-[#AA90A4] mb-[20px]"><?php echo $product_slider_text ?></p>
            </div>
            <?php if(have_rows('product_slider_bullet_point')) : ?>
              <ul class="product-tools columns-2 p-0 m-0">
            <?php while(have_rows('product_slider_bullet_point')) : the_row(); ?>
            <?php $product_slider_bullet_text = get_sub_field('product_slider_bullet_text'); ?>
              <li class="product-tools-li"><?php echo $product_slider_bullet_text; ?></li>
              <?php endwhile;?>
            </ul>
            <?php endif;?>
            <?php 
              $product_slider_btn_text = get_field('product_slider_btn_text');
              $product_slider_btn_link = get_field('product_slider_btn_link');

              $btn_link = get_field('product_slider_btn_link');
              if( $btn_link ): 
                  $link_url = $btn_link['url'];
                  $link_title = $btn_link['title'];
                  $link_target = $btn_link['target'] ? $btn_link['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $link_url ); ?>" class="pa-button mt-[36px]"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div>
          <ul class="rotate-lines flex rotate-[-16deg] absolute z-[9] left-[25%] h-[140%] top-[-79px]">
            <li class="">.</li>
            <li class="bg-[#c9a8bd]">.</li>
            <li>.</li>
            <li>.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product slider section end-->

<!-- Trending Products section start -->
<section class="trending-product-section py-[90px]">
  <div class="container">
    <div class="text-center">
      <p class="heading-h3 uppercase"><?php the_field('trending_product_sub_title'); ?></p>
      <h2 class="heading-h2"><?php the_field('trending_product_title'); ?></h2>
    </div>
    <?php echo do_shortcode('[wmvp_most_viewed_products number_of_products_in_row="4" posts_per_page="4"]') ?>
  </div>
</section>
<!-- Trending Products section end -->

<!-- Blog section start -->
<section class="home-blog-section relative pt-[90px] pb-[350px] bg-gradient-to-br from-[#EFECEF] from-50% to-[#F9F8F9] to-50% ">
  <div class="container relative z-10">
    <div class="text-center">
      <h2 class="heading-h2 text-[#96225D]"><?php the_field('blog_title'); ?></h2>
      <span class="max-w-[1100px] m-auto block"><?php the_field('blog_description') ?></span>
    </div>
    <?php
    $blog = array(
      'posts_per_page' => 3,
      'post_type' => 'post'
    );
    $blog_query = new WP_Query($blog);
    ?>
    <div class="home-blog-row grid grid-cols-3 gap-x-[40px]">
      <?php
      if ($blog_query->have_posts()) :
        while ($blog_query->have_posts()) : $blog_query->the_post();
      ?>
          <div class="home-blog-col mt-[40px]">
            <?php $blog_img = wp_get_attachment_image_src(get_post_thumbnail_id($blog_query->ID), 'single-post-thumbnail'); ?>
            <?php 
              if ($blog_img) { ?>
                <img src="<?php echo $blog_img[0]; ?>" alt="" class="w-[100%] h-56 rounded-none object-cover">
              <?php }
              else{ ?>
                <img src="<?php echo get_template_directory_uri().'/assets/images/dummy.png' ?>" alt="" class="w-[100%] h-56 rounded-none object-cover">
              <?php }
            ?>
            
            <h3 class="heading-h4 leading-[1.3em] relative after:absolute after:w-[30px] after:h-[2px] after:bg-[#AA90A4] after:top-[calc(100%+10px)] after:left-0"><?php the_title(); ?></h3>
            <p class="mb-[27px] mt-[26px]"><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
            <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline">Read More</a>
          </div>
      <?php
        endwhile;
      endif;
      ?>
      <?php wp_reset_query(); ?>
    </div>
    <div class="text-center">
      <a href="<?php echo site_url('/blog'); ?>" class="pa-button mt-10">View More</a>
    </div>
  </div>
  <img src="<?php echo get_template_directory_uri() . '/assets/images/wooden-spoon.png' ?>" alt="" class="absolute bottom-0 right-0 z-0">
</section>
<!-- Blog section end -->

<!-- Newsletter section -->
<?php get_template_part( 'partials/modules/module', 'newsletter' ); ?>

<!-- Testimonials Section -->
<?php get_template_part( 'partials/modules/module', 'testimonial' ); ?>

<?php get_footer(); ?>