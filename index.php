<?php get_header(); ?>
<main>
  <!-- Blog section start -->
  <section class="home-blog-section relative pt-[30px] ">
    <div class="container relative z-10">
      <div class="text-center">
        <h1 class="text-[46px] text-[#241822] font-light pb-[54px] mb-[10px] tracking-[1.35px] uppercase border-b border-[#C8C8C8] relative before:w-[2px] before:h-[30px] before:bg-[#96225D] before:absolute before:top-[-40px] before:left-[50%] before:translate-x-[-50%]"><?php wp_title(''); ?></h1>
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
            <div class="home-blog-col <?php if ($i == 1) echo 'col-span-12 full-width-blog pt-16 relative'; else echo 'col-span-4'; ?> mb-[40px]">
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
                <h4 class="heading-h4 leading-[1.3em] relative after:absolute after:w-[30px] after:h-[2px] after:bg-[#AA90A4] after:top-[calc(100%+10px)] after:left-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
          
    <img src="<?php echo get_template_directory_uri() . '/assets/images/wooden-spoon.png' ?>" alt="" class="absolute bottom-0 right-0 z-0">
  </section>


  <!-- Blog section end -->
  <div class="main-blog">
    <div class="blog-filter">
      <div class="container">
        <div class="inner-blog">
          <div class="blog-heading">
            <h2 id="SectionName">Blog</h2>
          </div>
        </div>
      </div>
    </div>

<?php /*
    <div class="portfolio section">
      <div class="container">
        <div class="filters">
          <ul class="toolbar">
            <li class="active" data-filter="*">All</li>
            <?php
            $argss = array(
              'taxonomy' => 'category',
              'hide_empty' => 0,
              'include' => array(17, 18, 19, 20, 21, 22, 23),
            );
            $termss = get_terms($argss);
            $counts = 1;
            foreach ($termss as $terms) {
              //print_r($terms);
            ?>
              <li data-filter=".<?php echo $terms->slug; ?>">
                <div class="cat-img"><img src="<?php echo z_taxonomy_image_url($terms->term_id); ?>" /></div> <?php echo $terms->name; ?>
              </li>
            <?php } ?>
          </ul>
        </div>
        <div class="filters-content">
          <div id="portfolio">
            <div>
              <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'taxonomy' => 'category',
                'include' => array(17, 18, 19, 20, 21, 22, 23),
              );
              $loop = new WP_Query($args);
              while ($loop->have_posts()) : $loop->the_post();
                $categories = get_the_category();
                $cats = "";
                foreach ($categories as $category) {
                  $cats .= $category->slug . " ";
                }
              ?>
                <div class="tile scale-anm all <?php echo $cats; //echo get_the_category(); 
                                                ?>">
                  <div class="item ">
                    <div class="img-sec">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="cnt-sec">
                      <div class="cat">
                        <?php
                        $category_object = get_the_category($loop->ID);
                        // $category_name = $category_object[1]->name;
                        ?>
                        <p><?php the_category(' '); ?></p>
                      </div>
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <p>
                        <?php the_excerpt(70);  ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
          <div id="more_posts">Load More</div>
        </div>
      </div>
    </div>
*/ ?>

    <section class="show-now-product">
      <div class="container">
        <div class="best-seller-product relative bg-white grid grid-cols-2 gap-x-[40px] p-[40px]">
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
          
          <div id="owl-shop" class="owl-carousel owl-theme">
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
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $best_seller_img[0] ?>" alt="" class="max-w-[300px] h-[300px] w-[100%] object-cover rounded-tl-[50px]"></a>
              <div class="hidden group-hover:flex absolute left-[50%] translate-x-[-50%] bottom-[40px]"><?php echo do_shortcode('[add_to_cart id=' . $id . ']') ?></div>
            </div>
            <h4 class="heading-h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
        
        <!-- Testimonial sectin start -->
<div class="testimonial-section py-[90px]">
  
    <div class="text-center">
      <h3 class="heading-h3 uppercase"><?php the_field('testimonial_sub_title') ?></h3>
      <h2 class="heading-h2"><?php the_field('testimonial_title') ?></h2>
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
        <div class="owl-carousel owl-theme px-[50px]" id="testimonial-shop-carousel">
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
<!-- Testimonial sectin end -->
        </div>
        </div>
      </section>
    </div>
  </div>
  </div>
</main>
<?php get_footer(); ?>