<?php get_header(); ?>

<div class="row load-more-target">

    <?php if (have_posts()): 
        while (have_posts()): the_post();
            
            card_for_this_post_type();
            
        endwhile; 
    endif; ?>
    
</div>



<?php get_footer(); ?>