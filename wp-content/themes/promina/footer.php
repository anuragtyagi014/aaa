<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Promina
 */ 
$back_totop_on = promina_get_opt('back_totop_on', true);
?>
	</div><!-- #content inner -->
</div><!-- #content -->

<?php promina_footer(); ?>
<?php promina_search_popup(); ?>
<?php promina_sidebar_hidden(); ?>
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
    <a href="#" class="scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>





<!-- Modal Popup Video Start -->
          <div class="modal fade" id="modalpopupvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>        
                  <!-- 16:9 aspect ratio -->
                  <!-- <div class="embed-responsive embed-responsive-16by9">
                    <video src="<?php echo $sliderurl;?>" type="video/mp4"></video>
                  </div> -->
                  <video id="VisaChipCardVideo" width="600" controls>
                    <source src="<?php echo $sliderurl;?>" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal Popup Video End -->


<!-- <script type="text/javascript">
	var $carousel = $('.slider');

var settings = {
  dots: true,
  arrows: true,
  autoplay: true,
  slide: '.slick-slideshow__slide',
  slidesToShow: 1,
  centerMode: true,
  centerPadding: '60px',
};

function setSlideVisibility() {
  //Find the visible slides i.e. where aria-hidden="false"
  var visibleSlides = $carousel.find('.slick-slideshow__slide[aria-hidden="false"]');
  //Make sure all of the visible slides have an opacity of 1
  $(visibleSlides).each(function() {
    $(this).css('opacity', 1);
  });

  //Set the opacity of the first and last partial slides.
  $(visibleSlides).first().prev().css('opacity', 0);
}

$carousel.slick(settings);
$carousel.slick('slickGoTo', 1);
setSlideVisibility();

$carousel.on('afterChange', function() {
  setSlideVisibility();
});
</script> -->
<!-- <script type="text/javascript">
  $(document).ready(function(){ 

$(".faq-accordion .wpsm_panel.wpsm_panel-default").click(function(){ 

$("body").toggleClass("faq-active"); 
}); 

});
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.js" type="text/javascript"></script>

</body>
</html>