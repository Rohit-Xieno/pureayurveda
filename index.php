<?php get_header(); ?>
<main>
  <!-- Blog section start -->
  <section class="home-blog-section blog-page-section relative pt-[30px] ">
    <div class="container relative z-10">
      <div class="text-center">
        <h1 class="text-[46px] text-[#241822] font-light pb-[54px] mb-[10px] tracking-[1.35px] uppercase border-b border-[#C8C8C8] relative before:w-[2px] before:h-[30px] before:bg-[#96225D] before:absolute before:top-[-40px] before:left-[50%] before:translate-x-[-50%]"><?php wp_title(''); ?></h1>
        <h2 style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;">Sub Title</h2>
      </div>
      <?php woocommerce_breadcrumb(); ?>
      <?php
      $blog = array(
        'posts_per_page' => -1,
        'post_type' => 'post'
      );
      $blog_query = new WP_Query($blog);
      ?>
      <?php $i=1; ?>
      <?php if ($blog_query->have_posts()) : ?>
        <div class="home-blog-row grid grid-cols-12 gap-x-[40px]">
          <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <div class="home-blog-col blog-page-col <?php if ($i == 1) echo 'col-span-12 full-width-blog pt-16 relative'; else echo 'col-span-4'; ?> mb-[40px]">
              <?php $blog_img = wp_get_attachment_image_src(get_post_thumbnail_id($blog_query->ID), 'single-post-thumbnail'); ?>
              <?php 
                if ($blog_img) { ?>
                  <a href="<?php the_permalink(); ?>" class="post-feature-img"><img src="<?php echo $blog_img[0]; ?>" alt="" class="w-[100%] h-[255px] rounded-none object-cover"></a>    
               <?php }
                else{ ?>
                      <a href="<?php the_permalink(); ?>" class="post-feature-img"><img src="<?php echo get_template_directory_uri()."/assets/images/dummy.png"?>" alt="" class="w-[100%] h-[255px] rounded-none object-cover"></a>
               <?php }
              ?>
              
              <div class="blog-content">
                <h3 class="heading-h4 leading-[1.3em] relative after:absolute after:w-[30px] after:h-[2px] after:bg-[#AA90A4] after:top-[calc(100%+10px)] after:left-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="mb-[27px] mt-[26px]"><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
                <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline read-more">Read More</a>
              </div>
            </div>
          <!-- </div> -->
          <?php $i++; ?>
          <?php endwhile;?>
        </div>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
          <div class="load-more-wrapper text-center relative w-full h-[1px] bg-[#ccc] my-28">
            <a href="" class="load-more absolute top-[-12px] left-[50%] translate-x-[-50%] bg-white px-7">Load More</a>
          </div>
          </div>
  </section>

    <section class="show-now-product pb-24">
      <div class="container">
        <div class="best-seller-product relative bg-white p-[40px]">
          <?php
          $shop_product = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
          );
          $shop_query = new WP_Query($shop_product);?>
          <div class="shop-slider">
            <?php 
              $shop_heading = get_field('blog_shop_now_heading', 'option');
            ?>
          <h2 class="text-4xl text-center mb-12"><?php echo $shop_heading; ?></h2>
          
          <div class="owl-carousel owl-theme px-[150px]" id="owl-shop">
          <?php
          if ($shop_query->have_posts()) :
             while ($shop_query->have_posts()) : $shop_query->the_post();
          ?>
          <div class="item">
              <div class="best-product-col group transition-all hover:transition-all">
              <div class="best-product-thumbnail relative">
              <div class="favourite-icon bg-dark-purple-rgba w-[50px] h-[50px] justify-center items-center cursor-pointer hidden group-hover:flex absolute top-0 right-0 group-hover:transition-all hover:transition-all">
                <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
              </div>
              <?php $best_seller_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
              <a href="<?php the_permalink(); ?>">
              <?php if(!empty($best_seller_img)) : ?>
                <img src="<?php echo $best_seller_img[0] ?>" alt="" class="h-[300px] w-[100%] object-cover rounded-tl-[50px]">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri().'/assets/images/woocommerce-placeholder.png' ?>" alt="" class="border border-[#f2f2f2] wp-post-image h-[300px] w-[100%] object-cover rounded-tl-[50px]">
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
              <span class="text-[22px] text-[#47203E]"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?></span><del class="text-[18px] text-[#AA90A4] ml-[10px]"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?></del>
            </div>
            <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline">Buy Now</a>
          </div>
              </div>
              <?php endwhile;?>
              <?php endif; ?>
            </div>
            </div>
            <?php wp_reset_query(); ?>
        </div>
        </div>
      </section>
</main>
<?php get_footer(); ?>