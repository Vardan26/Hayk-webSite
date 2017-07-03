$(document).ready(function () {

    jQuery(document).ready(function($){
        $('#categoryImgUpload').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
                .on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#categoryImgPreview').attr('src', attachment.url);
                    $('#categoryImgURL').val(attachment.url);

                })
                .open();
        });
    });

    $('.trend__categories').slick({
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        infinite: true,
        nextArrow: '<i class="fa fa-chevron-right trend__categories__next"></i>',
        prevArrow: '<i class="fa fa-chevron-left trend__categories__prev"></i>',
        responsive: [
           ,
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });

    var video = $('.intro__banner .slick-active').find('video').get(0).play();

    $('.intro__banner').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        $('.intro__banner .slick-slide').find('video').get(0).pause();
    });

    var videoFooter = $('.intro--footer__banner .slick-active').find('videoFooter').get(0).play();

    $('.intro--footer__banner').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        $('.intro--footer__banner .slick-slide').find('videoFooter').get(0).pause();
    });

})
;
$(".header__nav__search__scope").on("click", function () {
    $(".header__nav__search__input").addClass("header__nav__search__input--active");
    $(".header__nav__search__scope, .header__nav__menu, .header__nav__prof, .header__burger").addClass("hidden");
    $(".header__nav__search__close").show()
    $(".header__nav").css("display", "block")
});
$(".header__nav__search__close").on("click", function () {
    $(".header__nav__search__close").hide();
    $(".header__nav__search__input").removeClass("header__nav__search__input--active");
    $(".header__nav__search__scope, .header__nav__menu, .header__nav__prof, .header__burger").removeClass("hidden");
    $(".header__nav").css("display", "flex")

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