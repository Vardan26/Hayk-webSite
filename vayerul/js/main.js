$('.intro__banner').slick({
    arrows: false,
    dots: true,
    adaptiveHeight: true

});

var video = $('.intro__banner .slick-active').find('video').get(0).play();

$('.intro__banner').on('afterChange', function (event, slick, currentSlide, nextSlide) {
    $('.intro__banner .slick-slide').find('video').get(0).pause();
    var video = $('.intro__banner .slick-active').find('video').get(0).play();
});

$(document).ready(function () {

    $(".header__nav__search__scope").on("click", function () {
        $(".header__nav__search__input").addClass("header__nav__search__input--active");
        $(".header__nav__search__scope, .header__nav__menu, .header__nav__prof, .header__burger").addClass("hidden");
        $(".header__nav__search__close").show()
        $(".header__nav").css("display","block")
    });
    $(".header__nav__search__close").on("click", function () {
        $(".header__nav__search__close").hide();
        $(".header__nav__search__input").removeClass("header__nav__search__input--active");
        $(".header__nav__search__scope, .header__nav__menu, .header__nav__prof, .header__burger").removeClass("hidden");
        $(".header__nav").css("display","flex")

    });

    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__mobile")
    });
    $("#lastest").on("click", function () {
        $("#aside__lastest").removeClass("hidden");
        $("#lastest").addClass("aside__tab__handle--active");
        $("#popular").removeClass("aside__tab__handle--active");
        $("#aside__popular").addClass("hidden");

    });
    $("#popular").on("click", function () {
        $("#aside__lastest").addClass("hidden");
        $("#aside__popular").removeClass("hidden");
        $("#popular").addClass("aside__tab__handle--active");
        $("#lastest").removeClass("aside__tab__handle--active");
    });
});
