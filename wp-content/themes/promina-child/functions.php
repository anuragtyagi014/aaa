<?php

/**
 * Add child styles.
 */
function promina_enqueue_styles()
{
    $parent_style = 'promina-style';
    
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'promina_enqueue_styles');

function my_widget_init() {
register_sidebar(array(
   'name' => 'AR Custom Widget',
   'id' => 'arcustomwidget',
   'description' => 'Left Footer Text',
   'before_widget' => '<div class="arcustomwidget">',
   'after_widget' => '</div>',
   'before_title' => '<h3>',
   'after_title' => '</h3>',
 )
);
}
add_action( 'widgets_init', 'my_widget_init' );

