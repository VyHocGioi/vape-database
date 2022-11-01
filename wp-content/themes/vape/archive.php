<?php get_header(); ?>

<div id="main">
    <section id="main-content">
        <div class="section-tag-category">
            <div class="container">
                <div class="archive-title">
                    <h1>
                        <?php
                        if (is_tag()) :
                            printf(__('Posts Tagged: %1$s', 'vape'), single_tag_title('', false));
                        elseif (is_category()) :
                            printf(__('Posts Categorized: %1$s', 'vape'), single_cat_title('', false));
                        endif;
                        ?>
                    </h1>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article class="post-search-result" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-thumbnail">
                                <?php vape_thumbnail('thumbnail'); ?>
                            </div>
                            <div class="group-post-tag">
                                <div class="entry-header">
                                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                                </div>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>