<?php
// Register Banner Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_sales_representative',
        'title' => esc_html__('Sales Representative', 'promina' ),
        'icon' => 'eicon-info-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(

        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__('Sales Representative', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'promina' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'phone',
                            'label' => esc_html__('Phone', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'placeholder' => esc_html__('Enter your phone', 'promina' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__('Title', 'promina' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'placeholder' => esc_html__('Enter your title', 'promina' ),
                            'label_block' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);