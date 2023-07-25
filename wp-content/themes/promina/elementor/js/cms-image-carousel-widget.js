( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCMSImageCarouselHandler = function( $scope, $ ) {
        var breakpoints = elementorFrontend.config.breakpoints;
        var carousel = $scope.find(".cms-slick-carousel");
        carousel.slick({
            centerMode: true,
            centerPadding: '350px',
            slidesToShow: 1,
            dots: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        centerMode: true,
                        centerPadding: '230px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '15px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_image_carousel.default', WidgetCMSImageCarouselHandler );
    } );
} )( jQuery );