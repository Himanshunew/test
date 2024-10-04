jQuery(document).ready(function($) {
    $('.testimonial-slider').slick({
        slidesToShow: 2, // Show two slides by default
        slidesToScroll: 1, // Scroll one slide at a time
        autoplay: true,
        autoplaySpeed: 6000,
        dots: false, // Show navigation dots
        arrows: false, // Show previous/next arrows
        responsive: [
            {
                breakpoint: 601, // At screen widths less than 600px
                settings: {
                    slidesToShow: 1, // Show one slide on mobile
                    slidesToScroll: 1 // Scroll one slide at a time
                }
            }
        ]
    });
});