<?php get_header(); ?>

<div id="main">
    <section id="main-content">
        <div class="section-tag-category">
            <div class="container">
                <div class="search-info">
                    <!--Sử dụng query để hiển thị số kết quả tìm kiếm được tìm thấy
                            Cũng như hiển thị từ khóa tìm kiếm. Từ khóa tìm kiếm cũng
                            có thể hiển thị được với hàm get_search_query()-->
                    <h1><?php
                        $search_query = new WP_Query('s=' . $s . '&showposts=-1');
                        $search_keyword = wp_specialchars($s, 1);
                        $search_count = $search_query->post_count;
                        // var_dump( $search_query );
                        printf(__('Search results for <strong>%1$s</strong>. We found <strong>%2$s</strong> articles for you.', 'vape'), $search_keyword, $search_count);
                        ?></h1>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article class="post-search-result" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-thumbnail">
                                <?php vape_thumbnail('thumbnail'); ?>
                            </div>
                            <div class="group-post-tag">
                                <div class="entry-header">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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