<?php get_header(); ?>
<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach ($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$the_query = new WP_Query($search_query);
if ($the_query->have_posts()) :
?>
  <!-- the loop -->
  <main>
    <section class="py-[90px]">
      <div class="container">
        <div class="grid grid-cols-4 gap-x-[40px]">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="trending-product-col group">
              <div class="best-product-thumbnail relative">
                <div class="favourite-icon bg-dark-purple-rgba w-[50px] h-[50px] justify-center items-center cursor-pointer hidden group-hover:flex absolute top-0 right-0 group-hover:transition-all hover:transition-all">
                  <?php echo do_shortcode('[ti_wishlists_addtowishlist loop=yes]'); ?>
                </div>
                <?php $trending_img = wp_get_attachment_image_src(get_post_thumbnail_id($the_query->ID)); ?>

                <img src="<?php echo $trending_img[0] ?>" alt="" class="w-[100%] max-w-[100%] h-[350px] object-cover rounded-tl-[45px]">
                <?php $product_id = get_the_ID(); ?>
                <?php echo '<a href="?add-to-cart=' . get_the_id($product_id) . '" class="bg-dark-purple-rgba text-[14px] text-white px-[15px] py-[10px] max-w-[226px] w-[100%] justify-center m-auto hidden group-hover:flex absolute left-0 right-0 bottom-[40px]">Add To Cart +</a>'; ?>
              </div>
              <h4 class="heading-h4"><?php the_title(); ?></h4>
              <div class="star-review">
                <img src="<?php get_template_directory_uri() . '/assets/images/star.png' ?>" alt="">
              </div>
              <div class="pa-product-price">
                <span class="text-[22px] text-[#47203E]"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?></span>
                <del class="text-[18px] text-[#AA90A4] ml-[10px]"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?></del>
              </div>
              <a href="<?php the_permalink(); ?>" class="text-[18px] text-[#96225D] underline">Buy Now</a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>

  </main>
  <!-- end of the loop -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>