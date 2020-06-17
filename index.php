<?php get_header(); ?>
<div id="queerthm-content" class="queerthm-content" tabindex="-1">
    <div class="columns">
        <main class="main-column">
            <?php
            if (have_posts()) :
            while (have_posts()) : the_post();
            get_template_part('content', get_post_format());
            endwhile; ?>
            <div class="pagination">
                <?php the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => esc_html__( 'Previous Page', 'queer' ),
    'next_text' => esc_html__( 'Next Page', 'queer' ),
) ); ?>
            </div>
            <?php
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
