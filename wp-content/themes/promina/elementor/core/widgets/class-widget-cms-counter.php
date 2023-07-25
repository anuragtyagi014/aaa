<?php

class ETC_CmsCounter_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_counter';
    protected $title = 'Counter';
    protected $icon = 'eicon-counter-circle';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","prefix_class":"cms-counter-layout","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_counter\/layout-image\/layout1.jpg"}}}]},{"name":"section_counter","label":"Counter","tab":"content","controls":[{"name":"starting_number","label":"Starting Number","type":"number","default":1},{"name":"ending_number","label":"Ending Number","type":"number","default":100},{"name":"prefix","label":"Number Prefix","type":"text","default":"","placeholder":"1"},{"name":"suffix","label":"Number Suffix","type":"text","default":"","placeholder":"+"},{"name":"duration","label":"Animation Duration","type":"number","default":2000,"min":100,"step":100},{"name":"thousand_separator","label":"Thousand Separator","type":"switcher","default":"true"},{"name":"thousand_separator_char","label":"Separator","type":"select","condition":{"thousand_separator":"true"},"options":{"":"Default",".":"Dot"," ":"Space"},"default":""},{"name":"title","label":"Title","type":"textarea","label_block":true,"default":"Counter","placeholder":"Counter Title"},{"name":"show_icon","label":"Show Icon","type":"switcher","default":"false"},{"name":"icon_type","label":"Icon Type","type":"select","options":{"icon":"Icon","image":"Image"},"default":"icon","condition":{"show_icon":"true"}},{"name":"counter_icon","label":"Icon","type":"icons","fa4compatibility":"icon","condition":{"show_icon":"true","icon_type":"icon"}},{"name":"icon_image","label":"Icon Image","type":"media","default":"","condition":{"show_icon":"true","icon_type":"image"}},{"name":"icon_color","label":"Icon Color","type":"color","condition":{"show_icon":"true","icon_type":"icon"},"selectors":{"{{WRAPPER}} .cms-counter-icon i":"color: {{VALUE}};"}}]},{"name":"section_number","label":"Number","tab":"style","controls":[{"name":"number_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .cms-counter-number-wrapper":"color: {{VALUE}};"}},{"name":"number_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-counter-number-wrapper"},{"name":"counter_padding","label":"Padding","type":"dimensions","size_units":["px"],"control_type":"responsive","selectors":{"{{WRAPPER}} .cms-counter-number-wrapper":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"section_title","label":"Title","tab":"style","controls":[{"name":"title_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .cms-counter-title":"color: {{VALUE}};"}},{"name":"typography_title","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-counter-title"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-numerator','cms-counter-widget-js' );
}