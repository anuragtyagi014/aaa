<?php

class ETC_CmsHeading_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_heading';
    protected $title = 'Heading';
    protected $icon = 'eicon-heading';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_heading\/layout-image\/layout1.jpg"}}}]},{"name":"title_section","label":"Custom Heading","tab":"content","controls":[{"name":"heading_text","label":"Heading","type":"textarea","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"subheading_text","label":"Sub Heading","type":"text","placeholder":"Enter your sub title","label_block":true},{"name":"sub_type","label":"Sub Heading Type","type":"select","options":{"default":"Default","line-before":"Line Before"},"default":"default"},{"name":"description_text","label":"Description","type":"textarea","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"link","label":"Link","type":"url"},{"name":"heading_size","label":"Heading HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div","span":"span","p":"p"},"default":"h2"}]},{"name":"section_style_content","label":"Content Alignment","tab":"style","controls":[{"name":"text_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"}},"selectors":{"{{WRAPPER}} .cms-heading-wrapper":"text-align: {{VALUE}};"}}]},{"name":"section_style_heading","label":"Heading Style","tab":"style","controls":[{"name":"heading_color","label":"Heading Color","type":"color","selectors":{"{{WRAPPER}} .custom-heading":"color: {{VALUE}};"}},{"name":"heading_top_space","label":"Top Spacing","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":0},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .cms-heading-wrapper .custom-heading":"margin-top: {{SIZE}}{{UNIT}};"}},{"name":"heading_bottom_space","label":"Bottom Spacing","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":15},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .cms-heading-wrapper .custom-heading":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"heading_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .custom-heading"}]},{"name":"section_style_subheading","label":"Sub Heading Style","tab":"style","controls":[{"name":"subheading_color","label":"Sub Heading Color","type":"color","selectors":{"{{WRAPPER}} .custom-subheading":"color: {{VALUE}};","{{WRAPPER}} .custom-subheading.line-before:before":"background-color: {{VALUE}};"}},{"name":"subheading_bottom_space","label":"Bottom Spacing","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":9},"range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-heading-wrapper .custom-subheading":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"subheading_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .custom-subheading"}]},{"name":"section_style_description","label":"Description Style","tab":"style","controls":[{"name":"heading_description","label":"Description","type":"heading","separator":"before"},{"name":"description_color","label":"Color","type":"color","default":"","size_units":["px","%"],"selectors":{"{{WRAPPER}} .custom-heading-description":"color: {{VALUE}};"}},{"name":"description_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .custom-heading-description"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}