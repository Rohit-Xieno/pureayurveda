<?php /* Template Name: Test */ ?>
<?php get_header(); ?>
<?php woocommerce_pagination(); ?>


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
        'post_type' => 'post',
        'paged' => 1,
      );
      $blog_query = new WP_Query($blog);
      ?>
      <?php $i=1; ?>
      <?php if ($blog_query->have_posts()) : ?>
        <div class="home-blog-row publication-list grid grid-cols-12 gap-x-[40px]">
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
          <a href="" class="load-more w-full text-center">Load More</a>
          <!-- <div class="btn__wrapper">
            <a href="#!" class="btn btn__primary" id="load-more">Load more</a>
          </div> -->
  </section>
<?php get_footer(); ?>