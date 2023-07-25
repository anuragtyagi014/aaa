<?php
if ( ! empty( $settings['image']['url'] ) ) {
    $widget->add_render_attribute( 'image', 'src', $settings['image']['url'] );
    $widget->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
    $widget->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
}

$image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
?>
<div class="cms-video-player layout2">
    <?php if ( ! empty( $settings['image']['url'] ) ) { echo wp_kses_post($image_html); } ?>
    <?php if(!empty($settings['video_link'])) : ?>
        <div class="video-content <?php echo esc_attr($settings['style']);?>">
            <a class="cms-video-button" href="<?php echo esc_url($settings['video_link']); ?>">
                <i class="fac fac-play"></i>
            </a>
            <div class="bottom-content">
                <?php
                if (!empty($settings['description'])){
                    ?><p class="description"><?php echo wp_kses_post($settings['description']) ;?></p><?php
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>