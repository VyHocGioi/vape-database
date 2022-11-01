<?php get_header(); ?>
<div class="page">
    <?php get_sidebar(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
            <h1><?php the_title(); ?></h1>
        <?php endwhile; ?>
        <?php vape_pagination(); ?>
    <?php else : ?>
        <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>