<?php get_header(); ?>
    <main id="primary" class="pt-8 lg:pt-16 ">
    <?php
		while (have_posts()) :
			the_post();
		?>

            <header class="entry-header container entry-header--style-1">
				<div class="max-w-screen-md mx-auto">
					<?php the_title('<h1 class="entry-title text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl ">', '</h1>') ?>
				</div>
			</header>

        <div class="container my-10 ">
            <?php get_template_part('template-parts/content-page'); ?>
        </div>

        <?php
		    endwhile; // End of the loop.
		?>
    </main>
<?php get_footer(); ?>
