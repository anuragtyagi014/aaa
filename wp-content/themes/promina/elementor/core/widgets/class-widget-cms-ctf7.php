<?php

class ETC_CmsCtf7_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_ctf7';
    protected $title = 'Contact Form 7';
    protected $icon = 'eicon-form-horizontal';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"ctf7_title","label":"Title","type":"text","label_block":true,"condition":{"style":"style2"}},{"name":"ctf7_description","label":"Description","type":"textarea","rows":10,"show_label":false,"condition":{"style":"style2"}},{"name":"ctf7_id","label":"Select Form","type":"select","options":{"4279":"Service Contact Form","5":"Contact form","2943":"Contact 3 column","2692":"Contact Form Contact","8":"Contact form 1","3598":"Main Contact Form"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}