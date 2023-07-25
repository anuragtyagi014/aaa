<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Contact Form 7 Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_image_carousel',
        'title' => esc_html__('Image Carousel', 'promina'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(
            'jquery-slick',
            'cms-image-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_images',
                    'label' => esc_html__('Images', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Select Image', 'promina'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'item_image' => esc_html__('Client Image', 'promina' ),
                                ],
                                [
                                    'item_image' => esc_html__('Client Image', 'promina' ),
                                ],
                                [
                                    'item_image' => esc_html__('Client Image', 'promina' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'item_image',
                                    'label' => esc_html__('Item Image', 'promina'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);