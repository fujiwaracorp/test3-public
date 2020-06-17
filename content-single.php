<article <?php queerthm_add_post_classes('full-post', 'has-thumbnail'); ?>> 
    <h2><?php the_title(); ?></h2>
    <div class="post-info"><?php the_date(); ?>
        <span class="queerthm-authors"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></span> | 
        <span class="queerthm-categories"><?php queerthm_separate_categories(); ?></span> | 
        <span class="queerthm-tags"><?php queerthm_separate_tags(); ?>
        </span>
    </div>

    <div class="full-image">
        <?php the_post_thumbnail('queerthm-post-image'); ?>
    </div>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>