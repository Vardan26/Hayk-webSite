$(document).ready(function () {
    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__mobile")
    });

});
$('.testimonial__list').slick({
    nextArrow: '<i class="fa fa-chevron-right testimonial__slider__next"></i>',
    prevArrow: '<i class="fa fa-chevron-left testimonial__slider__prev"></i>',
    dots:true,
    arrows:true
});

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    $(".intro__title").css({
        "transform": "translate(0px, " + wScroll / 10 + "%)"
    });
    $(".clients").css({
        "background-position-y": " " + wScroll / 30 + "%"
    });

});