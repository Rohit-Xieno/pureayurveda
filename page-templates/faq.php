<?php /* Template Name: FAQ */ ?>
<?php get_header(); ?>
<div class="container py-24 max-w-[638px]">
  <div class="text-center">
    <h1 class="heading-h3"><?php echo get_field('sub_heading'); ?></h1>
    <h2 class="heading-h2 mb-0 relative pb-12 border-b border-[#C8C8C8] "><?php echo get_field('heading'); ?></h2>
  </div>
  <div class="breadcrumbs pb-16">
		<?php woocommerce_breadcrumb(); ?>
    <!-- </?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?> -->
  </div>
  <div class="single-product-accordion max-w-[640px] m-auto">
		<div class="faq-search-bar text-center mb-10"><input class='input mb-5' type="search" id="searchbox" placeholder="Live search keyword.."></div>
		<div class="row">
			<div class="col">
        <?php if(have_rows('faq_repeater')) : ?>
          <div class="tabs">
          <?php
          $var = 0;
           while(have_rows('faq_repeater')) : the_row(); ?>
					<div class="tab mb-[30px]">
						<input type="radio" id="<?php echo('rd'.$var)?>" name="rd">
						<label class="tab-label bg-[#F9F8F9]" for="<?php echo('rd'.$var)?>"><?php echo get_sub_field('question'); ?></label>
						<div class="tab-content">
              <?php echo get_sub_field('answer'); ?>
						</div>
					</div>
          <?php $var++; endwhile; ?>
        </div>
        <?php endif; ?>
				</div>
			</div>
			<!-- <div class="no-results hidden">no match found</div> -->
		</div>
	</div>
	</div>
<?php get_footer(); ?>

<script>
	// faq searches
let cards = document.querySelectorAll('.tab');
// let noResults = document.querySelector('.no-results');
    
		function liveSearch() {
				let search_query = document.getElementById("searchbox").value;
				
				//Use innerText if all contents are visible
				//Use textContent for including hidden elements
				for (var i = 0; i < cards.length; i++) {
						if(cards[i].textContent.toLowerCase().includes(search_query.toLowerCase())) {
								cards[i].classList.remove("is-hidden");
								// noResults.classList.remove('hidden');
						} else {
								cards[i].classList.add("is-hidden");
								// noResults.classList.add('hidden');
						}
				}
		}
		
		//A little delay
		let typingTimer;               
		let typeInterval = 500;  
		let searchInput = document.getElementById('searchbox');
		
		searchInput.addEventListener('keyup', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(liveSearch, typeInterval);
		});
</script>