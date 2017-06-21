$('#header__slider').slick({
    nextArrow: '<i class="fa fa-chevron-right header__slider__next"></i>',
    prevArrow: '<i class="fa fa-chevron-left header__slider__prev"></i>',
    dots:true,
    arrows:true
});
$('#testimonial__slider').slick({
    nextArrow: '<img src="img/icons/testimonial_arrow_next.png" class="testimonial--arrow--next"/>',
    prevArrow: '<img src="img/icons/testimonial_arrow_prev.png" class="testimonial--arrow--prev"/>',
    dots:false,
    arrows:true
});
$('#main__clients__slider').slick({
    nextArrow: '<i class="fa fa-chevron-right client--arrow--next"></i>',
    prevArrow: '<i class="fa fa-chevron-left client--arrow--prev"></i>',
    slidesToShow: 5,
    slidesToScroll: 1,
    dots:false,
    arrows:true
});
$(".header__burger").on("click", function () {
    $(".header__nav__items").toggleClass("header__nav__mobile")
});