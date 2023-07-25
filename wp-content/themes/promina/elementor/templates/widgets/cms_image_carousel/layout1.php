
<?php if(isset($settings['images']) && !empty($settings['images']) && count($settings['images'])): ?>
    <div class="cms-image-carousel nav-style-light">
        <div class="cms-image-carousel-inner">
            <div class="cms-slick-carousel">
                <?php foreach ($settings['images'] as $image): 
                    $img          = etc_get_image_by_size( array(
                        'attach_id'  => $image['item_image']['id'],
                        'thumb_size' => 'full',
                        'class'      => '',
                    ) );
                    $thumbnail    = $img['thumbnail'];
                    $url = !empty($image['image_link']['id'])?$image['image_link']['id']:'#';
                    $target = !empty($image['image_link']['is_external']);
                    $rel = !empty($image['image_link']['nofollow']);
                    if(!empty($image['item_image']['id'])){ ?>
                        <div class="slick-slide">
                            <div class="item-image">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
