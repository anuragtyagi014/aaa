<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Promina
 */

/**
 * Setup default image sizes after the theme has been activated
 */
function promina_after_setup_theme()
{

}
add_action( 'after_setup_theme', 'promina_after_setup_theme' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function promina_body_classes( $classes )
{   
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (promina_get_opt( 'site_boxed', false )) {
        $classes[] = 'site-boxed';
    }

    if ( class_exists('WPBakeryVisualComposerAbstract') ) {
        $classes[] = 'visual-composer';
    }

    if (class_exists('ReduxFramework')) {
        $classes[] = 'redux-page';
    }

    $body_default_font = promina_get_opt( 'body_default_font', 'Roboto' );
    $heading_default_font = promina_get_opt( 'heading_default_font', 'Barlow' );

    if($body_default_font == 'Roboto') {
        $classes[] = 'body-default-font';
    }

    if($heading_default_font == 'Barlow') {
        $classes[] = 'heading-default-font';
    }

    if (promina_get_opt( 'sticky_on', false )) {
        $classes[] = 'header-sticky';
    }

    return $classes;
}
add_filter( 'body_class', 'promina_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function promina_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'promina_pingback_header' );
