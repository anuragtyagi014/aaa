<?php

// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'promina')] = 0;
    }


    etc_add_custom_widget(
        array(
            'name' => 'cms_ctf7',
            'title' => esc_html__('Contact Form 7', 'promina'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
            'scripts' => array(),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'source_section',
                        'label' => esc_html__('Source Settings', 'promina'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Style', 'promina' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style1' => 'Style 1',
                                ],
                                'default' => 'style1',
                            ),
                            array(
                                'name' => 'ctf7_title',
                                'label' => esc_html__('Title', 'promina' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                                'condition' => [
                                    'style' => 'style2',
                                ],
                            ),
                            array(
                                'name' => 'ctf7_description',
                                'label' => esc_html__('Description', 'promina' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'rows' => 10,
                                'show_label' => false,
                                'condition' => [
                                    'style' => 'style2',
                                ],
                            ),
                            array(
                                'name' => 'ctf7_id',
                                'label' => esc_html__('Select Form', 'promina'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}