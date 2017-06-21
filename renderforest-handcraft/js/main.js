
$(".header__lang__span").on("click", function () {
    $(".header__lang__items").toggleClass("hide")
});

$(".header__banner__player").on("click", function () {
    $(".header__video__frame").toggleClass("hide")
});

$(".section__video__item__btn--play").on("click", function () {
    $(this).parent().siblings(".page__video").toggleClass("hide");
});

$(".page__video__close").on("click", function () {
    $(".page__video").addClass("hide")
});

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    $(".main__article__imgCont--rotate")
        .css({
            'transform': 'rotate(' + (wScroll * 5) + 'deg)'
        });
});
