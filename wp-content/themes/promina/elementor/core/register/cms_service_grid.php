<?php
// Post term options
$post_term_options = etc_get_grid_term_options('service');

// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_service_grid',
        'title' => esc_html__('Service Grid', 'promina' ),
        'icon' => 'eicon-posts-justified',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'cms-post-grid-widget-js',
        ],
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service_grid/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service_grid/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service_grid/layout-image/layout3.jpg'
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
                    ),
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'promina' ),
                                'false' => esc_html__('Disable', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'promina' ),
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_alignment',
                            'label' => esc_html__('Filter Alignment', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'center',
                            'options' => [
                                'center' => esc_html__('Center', 'promina' ),
                                'left' => esc_html__('Left', 'promina' ),
                                'right' => esc_html__('Right', 'promina' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'promina' ),
                                'loadmore' => esc_html__('Loadmore', 'promina' ),
                                'false' => esc_html__('Disable', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Item Gap', 'promina' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default' => 15,
                            'selectors' => [
                                '{{WRAPPER}} .cms-grid .cms-grid-inner' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                                '{{WRAPPER}} .cms-grid .grid-item' => 'padding-left: {{VALUE}}px; padding-right: {{VALUE}}px;',
                                '{{WRAPPER}} .cms-grid .grid-sizer' => 'padding-left: {{VALUE}}px; padding-right: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'promina' ),
                                '2' => esc_html__('2', 'promina' ),
                                '3' => esc_html__('3', 'promina' ),
                                '4' => esc_html__('4', 'promina' ),
                                '6' => esc_html__('6', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => esc_html__('1', 'promina' ),
                                '2' => esc_html__('2', 'promina' ),
                                '3' => esc_html__('3', 'promina' ),
                                '4' => esc_html__('4', 'promina' ),
                                '6' => esc_html__('6', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'promina' ),
                                '2' => esc_html__('2', 'promina' ),
                                '3' => esc_html__('3', 'promina' ),
                                '4' => esc_html__('4', 'promina' ),
                                '6' => esc_html__('6', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'promina' ),
                                '2' => esc_html__('2', 'promina' ),
                                '3' => esc_html__('3', 'promina' ),
                                '4' => esc_html__('4', 'promina' ),
                                '6' => esc_html__('6', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'promina' ),
                                '2' => esc_html__('2', 'promina' ),
                                '3' => esc_html__('3', 'promina' ),
                                '4' => esc_html__('4', 'promina' ),
                                '6' => esc_html__('6', 'promina' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Options', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'show_thumbnail',
                            'label' => esc_html__('Show Thumbnail', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'separator' => 'after',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'show_title',
                            'label' => esc_html__('Show Title', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'promina'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default'       => 'h3',
                            'options'       => [
                                'h1'    => 'H1',
                                'h2'    => 'H2',
                                'h3'    => 'H3',
                                'h4'    => 'H4',
                                'h5'    => 'H5',
                                'h6'    => 'H6',
                            ],
                            'condition' => [
                                'show_title' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'promina' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Action Button', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Read more', 'promina'),
                            'condition' => [
                                'show_button' => 'true',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'bg_image',
                            'label' => esc_html__('Item Overlay Image', 'promina'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);