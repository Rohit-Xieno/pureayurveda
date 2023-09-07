<!-- 

Page Module list

 -->
<?php $GLOBALS['globalINC'] = 1; while (have_rows('page_modules')) : the_row(); ?>
  <?php if (get_row_layout() == 'newsletter') : ?>
  <?php get_template_part('partials/modules/module', 'newsletter'); ?>
    <?php elseif (get_row_layout() == 'icon_row_cta') :  ?>
  <?php get_template_part('partials/modules/module', 'icon_row_cta'); ?>
    <?php elseif (get_row_layout() == 'cta_block_forest_green_background') :  ?>
  <?php get_template_part('partials/modules/module', 'showhome_asms'); ?>
  <?php endif; ?>
<?php $GLOBALS['globalINC']++; endwhile; ?>