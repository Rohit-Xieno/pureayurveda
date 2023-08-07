<?php /* Template Name: About */?>
<?php get_header(); ?>
<main class="pt-48">
  <section class="about-header-section pt-28">
    <?php
    $about_heading = get_field('about_heading');
    $about_banner = get_field('about_banner');
    ?>
    <div class="container">
      <div class="text-center">

        <h1
          class="heading-h2 mb-0 relative pb-12 border-b border-[#C8C8C8] before:absolute before:left-[50%] before:top-[-40px] before:w-[2px] before:h-[30px] before:translate-x-[-50%] before:bg-[#96225D]">
          <?php echo $about_heading; ?>
        </h1>
      </div>
      <div class="breadcrumbs pb-16" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
      <img src="<?php echo esc_url($about_banner['url']); ?>" alt="<?php echo esc_attr($about_banner['alt']); ?>">
    </div>
  </section>

  <section class="about-company pt-16">
    <?php
    $about_company_heading = get_field('heading');
    $about_company_text = get_field('text');
    ?>
    <div class="container">
      <div class="text-center">
        <h2 class="text-[22px] text-[#96225d] tracking-[1.65px] pb-3">
          <?php echo $about_company_heading ?>
        </h2>
        <p class="text-[18px] text-[#4a3e4a] max-w-[1090px] m-auto">
          <?php echo $about_company_text ?>
        </p>
      </div>
    </div>
  </section>

  <section class="product-story pt-24 pb-40">
    <?php 
      $ps_image = get_field('ps_image');
      $ps_heading = get_field('ps_heading');
      $ps_text = get_field('ps_text');
    ?>
    <div class="container">
      <div class="row flex gap-[40px] md:flex-nowrap flex-wrap items-center">
        <div class="md:w-[60%] w-full">
          <img src="<?php echo esc_url($ps_image['url']); ?>" alt="<?php echo esc_attr($ps_image['alt']); ?>">
        </div>
        <div class="md:w-[40%] w-full">
          <h2 class="text-[38px] text-[#241822] pb-6"><?php echo $ps_heading ?></h2>
          <p class="text-[#4a3e4a]"><?php echo $ps_text ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="inspiration-section">
    <?php 
      $oi_heading = get_field('oi_heading');
      $oi_text = get_field('oi_text');
    ?>
    <div class="container">
      <div class="row bg-[#f9f8f9] p-12 pb-24 text-center relative before:absolute before:border before:border-[#96225d] before:rounded-tl-[240px] before:z-10 before:w-[calc(100%+40px)] before:h-[calc(100%+40px)] before:left-[-20px] before:top-[-20px]">
        <div class="inner-row">
      <h2 class="text-[#96225d] text-[46px] font-light mb-6"><?php echo $oi_heading ?></h2>
      <p class="mb-10 max-w-[1120px] mx-auto"><?php echo $oi_text ?></p>
      <?php if(have_rows('oi_image')) : ?>
        <div class="row flex justify-evenly gap-10">
        <?php while(have_rows('oi_image')) : the_row(); 
          $oi_icon = get_sub_field('oi_icon');
        ?>
        <div class="icon w-[186px] !h-[186px] rounded-full bg-white flex justify-center items-center"><img src="<?php echo esc_url($oi_icon['url']); ?>" alt="<?php echo esc_attr($oi_icon['alt']); ?>"></div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
    </div>
    </div>
  </section>

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
</main>

<?php get_footer(); ?>