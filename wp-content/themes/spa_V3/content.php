<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-thumbnail">
                        <?php quangan_thumbnail('thumbnail'); ?>
        </div>
        <header class="entry-header">
                        <?php quangan_entry_header(); ?>
                        <?php quangan_entry_meta() ?>
        </header>
                <div class="entry-content">
                        <?php quangan_entry_content(); ?>
                        <?php ( is_single() ? quangan_entry_tag() : '' ); ?>
                </div>
</article>