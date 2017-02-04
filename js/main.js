$('#section__slider').slick({
    arrows: true,
    dots: true
});


$(function () {

    $(".header__burger").on("click", function () {
        $(".header__nav__menu").toggleClass("header__nav__mobile")
    });


    $(".home__article__title__each").each(function (i) {
        setTimeout(function () {
            $(".home__article__title__each").eq(i).addClass("home__article__title__each__load")

        }, 150 * (i + 1));
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
        "transform": "translate(0px, -" + wScroll / 6 + "%)rotate(-10deg)"
    });
    $(".header__shape--bottom").css({
        "transform": "translate(0px, " + wScroll / 30 + "%)rotate(8deg)"
    });

    $(".section__biography__shape").css({
        "transform": "translate(0px, -" + wScroll / 30 + "%)rotate(-8deg)"
    });

    $(".section__paint__shape")
        .css({
            'transform': 'rotate(' + (wScroll * 0.2) + 'deg)'
        });

    $(".section__video__shape").css({
        "transform": "translate( " + wScroll / 80 + "%, 0px) rotate(20deg)"
    });

});


//popUp
lightGallery(document.getElementById('lightgallery--abstract'));
lightGallery(document.getElementById('lightgallery--portrait'));
lightGallery(document.getElementById('lightgallery--landscape'));
lightGallery(document.getElementById('lightgallery--flower'));
lightGallery(document.getElementById('lightgallery--women'));
lightGallery(document.getElementById('lightgallery--barelef'));
lightGallery(document.getElementById('lightgallery--drawing'));



// map
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