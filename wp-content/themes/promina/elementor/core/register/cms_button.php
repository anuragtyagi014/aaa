<?php
// Register Button Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_button',
        'title' => esc_html__('Button', 'promina' ),
        'icon' => 'eicon-button',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'promina' ),
                                'btn-secondary' => esc_html__('Secondary', 'promina' ),
                                'btn-outline' => esc_html__('Outline', 'promina' ),
                                'btn-white' => esc_html__('White', 'promina' ),
                                'btn-outline-white' => esc_html__('Outline White', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'size_height',
                            'label' => esc_html__('Size Height', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'size-normal',
                            'options' => [
                                'size-normal' => esc_html__('Normal', 'promina' ),
                                'size-small' => esc_html__('Small', 'promina' ),
                                'size-big' => esc_html__('Big', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click here', 'promina'),
                            'placeholder' => esc_html__('Click here', 'promina'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'promina' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'promina' ),
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'promina' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'promina' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'promina' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'promina' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'promina' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'promina' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'promina' ),
                                'right' => esc_html__('After', 'promina' ),
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Space Left', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                                'icon_align!' => 'left'
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Space Right', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                                'icon_align!' => 'right'
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);