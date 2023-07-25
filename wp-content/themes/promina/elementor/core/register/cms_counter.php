<?php
//Register Counter Widget
 etc_add_custom_widget(
    array(
        'name' => 'cms_counter',
        'title' => esc_html__('Counter', 'promina'),
        'icon' => 'eicon-counter-circle',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(
            'jquery-numerator',
            'cms-counter-widget-js',
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
                            'prefix_class' => 'cms-counter-layout',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_counter',
                    'label' => esc_html__('Counter', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'promina'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'promina'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'promina'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'placeholder' => '1',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'promina'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'placeholder' => '+',
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Animation Duration', 'promina'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min' => 100,
                            'step' => 100,
                        ),
                        array(
                            'name' => 'thousand_separator',
                            'label' => esc_html__('Thousand Separator', 'promina'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Separator', 'promina'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'thousand_separator' => 'true',
                            ],
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'promina'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'default' => esc_html__('Counter', 'promina' ),
                            'placeholder' => esc_html__('Counter Title', 'promina' ),
                        ),
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'promina'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => esc_html__('Icon', 'promina'),
                                'image' => esc_html__('Image', 'promina'),
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'show_icon' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'counter_icon',
                            'label' => esc_html__('Icon', 'promina' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'show_icon' => 'true',
                                'icon_type' => 'icon'
                            ]
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__('Icon Image', 'promina' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'default' => '',
                            'condition' => [
                                'show_icon' => 'true',
                                'icon_type' => 'image'
                            ]
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'promina' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'show_icon' => 'true',
                                'icon_type' => 'icon'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-counter-icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_number',
                    'label' => esc_html__('Number', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Text Color', 'promina' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-counter-number-wrapper' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-counter-number-wrapper',
                        ),
                        array(
                            'name' => 'counter_padding',
                            'label' => esc_html__('Padding', 'promina' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .cms-counter-number-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__('Title', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Text Color', 'promina' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-counter-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography_title',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-counter-title',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);