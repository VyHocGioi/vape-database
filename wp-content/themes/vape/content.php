<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php vape_thumbnail('thumbnail'); ?>
    </div>
    <header class="entry-header">
        <?php vape_entry_header(); ?>
        <?php vape_entry_meta() ?>
    </header>
    <div class="entry-content">
        <?php vape_entry_content(); ?>
        <?php (is_single() ? vape_entry_tag() : ''); ?>
    </div>
</article>