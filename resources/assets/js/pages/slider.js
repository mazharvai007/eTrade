(function () {
    'use strict';

    eTrade.homeSlider.initCarousel = function () {
        $('.hero-slider').slick({
            slidesToShow: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            fade: true,
            autoplayHover: true,
            slidesToScroll: 1
        });
    }
})();