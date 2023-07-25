<?php
// Register Accordion Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_accordion',
        'title' => esc_html__('Accordion', 'promina' ),
        'icon' => 'eicon-accordion',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'cms-accordion-widget-js'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_accordion/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active_section',
                            'label' => esc_html__('Active section', 'promina' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'cms_accordion',
                            'label' => esc_html__('Accordion Items', 'promina' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'ac_title' => esc_html__('Accordion #1', 'promina' ),
                                    'ac_content' => esc_html__('Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'promina' ),
                                ],
                                [
                                    'ac_title' => esc_html__('Accordion #2', 'promina' ),
                                    'ac_content' => esc_html__('Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'promina' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'ac_title',
                                    'label' => esc_html__('Title', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'ac_content',
                                    'label' => esc_html__('Content', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ ac_title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);