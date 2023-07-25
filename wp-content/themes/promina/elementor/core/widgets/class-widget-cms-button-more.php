<?php

class ETC_CmsButtonMore_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_button_more';
    protected $title = 'Button Read More';
    protected $icon = 'eicon-button';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"more-primary","options":{"more-default":"Default","more-white":"White"}},{"name":"text","label":"Text","type":"text"},{"name":"link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"}},{"name":"align","label":"Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"}},"prefix_class":"elementor-align-","default":""}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}