<?php get_header(); ?>
<main id="primary" class="relative">
   <?php
   $single_post_img = get_the_post_thumbnail_url(); ?>
   <div class="feature-img bg-[url('<?php echo $single_post_img ?>')] bg-no-repeat bg-cover h-[684px] py-[40px]"
      style="background-image: url('<?php echo $single_post_img ?>');">
      <div class="container flex h-[100%] items-end">
         <h1 class="text-white text-[46px]">
            <?php the_title(); ?>
         </h1>
      </div>
   </div>
   <div class="mx-auto container my-10 flex gap-10">
      <div class="post-content w-[60%]">
         <article>
            <?php /* get_single_blog_post_breadcrumb(); */?>
            <?php while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; ?>
         </article>
         <div class="social-post-sidebar flex items-center mt-12">
            <?php dynamic_sidebar('social-share-sidebar'); ?>
         </div>
         <div class="about-author border-b border-[#c8c8c8] py-5 mb-8">
            <h3 class="text-[22px] text-[#96225d]">About Author</h3>
            <?php echo wpautop(get_the_author_meta('description')); ?>
         </div>
         <div id="single_post_wrap">
            <?php comment_form(); ?>
         </div>
      </div>
      <div class="single-post-sidebar w-[40%]">
         <?php dynamic_sidebar('sidebar'); ?>

         <?php $pa_form = get_field('pa_form'); ?>
         <div class="w-<?php if ($pa_form != '')
            echo '[50%]';
         else
            echo '[90%]'; ?>">
            <?php echo $pa_form ?>
         </div>
         <?php if ($pa_form != ''): ?>
         <?php else: ?>
            <div class="w-<?php if ($pa_form != '')
               echo '[50%]';
            else
               echo '[90%]'; ?>">no contact form here</div>
         <?php endif; ?>

      </div>
   </div>
   <!-- </div> -->
</main>
<?php get_footer(); ?>