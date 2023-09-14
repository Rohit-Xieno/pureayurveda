<!-- newsletter section start -->
<section class="home-newsletter-section">
  <div class="container">
    <?php
      $newsletter_image = get_field('newsletter_image', 'option');
    ?>
    <div style="background-image: url('<?php echo esc_url($newsletter_image['url']); ?>');" class="home-newsletter-row mt-[-250px] relative md:pt-[200px] pt-[100px] px-5 pb-[80px] bg-[#47203E] overflow-hidden bg-repeat-x ">
      <div class="text-center">
        <h3 class="heading-h3 uppercase text-[#AA90A4] after:bg-[#AA90A4]"><?php the_field('newsletter_sub_title', 'option'); ?></h3>
        <h2 class="heading-h2 text-white mb-[25px]"><?php the_field('newsletter_title', 'option'); ?></h2>
      </div>
      <div class="subscribe-form">
        <?php echo do_shortcode('[contact-form-7 id="02d1e37" title="Subscribe Form"]'); ?>
      </div>
    </div>
  </div>
</section>
<!-- newsletter section end -->