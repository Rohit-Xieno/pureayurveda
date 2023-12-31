<!-- Testimonial section start -->
<section class="testimonial-section py-[90px]">
  <div class="container">
    <div class="text-center">
      <p class="heading-h3 uppercase"><?php the_field('testimonial_sub_title', 'option'); ?></p>
      <h2 class="heading-h2"><?php the_field('testimonial_title', 'option'); ?></h2>
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
        <div class="owl-carousel owl-theme lg:px-[180px] md:px-[100px] px-[40px]" id="testimonial-carousel">
          <?php while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
            <div class="item">
              <?php $testimonial_img = wp_get_attachment_image_src(get_post_thumbnail_id($testimonial_query->ID)); ?>
              <?php if(!empty($testimonial_img)) : ?>
                <img src="<?php echo $testimonial_img[0] ?>" alt="customer" class="w-[60px] h-[60px] m-auto rounded-full">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri().'/assets/images/user.png' ?>" alt="author" class="w-[60px] h-[60px] m-auto rounded-full">
              <?php endif; ?>
              <h3 class="text-[22px] font-normal tracking-[2.2px] text-[#96225D] uppercase"><?php the_title(); ?></h3>
              <h4 class="mb-[15px] text-sm font-normal text-[#AA90A4]"><?php the_field('designation') ?></h4>
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
<!-- Testimonial section end -->