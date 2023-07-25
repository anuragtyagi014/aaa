<?php

etc_add_custom_widget(
    array(
        'name' => 'cms_pointer',
        'title' => esc_html__('Pointer', 'promina'),
        'icon' => 'eicon-cursor-move',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'number',
                            'label' => esc_html__('Number', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Actvie', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'No',
                                'open' => 'Yes',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'position_top',
                            'label' => esc_html__('Position Top', 'promina' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-pointer1' => 'top: {{TOP}}{{UNIT}};',
                            ],
                            'allowed_dimensions' => [ 'top' ],
                        ),
                        array(
                            'name' => 'position_right',
                            'label' => esc_html__('Position Right', 'promina' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-pointer1' => 'right: {{RIGHT}}{{UNIT}};',
                            ],
                            'allowed_dimensions' => [ 'right' ],
                        ),
                        array(
                            'name' => 'position_bottom',
                            'label' => esc_html__('Position Bottom', 'promina' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-pointer1' => 'bottom: {{BOTTOM}}{{UNIT}};',
                            ],
                            'allowed_dimensions' => [ 'bottom' ],
                        ),
                        array(
                            'name' => 'position_left',
                            'label' => esc_html__('Position Left', 'promina' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-pointer1' => 'left: {{LEFT}}{{UNIT}};',
                            ],
                            'allowed_dimensions' => [ 'left' ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);