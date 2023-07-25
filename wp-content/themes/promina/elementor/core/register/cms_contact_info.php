<?php
etc_add_custom_widget(
    array(
        'name' => 'cms_contact_info',
        'title' => esc_html__('Contact Info', 'promina'),
        'icon' => 'eicon-info-circle-o',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_contact_info/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_contact_info',
                    'label' => esc_html__('Contact Info', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'label',
                            'label' => esc_html__('Label', 'promina'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'content',
                            'label' => esc_html__('Content', 'promina'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'cms_icon',
                            'label' => esc_html__('Icon', 'promina' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'fa-solid',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);