<?php

class ETC_CmsVideoPlayer_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_video_player';
    protected $title = 'Video Player';
    protected $icon = 'eicon-play';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_video_player\/layout-image\/layout1.jpg"},"2":{"label":"Layout 2","image":"https:\/\/wp.localserverweb.com\/aaa\/wp-content\/themes\/promina\/elementor\/templates\/widgets\/cms_video_player\/layout-image\/layout2.jpg"}}}]},{"name":"icon_section","label":"Video Player","tab":"content","controls":[{"name":"image","label":"Choose Image","type":"media"},{"name":"video_link","label":"Link","type":"text"},{"name":"description","label":"Description","type":"textarea","label_block":true},{"name":"style","label":"Style","type":"select","default":"default","options":{"default":"Default","large-space":"Large Space"},"condition":{"layout":"2"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}