(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider   =   function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/beecolor-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/beecolor-post-carousel.default', ElementCarouselSlider );

        /* Element partners-carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/beecolor-partners-carousel.default', ElementCarouselSlider );

        /* Element product popup */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/beecolor-product-popup.default', ElementCarouselSlider );

        /* Element project popup */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/beecolor-project-popup.default', ElementCarouselSlider );

    } );

})( jQuery );