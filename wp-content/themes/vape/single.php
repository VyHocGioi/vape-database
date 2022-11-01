<?php get_header() ?>
<section class="section-post">
    <div class="container">

        <div class="main-content mb-5">
            <?php if (have_posts()) : ?>
                <?php
                while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="related-post">
            <h2 class="title">Related Post</h2>
            <div class="row justify-content-between mb-md-5 mb-3">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => '4',
                    'paged' => get_query_var('paged'),
                    'order_by' => 'date',
                    'orderby' => 'rand',
                    'post__not_in' => array(get_the_ID()),
                );
                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();
                        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')
                            ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')
                            : THEME . '/dist/images/image-post.jpeg';  ?>
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="block__news__item">
                                <div class="d-md-block d-flex">
                                    <div class="col">
                                        <div class="block__news__image">
                                            <a href="<?php echo get_permalink($article->ID); ?>">
                                                <img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="block__news__content text-black-50 mt-0 mt-md-2">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<!-- <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif; ?> -->