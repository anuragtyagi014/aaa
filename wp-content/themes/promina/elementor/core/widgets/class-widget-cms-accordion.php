<?php

class ETC_CmsAccordion_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_accordion';
    protected $title = 'Accordion';
    protected $icon = 'eicon-accordion';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_accordion\/layout-image\/layout1.jpg"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"active_section","label":"Active section","type":"number","separator":"after"},{"name":"cms_accordion","label":"Accordion Items","type":"repeater","default":[{"ac_title":"Accordion #1","ac_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"ac_title":"Accordion #2","ac_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."}],"controls":[{"name":"ac_title","label":"Title","type":"text"},{"name":"ac_content","label":"Content","type":"textarea","rows":10}],"title_field":"{{{ ac_title }}}","separator":"after"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-accordion-widget-js' );
}