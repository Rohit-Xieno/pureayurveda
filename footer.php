<?php $footer_bg_leaf = get_field('footer_bg_leaf', 'option'); ?>
<footer style="background-image: url('<?php echo esc_url($footer_bg_leaf['url']); ?>'); " class="footer pt-[80px] pb-[45px] bg-no-repeat bg-[#241822]" id="footer">
  <div class="container">
    <div class="row flex lg:flex-nowrap flex-wrap">
      <div class="lg:w-3/12 px-[15px] md:w-[50%] w-[100%]">
        <?php
          $footer_logo = get_field('f_logo', 'option');
          $footer_text = get_field('f_text', 'option');
          $footer_copyright = get_field('f_copyright', 'option');
        ?>
        <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( $footer_logo['url']) ?>" alt=""></a>
        <p class="text-[14px] text-[#AA90A4] mt-[30px]"><?php echo $footer_text ?></p>
        <p class="text-[14px] text-[#AA90A4]"><?php echo $footer_copyright ?></p>
        <?php 
          if(have_rows('footer_social_icons', 'option')) : ?>
            <ul class="social-icons flex gap-x-[40px] mt-[18px]">
            <?php while(have_rows('footer_social_icons', 'option')) : the_row();?>
            <?php 
              $social_icon = get_sub_field('footer_social_icon', 'option');
              $social_link = get_sub_field('footer_social_link', 'option');
              if( $social_link ):
                $link_url = $social_link['url'];
                $link_target = $social_link['target'] ? $social_link['target'] : '_self';
                ?>
              <li>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo esc_url($social_icon['url']); ?>" alt="<?php echo esc_attr($social_icon['alt']); ?>"></a>
              </li>
              <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
      </div>
      <div class="lg:w-[35%] px-[15px] md:w-[50%] w-[100%]">
        <?php
					wp_nav_menu(array(
						'menu' => 'Footer Menu',
						'theme_location' => 'Secondry Menu',
						'menu_class' => 'pa-footer-links mt-[80px] columns-2 text-[white] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0',
            'add_a_class' => 'text-[18px] font-[300] hover:text-[#AA90A4] mb-[20px] block',
					));
				?>
      </div>
      <div class="lg:w-2/5 px-[15px] w-[100%]">
        <!-- <form action="" class="subscribe-form mt-[80px] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0">
          <input type="text" placeholder="type your email here..." class="subscribe-field bg-[#5B5259] placeholder:text-[#F9F8F9]">
          <button type="button" class="subscribe-btn max-w-[194px]">Subscribe</button>
        </form> -->
        <div class="subscribe-form mt-[80px] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0">
          <?php echo do_shortcode('[contact-form-7 id="02d1e37" title="Subscribe Form"]'); ?>
        </div>
        <p class="pa-footer-leaf inline-block relative text-[14px] text-[#AA90A4] mt-[20px] top-0"><?php the_field('footer_newsletter_text', 'option'); ?></p>
        <?php $newsletter_leaf = get_field('footer_newsletter_leaf', 'option') ?>
        <?php if(!empty($newsletter_leaf)) : ?>
        <div class="newsletter-leaf flex justify-end translate-y-[-20px]">
          <figure class="w-[76px] h-[76px] object-contain">
            <img src="<?php echo esc_url($newsletter_leaf['url']); ?>" alt="<?php echo esc_attr($newsletter_leaf['alt']); ?>">
          </figure>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>