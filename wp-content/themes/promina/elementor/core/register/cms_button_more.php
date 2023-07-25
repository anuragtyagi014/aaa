<?php
// Register Button Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_button_more',
        'title' => esc_html__('Button Read More', 'promina' ),
        'icon' => 'eicon-button',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'promina' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'more-primary',
                            'options' => [
                                'more-default' => esc_html__('Default', 'promina' ),
                                'more-white' => esc_html__('White', 'promina' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
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
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);