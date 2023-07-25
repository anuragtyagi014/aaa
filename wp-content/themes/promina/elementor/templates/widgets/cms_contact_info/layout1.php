<?php
extract($settings);
$has_icon = ! empty( $settings['cms_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['cms_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$icon_tag = 'span';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-contact-info layout1">
    <div class="info-item">
        <?php if ( $has_icon ) : ?>
            <div class="item--icon">
                <?php
                if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['cms_icon'], [ 'aria-hidden' => 'true' ] );
                    ?>
                <?php else: ?>
                    <i <?php etc_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="info-meta">
            <h6><?php echo esc_attr($settings['label']); ?></h6>
            <?php echo wp_kses_post($settings['content'])?>
        </div>
    </div>
</div>
