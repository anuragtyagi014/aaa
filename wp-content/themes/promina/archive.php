<?php
/**
 * The template for displaying archive pages
 *
 * @package Promina
 */

get_header();
$sidebar_pos = promina_get_opt( 'archive_sidebar_pos', 'left' );
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php promina_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
            <?php

                if ( have_posts() )
                {
                    while ( have_posts() )
                    {
                        the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called loop-post-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content' );
                    }

                    promina_posts_pagination();
                }
                else
                {
                    get_template_part( 'template-parts/content', 'none' );
                }

            ?>
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
            <aside id="secondary" <?php promina_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
                <div class="sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
