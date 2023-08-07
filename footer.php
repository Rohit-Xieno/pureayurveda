<footer class="footer pt-[80px] pb-[45px] bg-[url(../assets/images/leaves-bg-1.png)] bg-no-repeat bg-[#241822]" id="footer">
  <div class="container">
    <div class="row flex">
      <div class="w-3/12 px-[15px]">
        <?php
          $footer_logo = get_field('f_logo', 'option');
          $footer_text = get_field('f_text', 'option');
          $footer_copyright = get_field('f_copyright', 'option');
        ?>
        <img src="<?php echo esc_url( $footer_logo['url']) ?>" alt="">
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
      <div class="w-[35%] px-[15px]">
        <?php
					wp_nav_menu(array(
						'menu' => 'Footer Menu',
						'theme_location' => 'Secondry Menu',
						'menu_class' => 'pa-footer-links mt-[80px] columns-2 text-[white] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0',
            'add_a_class' => 'text-[18px] font-[300] hover:text-[#AA90A4] mb-[20px] block',
					));
				?>
        <!-- <ul class="pa-footer-links mt-[80px] columns-2 text-[white] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0">
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">About</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Shop</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Blog</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Contact</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">FAQ</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Orders</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Policy & Privacy</a></li>
          <li class="mb-[20px]"><a href="#" class="text-[18px] font-[300] hover:text-[#AA90A4]">Terms & Conditions</a></li>
        </ul> -->
      </div>
      <div class="w-2/5 px-[15px]">
        <form action="" class="subscribe-form mt-[80px] relative before:w-[30px] before:h-[2px] before:bg-[#AA90A4] before:absolute before:top-[-30px] before:left-0">
          <input type="text" placeholder="type your email here..." class="subscribe-field bg-[#5B5259] placeholder:text-[#F9F8F9]">
          <button type="button" class="subscribe-btn max-w-[194px]">Subscribe</button>
        </form>
        <p class="pa-footer-leaf relative text-[14px] text-[#AA90A4] mt-[20px] after:block after:absolute after:bg-[url(http://localhost/pureayurveda/wp-content/uploads/2023/06/footer-leaf.png)] after:bg-no-repeat after:w-[76px] after:h-[80px] after:bg-contain after:right-[-30px] after:top-[30px]">For Newsletter Updates. Enter your email to stay in the loop on new collections, pop-up shows and more.</p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>