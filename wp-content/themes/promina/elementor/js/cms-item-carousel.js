( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCMSItemCarouselHandler = function( $scope, $ ) {
        //Testimonial syncing
        var said_carousel = $scope.find(".cms-testimonial-carousel-syncing .client-said");
        var info_carousel = $scope.find(".cms-testimonial-carousel-syncing .client-info");
        said_carousel.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            fade: true,
            asNavFor: '.cms-testimonial-carousel-syncing .client-info'
        });
        info_carousel.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            focusOnSelect: true,
            infinite: true,
            centerMode: true,
            speed:250,
            asNavFor: '.cms-testimonial-carousel-syncing .client-said',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                    }
                }
            ]
        });

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_testimonial_carousel.default', WidgetCMSItemCarouselHandler );
    } );
} )( jQuery );