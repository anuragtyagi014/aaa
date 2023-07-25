<?php

class ETC_CmsImageCarousel_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_image_carousel';
    protected $title = 'Image Carousel';
    protected $icon = 'eicon-posts-carousel';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"section_images","label":"Images","tab":"content","controls":[{"name":"images","label":"Select Image","type":"repeater","default":[{"item_image":"Client Image"},{"item_image":"Client Image"},{"item_image":"Client Image"}],"controls":[{"name":"item_image","label":"Item Image","type":"media","label_block":true}]}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-image-carousel-widget-js' );
}