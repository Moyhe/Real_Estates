document.addEventListener('livewire:navigated', () => {
    $(function() {
        "use strict";

        $(window).on('load', function () {
            $('#preloader').delay(100).fadeOut('slow');
            $('body').delay(100).css({ 'overflow': 'visible' });
        })


    /* Back to top */

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.dmtop').css({
                bottom: "75px"
            });
        } else {
            $('.dmtop').css({
                bottom: "-100px"
            });
        }
    });

        $(".dmtop").on('click', function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

        // $(document).ready(function() {
        //     $('select').niceSelect();

        // });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 50) {
                $(".header").addClass("header-fixed");
            } else {
                $(".header").removeClass("header-fixed");
            }
        });


        // Property Slide
        $('.property-slide').slick({
          slidesToShow:3,
          arrows: false,
          dots: true,
          infinite: true,
          speed:700,
          slidesToScroll: 1,
          autoplay:true,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                arrows: false,
                slidesToShow:2
              }
            },
            {
              breakpoint: 600,
              settings: {
                arrows: false,
                slidesToShow:1
              }
            }
          ]
        });

        // similar-slide
        $('.similar-slide').slick({
          slidesToShow:4,
          dots: true,
          arrows: false,
          autoplay:true,
          infinite: true,
          speed:700,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                arrows: false,
                slidesToShow:2
              }
            },
            {
              breakpoint: 600,
              settings: {
                arrows: false,
                slidesToShow:1
              }
            }
          ]
        });


        // Featured Slick Slider
        $('.featured_slick_gallery-slide').slick({
            centerMode: true,
            infinite:true,
            arrows:true,
            centerPadding: '70px',
            slidesToShow:2,
            responsive: [
            {
            breakpoint: 768,
            settings: {
            arrows:true,
            centerMode: true,
            centerPadding: '20px',
            slidesToShow:2
            }
            },
            {
            breakpoint: 480,
            settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '20px',
            slidesToShow:2
            }
            }
            ]
        });



        $('.property-list-click').slick({
          slidesToShow:1,
          slidesToScroll: 1,
          autoplay:false,
          autoplaySpeed: 2000,
        });


        // Featured Slick Slider
        $('.featured-slick-slide').slick({
            centerMode: true,
            centerPadding: '80px',
            slidesToShow:2,
            responsive: [
            {
            breakpoint: 768,
            settings: {
            arrows:true,
            centerMode: true,
            centerPadding: '60px',
            slidesToShow:2
            }
            },
            {
            breakpoint: 480,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
            }
            }
            ]
        });

        // MagnificPopup
        $('body').magnificPopup({
            type: 'image',
            delegate: 'a.mfp-gallery',
            fixedContentPos: true,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: false,
            preloader: true,
            removalDelay: 0,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true
            }
        });

    });
})





