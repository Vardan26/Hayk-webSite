$(document).ready(function () {

    $(".header__search__scope").on("click", function () {
        $(".header__search__input").addClass("header__search__input--active");
        $(".header__search__scope").addClass("hidden");
        $(".header__search__close").show()
    });
    $(".header__search__close").on("click", function () {
        $(".header__search__close").hide();
        $(".header__search__input").removeClass("header__search__input--active");
        $(".header__search__scope").removeClass("hidden");
    });

    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__mobile")
    });

    $('.testimonial').slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        nextArrow: '<i class="fa fa-chevron-right testimonial__next"></i>',
        prevArrow: '<i class="fa fa-chevron-left testimonial__prev"></i>'
    });
    $('.products__slider').slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        nextArrow: '<i class="fa fa-chevron-right products__next"></i>',
        prevArrow: '<i class="fa fa-chevron-left products__prev"></i>'
    });
    $('.productBuy__slider__current').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        nextArrow: '<i class="fa fa-chevron-right productBuy__next"></i>',
        prevArrow: '<i class="fa fa-chevron-left productBuy__prev"></i>'
    });
    $('.productBuy__slider--min').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        adaptiveHeight: true
    });

    window.sr = ScrollReveal();
    sr.reveal('.intro__cards__item', {duration: 2000}, 500);
    sr.reveal('.about__banner__img', {duration: 2000}, 500);
});


function initialize() {
    var mapProp = {
        center: new google.maps.LatLng(40.1791857, -44.499103),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    var map = new google.maps.Map(document.getElementById("map"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
