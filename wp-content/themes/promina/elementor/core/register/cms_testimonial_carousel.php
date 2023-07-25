<?php
$slides_to_show = range( 1, 5 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Contact Form 7 Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_testimonial_carousel',
        'title' => esc_html__('Testimonial Carousel', 'promina'),
        'icon' => 'eicon-testimonial-carousel',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(
            'jquery-slick',
            'cms-item-carousel-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__( 'Layout', 'promina' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__( 'Templates', 'promina' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 4', 'promina' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial_carousel/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_clients',
                    'label' => esc_html__('Clients', 'promina'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'clients',
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'client_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'promina' ),
                                    'client_image' => esc_html__( 'Client Image', 'promina' ),
                                    'client_name' => esc_html__( 'John Doe', 'promina' ),
                                    'client_job' => esc_html__( 'Designer', 'promina' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'promina' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'client_content',
                                    'label' => __( 'Content', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => '10',
                                    'default' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                                ),
                                array(
                                    'name' => 'client_image',
                                    'label' => esc_html__('Client Logo/Image', 'promina'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'client_name',
                                    'label' => esc_html__('Client Name', 'promina'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default' => esc_html__( 'John Doe', 'promina' )
                                ),
                                array(
                                    'name'  =>  'client_job',
                                    'label' => __( 'Job', 'promina' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => 'Designer',
                                ),
                                array(
                                    'name' => 'client_link',
                                    'label' => esc_html__('Client URL', 'promina'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                    'placeholder' => esc_html__('http://client-link.com', 'promina'),
                                ),
                            ),
                            'title_field' => '{{{ client_name }}}',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);