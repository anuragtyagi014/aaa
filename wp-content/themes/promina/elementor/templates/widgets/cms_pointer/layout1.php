<?php
$default_settings = [
    'number' => '',
    'title' => '',
    'active' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings); ?>
<div class="cms-pointer1">
    <div class="cms-pointer-btn <?php echo esc_attr($active); ?>">+</div>
    <div class="cms-pointer-holder">
        <span><?php echo esc_attr($number); ?></span>
        <h3><?php echo esc_attr($title); ?></h3>
    </div>
</div>