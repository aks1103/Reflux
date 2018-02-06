/*Theme    : assan
 * Author  : Design_mylife
 * Version : V1.9
 * 
 */



//sticky header
$(document).ready(function () {
    $(window).resize(function () {
        $(".navbar-collapse").css({maxHeight: $(window).height() - $(".navbar-header").height() + "px"});
    });
//sticky header on scroll
    $(".sticky").sticky({topSpacing: 0});

});
//smooth scroll
$(document).ready(function () {
    $(function () {
        $('.scroll-to a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
});
//Auto Close Responsive Navbar on Click
$(document).ready(function () {

    function close_toggle() {
        if ($(window).width() <= 768) {
            $('.navbar-collapse a').on('click', function () {
                $('.navbar-collapse').collapse('hide');
            });
        }
        else {
            $('.navbar .navbar-default a').off('click');
        }
    }
    close_toggle();
    $(window).resize(close_toggle);

});

//Counter Up

jQuery(document).ready(function ($) {
    $('.counter').counterUp({
        delay: 10,
        time: 800
    });
});
//parallax

/* -------------------
 Parallax Sections
 ---------------------*/
$(document).ready(function () {
    if (!Modernizr.touch) {
        $('.numbers').parallax("50%", 0.5);
        $('.process').parallax("50%", 0.5);
        $('.call-to-action').parallax("50%", 0.5);
    }
});

//wow anmation
var wow = new WOW(
        {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 100, // distance to the element when triggering the animation (default is 0)
            mobile: false        // trigger animations on mobile devices (true is default)
        }
);
wow.init();

//flex slider
$(document).ready(function () {
    $('.main-flex-slider,.testi-slide').flexslider({
        slideshowSpeed: 5000,
        directionNav: false,
        animation: "fade"
    });
});


//News owl carousel

$(document).ready(function () {

    $("#owl-news").owlCarousel({
        autoPlay: 6000, //Set AutoPlay to 3 seconds

        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        itemsMobile: [479, 1],
        navigation: true,
        pagination: false,
        navigationText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"]

    });

});


//back to top
$(document).ready(function () {
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll >= 250) {
            $("#back-to-top").addClass("show");
        } else {
            $("#back-to-top").removeClass("show");
        }
    });

    $('a[href="#top"]').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });
});