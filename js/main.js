$('#section__slider').slick({
    arrows: true,
    dots: true
});

$('#banner').slick({
    dots: true,
    autoplay: true,
    arrows: false,
    infinite: true,
    speed: 3000,
    fade: true,
    cssEase: 'linear'
});

$(function () {

    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__mobile")
    });


    $(".gallery__list__item:first-child").addClass("gallery__list__item--active");
    $(".gallery__category__type").addClass("hide");
    $(".gallery__category__type:first-child").removeClass("hide");

    $(" .gallery__list__item").on('click', function () {
        $(".gallery__list__item--active").removeClass("gallery__list__item--active");
        $(this).addClass("gallery__list__item--active");
    });


    $(".gallery__list__item--abstract").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__abstract").removeClass("hide");
    });

    $(".gallery__list__item--portrait").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__portraits").removeClass("hide");

    });
    $(".gallery__list__item--landscape").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__landscape").removeClass("hide");

    });
    $(".gallery__list__item--flower").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__flowers").removeClass("hide");
    });
    $(".gallery__list__item--women").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__women").removeClass("hide");
    });

    $(".gallery__list__item--barelef").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__barelefs").removeClass("hide");
    });
    $(".gallery__list__item--drawing").on('click', function () {
        $(".gallery__category__type").addClass("hide");
        $(".gallery__category__drawings").removeClass("hide");
    });

    $(".gallery__list__item").each(function (i) {
        setTimeout(function () {
            $(".gallery__list__item").eq(i).addClass("gallery__list__item--load")
        }, 250 * (i + 1));
    });
    $(".gallery__item").each(function (i) {
        setTimeout(function () {
            $(".gallery__item").eq(i).addClass("gallery__item--load")

        }, 250 * (i + 1));
    });

    $(".gallery__list__mobile").on('click', function () {
        $(".gallery__list").toggleClass("gallery__list__active");
        $(".gallery__list__mobile").toggleClass("gallery__list__mobile__active")
    });


});

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    $("#header__banner__title").css({
        "transform": "translate(0px, " + wScroll / 4 + "%)"
    });
    $(".header__shape--top").css({
        "transform": "translate(0px, -" + wScroll / 6 + "%)rotate(-15deg)"
    });
    $(".header__shape--bottom").css({
        "transform": "translate(0px, " + wScroll / 30 + "%)rotate(8deg)"
    });

    if (wScroll > $(".section__biography").offset().top - $(window).height()) {
        $(".section__biography__shape").css({
            "transform": "translate(0px, -" + wScroll / 30 + "%)rotate(-8deg)"
        });

    }
    if (wScroll > $(".section__paint").offset().top - $(window).height()) {
        $(".section__paint__shape")
            .css({
                'transform': 'rotate(' + (wScroll * 0.2) + 'deg)'
            });
    }
    if (wScroll > $(".section__video").offset().top - $(window).height()) {
        $(".section__video__shape").css({
            "transform": "translate( " + wScroll / 80 + "%, 0px) rotate(20deg)"
        });

    }
});


//popUp
(function ($) {

    $('.gallery__item').swipebox({
        useCSS: true, // false will force the use of jQuery for animations
        useSVG: true, // false to force the use of png for buttons
        initialIndexOnArray: 0, // which image index to init when a array is passed
        hideCloseButtonOnMobile: false, // true will hide the close button on mobile devices
        removeBarsOnMobile: true, // false will show top bar on mobile devices
        hideBarsDelay: 3000, // delay before hiding bars on desktop
        videoMaxWidth: 1140, // videos max width
        beforeOpen: function () {
        }, // called before opening
        afterOpen: null, // called after opening
        afterClose: function () {
        }, // called after closing
        loopAtEnd: false // true will return to the first image after the last image is reached
    });

})(jQuery);


function initMap() {
    // Create a map object and specify the DOM element for display.
    var myLatLng = {lat: 39.7573171, lng: 45.3325};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 14
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Yeghegnadzor Mikoyan street 14'
    });
}