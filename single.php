<?php get_header(); ?>

<main id="primary" class="relative">
<?php
    $single_post_img = get_the_post_thumbnail_url(); ?>
    <article>
<div class="feature-img bg-[url('<?php echo $single_post_img ?>')] bg-no-repeat bg-cover h-[684px] py-[40px]" style="background-image: url('<?php echo $single_post_img ?>');">
<div class="container flex h-[100%] items-end">
<h1 class="text-white text-[46px]"><?php the_title(); ?></h1>
</div>
</div>
    
  <div class="mx-auto container my-10">
  <?php get_single_blog_post_breadcrumb(); ?>
    
    <?php
    while (have_posts()) : the_post();
    ?>
      <div class="single-post-featureImg relative">
        <!-- <img src="</?php echo $single_post_img[0] ?>" alt="customer" class="w-[100%]  object-cover"> -->
        
        </div>
        <?php
        the_content();
        ?>
      
    <?php endwhile; ?>

  </div>
  </article>

  <div id="single_post_wrap"><div class="container"><?php comment_form(); ?></div>  </div>

</div>
<div class="sidebar"><?php dynamic_sidebar('sidebar'); ?></div>
</main>

<?php get_footer(); ?>