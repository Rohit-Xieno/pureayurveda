<?php /* Template Name: About */?>
<?php get_header(); ?>

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
      <div class="breadcrumbs pb-16">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
      <?php if(!empty($about_banner)) : ?>
        <img src="<?php echo esc_url($about_banner['url']); ?>" alt="<?php echo esc_attr($about_banner['alt']); ?>">
      <?php endif; ?>
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
        <?php if(!empty($ps_image)) : ?>
        <div class="md:w-[60%] w-full">
          <img src="<?php echo esc_url($ps_image['url']); ?>" alt="<?php echo esc_attr($ps_image['alt']); ?>">
        </div>
        <?php endif; ?>
        <div class="w-full <?php echo !empty($ps_image) ? 'md:w-[40%]' : 'md:w-full'; ?>">
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
        <div class="inner-row relative z-50">
      <h2 class="text-[#96225d] text-[46px] font-light mb-6"><?php echo $oi_heading ?></h2>
      <p class="mb-10 max-w-[1120px] mx-auto"><?php echo $oi_text ?></p>
      <?php if(have_rows('oi_image')) : ?>
        <div class="row flex justify-evenly gap-10">
        <?php while(have_rows('oi_image')) : the_row(); 
          $oi_icon = get_sub_field('oi_icon');
        ?>
        <?php if(!empty($oi_icon)) : ?>
          <div class="icon w-[186px] !h-[186px] rounded-full bg-white flex justify-center items-center"><img src="<?php echo esc_url($oi_icon['url']); ?>" alt="<?php echo esc_attr($oi_icon['alt']); ?>"></div>
        <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
    </div>
    </div>
  </section>

<!-- Testimonials Section -->
<?php get_template_part( 'partials/modules/module', 'testimonial' ); ?>

<?php get_footer(); ?>