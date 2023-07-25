<?php
if(isset($settings['clients']) && !empty($settings['clients']) && count($settings['clients'])): ?>
    <div class="cms-testimonial-carousel-syncing">
        <div class="client-wrap">
            <div class="client-info">
                <?php foreach ($settings['clients'] as $client): ?>
                    <div class="client-info-item">
                        <div class="client-image">
                            <?php
                            if(!empty($client['client_image']['id'])){
                                echo wp_get_attachment_image($client['client_image']['id']);
                            }
                            else{
                                ?>
                                <img src="<?php echo esc_url($client['client_image']['url']); ?>" alt="<?php echo esc_attr($client['client_name']); ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="name-job">
                            <div class="client-name font-smooth">
                                <?php
                                if (!empty($client['client_link']['id'])){
                                    $url = !empty($client['client_link']['id'])?$client['client_link']['id']:'#';
                                    $target = !empty($client['client_link']['is_external']);
                                    $rel = !empty($client['client_link']['nofollow']);
                                    ?>
                                    <a class="name-text" href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?>>
                                        <?php echo esc_html($client['client_name']); ?>
                                    </a>
                                    <?php
                                }else{
                                    ?> <h5 class="name-text"><?php echo esc_html($client['client_name']);?></h5> <?php
                                }
                                ?>
                            </div>
                            <div class="client-job">
                                <?php
                                if(!empty($client['client_job'])){
                                    ?>
                                    <p><?php echo esc_html($client['client_job']); ?></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="client-said">
                <?php foreach ($settings['clients'] as $client): ?>
                    <?php
                    if(!empty($client['client_content'])){
                        ?>
                        <div class="client-content-item font-smooth">
                            <?php
                            if(!empty($client['client_content'])){
                                ?>
                                <p><?php echo esc_html($client['client_content']); ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
