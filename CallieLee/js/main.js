$(document).ready(function () {
    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__active")
    });
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
        $(".header__menu").toggleClass("header__nav__mobile")
    });

});
$('.products__slider').slick({
    nextArrow: '<i class="fa fa-chevron-right products__next"></i>',
    prevArrow: '<i class="fa fa-chevron-left products__prev"></i>',
    dots:true,
    arrows:true
});
$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    $(".products--new").css({
        "background-position-y": " " + wScroll / 30 + "%"
    });

});