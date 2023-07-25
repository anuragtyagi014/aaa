<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Promina
 */

$icon_image = get_post_meta(get_the_ID(), 'project_icon',true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-body post-type-project">
        <div class="project-meta">
            <?php if (has_post_thumbnail()) { ?>
                <div class="post-image"><?php the_post_thumbnail('full'); ?></div>
            <?php } ?>
            <div class="post-data">
                <?php
                if (!empty($icon_image['url']) ){
                    ?>
                    <div class="project-icon-wrap">
                        <div class="project-icon">
                            <img src="<?php echo esc_url($icon_image['url']); ?>" alt="<?php echo esc_attr($icon_image['alt']); ?>">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <h2 class="entry-title">
                    <?php the_title(); ?>
                </h2>
                <div class="item-category"><?php the_terms( $post->ID, 'project-category', '', ', ' ); ?></div>
            </div>
        </div>
        <div class="entry-content clearfix">
            <?php
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <div class="project-tags-share">
            <?php
            promina_entry_tagged_in();
            promina_socials_share_default();
            ?>
        </div>
        <div class="project-related">
            <?php promina_project_related_post(); ?>
        </div>
    </div>
</article><!-- #post -->