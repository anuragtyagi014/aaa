<?php
etc_add_custom_widget(
    array(
        'name' => 'cms_team_grid',
        'title' => esc_html__('Team Grid', 'promina'),
        'icon' => 'eicon-user-circle-o',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_team_grid/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',  
                                'style2' => 'Style 2',  
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Team List', 'promina'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'promina'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'promina'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'promina' ),
                                    'type' => Elementor_Theme_Core::ICONS_CONTROL,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
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
                            'default' => '4',
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
                            'default' => '4',
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
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);