<?php

class ETC_CmsIconBox_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_icon_box';
    protected $title = 'Icon Box';
    protected $icon = 'eicon-icon-box';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/promina\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_icon_box\/layout-image\/layout1.jpg"}}}]},{"name":"icon_section","label":"Icon Box","tab":"content","controls":[{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"title_text","label":"Title &amp; Description","type":"text","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"link","label":"Link","type":"url"},{"name":"title_size","label":"Title HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div","span":"span","p":"p"},"default":"h3"}]},{"name":"section_style_icon","label":"Icon Style","tab":"style","condition":{"icon!":""},"controls":[{"name":"icon_colors","control_type":"tab","tabs":[{"name":"icon_colors_normal","label":"Normal","controls":[{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .cms-icon-box-wrapper .elementor-icon":"color: {{VALUE}};"}}]},{"name":"icon_colors_hover","label":"Hover","controls":[{"name":"hover_icon_color","label":"Hover Icon Color","type":"color","selectors":{"{{WRAPPER}} .cms-icon-box-wrapper:hover .elementor-icon":"color: {{VALUE}};"}},{"name":"hover_animation","label":"Hover Animation","type":"hover_animation"}]}]},{"name":"icon_space","label":"Spacing","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":15},"range":{"px":{"min":15,"max":100}},"selectors":{"{{WRAPPER}} .cms-icon-box-layout1 .cms-icon-box-icon":"margin-bottom: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-icon-box-layout2 .cms-icon-box-icon":"margin-right: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-icon-box-layout3 .cms-icon-box-icon":"margin-right: {{SIZE}}{{UNIT}};"}},{"name":"icon_size","label":"Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":6,"max":300}},"selectors":{"{{WRAPPER}} .elementor-icon":"font-size: {{SIZE}}{{UNIT}};"}},{"name":"icon_padding","label":"Padding","type":"slider","size_units":["em"],"range":{"em":{"min":0,"max":5}},"default":{"size":0,"unit":"em"},"condition":{"view!":"default"},"selectors":{"{{WRAPPER}} .elementor-icon":"padding: {{SIZE}}{{UNIT}};"}},{"name":"rotate","label":"Rotate","type":"slider","size_units":["deg"],"range":{"deg":{"min":0,"max":360}},"default":{"size":0,"unit":"deg"},"selectors":{"{{WRAPPER}} .elementor-icon i":"transform: rotate({{SIZE}}{{UNIT}});"}}]},{"name":"section_style_content","label":"Content","tab":"style","controls":[{"name":"text_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"selectors":{"{{WRAPPER}} .cms-icon-box-wrapper":"text-align: {{VALUE}};"}},{"name":"content_vertical_alignment","label":"Vertical Alignment","type":"select","options":{"top":"Top","middle":"Middle","bottom":"Bottom"},"prefix_class":"elementor-vertical-align-","default":"top"},{"name":"heading_title","label":"Title","type":"heading","separator":"before"},{"name":"title_bottom_space","label":"Spacing","type":"slider","size_units":["px"],"range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-icon-box-title":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"title_color","label":"Color","type":"color","size_units":["px","%"],"selectors":{"{{WRAPPER}} .cms-icon-box-title":"color: {{VALUE}};","{{WRAPPER}} .cms-icon-box-title a":"color: {{VALUE}};"}},{"name":"title_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-icon-box-title"},{"name":"heading_description","label":"Description","type":"heading","separator":"before"},{"name":"description_color","label":"Color","type":"color","default":"#ccc","size_units":["px","%"],"selectors":{"{{WRAPPER}} .cms-icon-box-description":"color: {{VALUE}};"}},{"name":"description_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-icon-box-description"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}