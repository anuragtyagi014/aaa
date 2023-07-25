<?php
$default_settings = [
    'content_list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="cms-career-layout1">
        <?php foreach ($content_list as $key => $value):

        	$title = isset($value['title']) ? $value['title'] : '';
			$time = isset($value['time']) ? $value['time'] : '';
			$address = isset($value['address']) ? $value['address'] : '';
			$description = isset($value['description']) ? $value['description'] : '';
			$button_text = isset($value['button_text']) ? $value['button_text'] : '';
			$button_link = isset($value['button_link']) ? $value['button_link'] : '';

        	$link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
        	if ( ! empty( $button_link['url'] ) ) {
			    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

			    if ( $button_link['is_external'] ) {
			        $widget->add_render_attribute( $link_key, 'target', '_blank' );
			    }

			    if ( $button_link['nofollow'] ) {
			        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
			    }
			}
			$link_attributes = $widget->get_render_attribute_string( $link_key );
        	?>
            <div class="cms-career-item">
                <div class="item--inner">
         			<div class="item-holder">
	    		        <div class="item--meta">
	    		        	<div class="item-time"><?php echo esc_attr($time); ?></div>
	    		        	<div class="item-address"><?php echo esc_attr($address); ?></div>
	    		        </div>
	    		       	<h3 class="item--title">	
	                		<?php echo esc_attr($title); ?>
	    		        </h3>
	    		    </div>
	    		    <div class="item-desc">
	    		    	<?php echo wp_kses_post($description); ?>
	    		    </div>
    		        <?php if(!empty($button_text)) : ?>
	    		        <div class="item-button">
	    		        	<a class="btn btn-outline" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($button_text); ?></a>
	    		        </div>
	    		    <?php endif; ?>
               </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
