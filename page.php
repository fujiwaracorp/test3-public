<?php get_header(); ?>
<div id="queerthm-content" class="queerthm-content" tabindex="-1">
    <div class="columns">
        <main class="main-column">
            <?php
            if (have_posts()) :
            while (have_posts()) : the_post();

            if(!function_exists('queerthm_pages_wrap')) {
                function queerthm_pages_wrap() { ?>
            <article <?php queerthm_add_post_classes('post', 'has-thumbnail'); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php }
                queerthm_pages_wrap();
            }

            endwhile;
            else : ?>
            <p class="no-content">
                <?php esc_html_e( 'Content not found.' , 'queer' ); ?>
            </p>
            <?php
            endif;
            ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
