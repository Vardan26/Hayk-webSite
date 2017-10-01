$(document).ready(function () {
    $(".header__burger").on("click", function () {
        $(".header").toggleClass("header__mobile");

        if ($(".header__logo img").attr('src') === "img/footerlogo.png") {
            $(".header__logo img").attr('src', 'img/logo.png')
         } else {
             $(".header__logo img").attr("src", "img/footerlogo.png")
         }
    });

    var scrollLink = $('.header__nav__menu__item a');

    // Smooth scrolling
    var headerHeight = $(".header").outerHeight();
    scrollLink.click(function (e) {
        e.preventDefault();
        var linkHref = $(this).attr("href");
        $('body,html').animate({
            scrollTop: $(linkHref).offset().top - headerHeight
        }, 500);
    });

    // Active link switching
    $(window).scroll(function () {
        var scrollbarLocation = $(this).scrollTop();
        scrollLink.each(function () {
            var sectionOffset = $(this.hash).offset().top - 150;
            if (sectionOffset <= scrollbarLocation) {
                $(this).parent().addClass('header__nav__menu__item--active');
                $(this).parent().siblings().removeClass('header__nav__menu__item--active');
            }
        });
        if ($(window).scrollTop() > 110) {
            $('.header').addClass('header__scroll');
            $(".header__logo img").attr("src", "img/logo.png")
        } else {
            $('.header').removeClass('header__scroll');
            $(".header__logo img").attr("src", "img/footerlogo.png")
        }
        var wScroll = $(this).scrollTop();

        $(".clients").css({
            "background-position-y": " " + wScroll / 30 + "%"
        });
    })


});
$('.testimonial__list').slick({
    nextArrow: '<i class="fa fa-chevron-right testimonial__slider__next"></i>',
    prevArrow: '<i class="fa fa-chevron-left testimonial__slider__prev"></i>',
    dots: true,
    arrows: true
});

$(window).scroll(function () {


});

