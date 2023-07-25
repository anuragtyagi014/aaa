<?php
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
}

if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$icon_attributes = $widget->get_render_attribute_string( 'selected_icon' );
$link_attributes = $widget->get_render_attribute_string( 'link' );

$widget->add_render_attribute( 'description_text', 'class', 'item--description' );

$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'description_text' );

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-fancy-box-layout2 bg-image <?php echo esc_attr($settings['style']);?>" style="background-image: url(<?php echo esc_url($settings['bg_image']['url']); ?>);">
    <div class="content-inner">
        <h3 class="item--title">
            <?php etc_print_html($settings['title_text']); ?>
        </h3>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'description_text' )); ?>>
            <?php etc_print_html($settings['description_text']); ?>
        </div>
        <?php if(!empty($settings['button_text'])) : ?>
            <div class="item--button">
                <a class="btn-more" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_html($settings['button_text']); ?><i class="fac fac-arrow-right space-right"></i></a>
            </div>
        <?php endif; ?>
    </div>
</div>