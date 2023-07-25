<?php
$widget->add_render_attribute( 'wrapper', 'class', 'cms-button-readmore1' );

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$widget->add_render_attribute( 'button', 'class', 'btn-more '.$settings['style'] );

if ( ! empty( $settings['button_css_id'] ) ) {
    $widget->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
        <span <?php etc_print_html($widget->get_render_attribute_string( 'text' )); ?>><?php echo esc_html($settings['text']); ?><i class="fac fac-arrow-right space-left"></i></span>
    </a>
</div>