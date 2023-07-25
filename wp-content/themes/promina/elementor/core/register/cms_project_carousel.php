<?php
// Post term options
$post_term_options = etc_get_grid_term_options('project');
$slides_to_show = range( 1, 3 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
// Register Post Carousel Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_project_carousel',
        'title' => esc_html__('Project Carousel', 'promina' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'jquery-slick',
            'cms-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'promina' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_project_carousel/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_project_carousel/layout-image/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',
                        ),
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__('Date', 'promina' ),
                                'ID' => esc_html__('ID', 'promina' ),
                                'author' => esc_html__('Author', 'promina' ),
                                'title' => esc_html__('Title', 'promina' ),
                                'rand' => esc_html__('Random', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Sort Order', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__('Descending', 'promina' ),
                                'asc' => esc_html__('Ascending', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'promina' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'promina' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 35,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter by categories', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'promina' ),
                                'false' => esc_html__('Disable', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Default Title', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'promina' ),
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_alignment',
                            'label' => esc_html__('Alignment', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Left', 'promina' ),
                                'center' => esc_html__('Center', 'promina' ),
                                'right' => esc_html__('Right', 'promina' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'slides_to_show',
                            'label' => esc_html__('Slides to Show', 'promina'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                    '' => esc_html__('Default', 'promina' ),
                                ] + $slides_to_show,
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to Scroll', 'promina'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                    '' => esc_html__('Default', 'promina' ),
                                ] + $slides_to_show,
                            'condition' => [
                                'slides_to_show!' => '1',
                            ],
                        ),
                        array(
                            'name' => 'slides_gutter',
                            'label' => esc_html__('Gutter', 'promina'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default' => 15,
                            'condition' => [
                                'slides_to_show!' => '1',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-slick-carousel .slick-list .slick-slide' => 'padding: 0 {{VALUE}}px;',
                                '{{WRAPPER}} .cms-slick-carousel .slick-list' => 'margin: 0 -{{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'promina'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'promina'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'promina'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);