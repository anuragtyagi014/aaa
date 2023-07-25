<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-box-inner',
] );
$widget->add_render_attribute( 'carousel', [
    'class' => 'cms-slick-carousel',
    'data-arrows' => $settings['arrows'],
    'data-dots' => $settings['dots'],
    'data-pauseOnHover' => $settings['pause_on_hover'],
    'data-autoplay' => $settings['autoplay'],
    'data-autoplaySpeed' => $settings['autoplay_speed'],
    'data-infinite' => $settings['infinite'],
    'data-speed' => $settings['speed'],
    'data-slidesToShow' => 1,
    'data-slidesToShowTablet' => 1,
    'data-slidesToShowMobile' => 1,
    'data-slidesToScroll' => 1,
    'data-slidesToScrollTablet' => 1,
    'data-slidesToScrollMobile' => 1,
] );
$arrow_class = '';
if ($settings['arrows']){
    $arrow_class = 'show-arrow';
}
?>
<?php if(isset($settings['boxs']) && !empty($settings['boxs']) && count($settings['boxs'])): ?>
    <div class="cms-location-carousel cms-slick-slider <?php echo esc_attr($arrow_class);?>">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['boxs'] as $box):?>
                    <div class="slick-slide">
                        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
                            <div class="box-subtitle">
                                <?php
                                if (!empty($box['box_text_sub'])){
                                    ?><?php echo esc_html($box['box_text_sub']);?><?php
                                }
                                ?>
                            </div>
                            <div class="box-title">
                                <?php
                                if (!empty($box['box_text_title'])){
                                    ?><h4><?php echo esc_html($box['box_text_title']);?></h4><?php
                                }
                                ?>
                            </div>
                            <div class="box-text">
                                <?php
                                if (!empty($box['box_text'])){
                                    ?><?php etc_print_html($box['box_text']);?><?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
<?php endif; ?>
