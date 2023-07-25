<?php
/**
 * 'slick-slider' Design 3 Shortcodes HTML
 *
 * @package WP Slick Slider and Image Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

$slider_img = wpsisac_get_post_featured_image( $post->ID, $sliderimage_size, true );
$sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );
?>
<div class="wpsisac-image-slide">
	<div class="wpsisac-slide-wrap" <?php echo $slider_height_css ; ?>>	
		<a href="<?php echo esc_url($sliderurl); ?>" class="wpsisac-slider-readmore">
			<img <?php if($lazyload) { ?> data-lazy="<?php echo esc_url($slider_img); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($slider_img); } ?>" alt="<?php the_title(); ?>" />
		</a>
		<div class="wpsisac-slider-content">
			<div class="wpsisac-bg-overlay wp-medium-7 wpcolumns">
				<h2 class="wpsisac-slide-title">
					<!--<a style="color:#fff;" href="<?php //echo esc_url($sliderurl); ?>" class="wpsisac-slider-readmore"><?php //the_title(); ?></a>-->
					<?php the_title(); ?>
				</h2>
				<?php if($show_content) { ?>
					<div class="wpsisac-slider-short-content"><?php the_content(); ?></div>
				<?php }
				$sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );
				?>
				
				<?php //echo $sliderurl;?>

<?php
				if($sliderurl != '') { ?>
					<div class="wpsisac-readmore ">
							<a class="cms-video-button wpsisac-slider-readmore" href="<?php echo $sliderurl;?>">
							</a>

						<!-- <a class="video-btn wpsisac-slider-readmore" data-toggle="modal" data-src="<?php // echo $sliderurl;?>" data-target="#modalpopupvideo"><?php // esc_html_e( '', 'wp-slick-slider-and-image-carousel' ); ?></a> -->
					</div>

							
				<?php } ?>
			</div>
		</div>
	</div>
</div>