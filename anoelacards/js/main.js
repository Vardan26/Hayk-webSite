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


    window.sr = ScrollReveal();
    sr.reveal('.intro__cards__item', {duration: 2000}, 500);
    sr.reveal('.about__banner__img', {duration: 2000}, 500);
});
