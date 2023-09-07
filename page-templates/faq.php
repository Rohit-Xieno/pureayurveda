<?php /* Template Name: FAQ */ ?>
<?php get_header(); ?>
<div class="container py-24 max-w-[638px]">
  <div class="text-center">
    <h3 class="heading-h3"><?php echo get_field('sub_heading'); ?></h3>
    <h1 class="heading-h2 mb-0 relative pb-12 border-b border-[#C8C8C8] before:absolute before:left-[50%] before:top-[-40px] before:w-[2px] before:h-[30px] before:translate-x-[-50%] before:bg-[#96225D]"><?php echo get_field('heading'); ?></h1>
  </div>
  <div class="breadcrumbs pb-16">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
  <div class="single-product-accordion">
		<div class="row">
			<div class="col">
        <?php if(have_rows('faq_repeater')) : ?>
          <div class="tabs">
          <?php
          $var = 0;
           while(have_rows('faq_repeater')) : the_row(); ?>
					<div class="tab">
						<input type="radio" id="<?php echo('rd'.$var)?>" name="rd">
						<label class="tab-label" for="<?php echo('rd'.$var)?>"><?php echo get_sub_field('question'); ?></label>
						<div class="tab-content">
              <?php echo get_sub_field('answer'); ?>
						</div>
					</div>
          <?php $var++; endwhile; ?>
        </div>
        <?php endif; ?>
					<!-- <div class="tab">
						<input type="radio" id="rd2" name="rd">
						<label class="tab-label" for="rd2">Shipping & Returns</label>
						<div class="tab-content">
							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
						</div>
					</div>
					<div class="tab">
						<input type="radio" id="rd3" name="rd">
						<label class="tab-label" for="rd3">More Info</label>
						<div class="tab-content">
						It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	</div>
<?php get_footer(); ?>