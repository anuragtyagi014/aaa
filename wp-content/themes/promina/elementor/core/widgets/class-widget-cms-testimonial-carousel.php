<?php

class ETC_CmsTestimonialCarousel_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_testimonial_carousel';
    protected $title = 'Testimonial Carousel';
    protected $icon = 'eicon-testimonial-carousel';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 4","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_testimonial_carousel\/layout-image\/layout1.jpg"}}}]},{"name":"section_clients","label":"Clients","tab":"content","controls":[{"name":"clients","type":"repeater","default":[{"client_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","client_image":"Client Image","client_name":"John Doe","client_job":"Designer","client_link":"http:\/\/client-link.com"}],"controls":[{"name":"client_content","label":"Content","type":"textarea","rows":"10","default":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"name":"client_image","label":"Client Logo\/Image","type":"media","label_block":true},{"name":"client_name","label":"Client Name","type":"text","label_block":true,"default":"John Doe"},{"name":"client_job","label":"Job","type":"text","default":"Designer"},{"name":"client_link","label":"Client URL","type":"url","label_block":true,"placeholder":"http:\/\/client-link.com"}],"title_field":"{{{ client_name }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-item-carousel-js' );
}