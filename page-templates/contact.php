<?php /* Template Name: Contact */?>
<?php get_header(); ?>

<section class="about-header-section pt-28">
  <?php
  $contact_heading = get_field('contact_heading');
  ?>
  <div class="container">
    <div class="text-center">
      <h1
        class="heading-h2 mb-0 relative pb-12 border-b border-[#C8C8C8] before:absolute before:left-[50%] before:top-[-40px] before:w-[2px] before:h-[30px] before:translate-x-[-50%] before:bg-[#96225D]">
        <?php echo $contact_heading; ?>
      </h1>
    </div>
    <div class="breadcrumbs pb-16">
      <?php woocommerce_breadcrumb(); ?>
    </div>
    <!-- <div class="breadcrumbs pb-16">
      </?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div> -->
  </div>
</section>


<section class="contact-wrap pb-28">
  <div class="container">
  <h2 style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;">Sub Title</h2>
    <div class="row flex gap-10 max-w-[1100px] m-auto">
      <div class="contact-info-wrap w-[30%]">
        <?php 
          $address_heading = get_field('address_heading');
          $address = get_field('address');
          $pin = get_field('pin');

          $call_heading = get_field('call_heading');
          $call = get_field('call');
          $customer_call = get_field('customer_call');

          $email_heading = get_field('email_heading');
          $email_careers = get_field('email_careers');
          $email_info = get_field('email_info');
        ?>
      <div class="contact-info mb-10 !pb-10 border-b border-[#ccc]">
        <h3 class="text-[22px] tracking-[2.2px] text-[#96225D] mb-[15px]"><?php echo $address_heading; ?></h3>
        <ul>
          <li><?php echo $address; ?></li>
          <li><?php echo $pin; ?></li>
        </ul>
      </div>
      <div class="contact-info mb-10 !pb-10 border-b border-[#ccc]">
        <h3 class="text-[22px] tracking-[2.2px] text-[#96225D] mb-[15px]"><?php echo $call_heading; ?></h3>
        <ul>
          <li><?php echo $call; ?></li>
          <li><?php echo $customer_call; ?></li>
        </ul>
      </div>
      <div class="contact-info mb-10 !pb-10">
        <h3 class="text-[22px] tracking-[2.2px] text-[#96225D] mb-[15px]"><?php echo $email_heading; ?></h3>
        <p><?php echo $email_careers; ?></p>
        <p><?php echo $email_info; ?></p>
      </div>
      </div>
      <div class="contact-form w-[70%]">
        <?php 
          $heart_img = get_field('heart_image');
          $form_txt = get_field('form_text');
        ?>
        <div class="text-center">
          <?php if(!empty($heart_img)) : ?>
            <div class="heart-img mb-5">
              <img src="<?php echo esc_url($heart_img['url']); ?>" alt="<?php echo esc_attr($heart_img['alt']); ?>" class="m-auto">
            </div>
          <?php endif; ?>
          <h2 class="mb-10 text-lg"><?php echo $form_txt; ?></h2>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="601c139" title="Contact Us Form"]'); ?>          
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>