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
        $(".header__menu").toggleClass("header__nav__mobile")
    });


    $( function() {
        var max_value = 100;
        var step = 0;
        var $bottle_full = $('.bottle__fill--fool');
        var $polygon =  $('.svg-graph polygon');

        var alcohol = 0;
        var tannins = 0;
        var sweetness = 0;
        var fruit = 0;


        $('.slider').each(function(){
            var self  = this;
            var input  = $(self).data('input');
            var value  = $(self).data('value');
            var bottle  = $(self).data('bottle');
            var $bottle = $(bottle);
            var $input  = $( "#"+input );
            var $not_self_slider = $(".slider").not($(self));
            var $not_self_input = $('.slider-input').not($input);
            var $not_self_bottle = $('.bottle__fill').not($bottle);


            $(this ).slider({
                range: "min",
                value: value,
                min: 0,
                max: max_value,
                slide: function( event, ui ) {
                    changeSvgGraph();
                    $input.val(  ui.value );
                    $bottle.css("height", 0.72 * +ui.value  + "%");
                    setBottleFullHeight()
                    if(getSumValues()>max_value){
                        step++;
                        var index  = step % 2 === 0 ? 0 : 1;
                        var $current_slider = $not_self_slider.eq(index);
                        var $current_val = $current_slider.slider( "value") ;

                        if($current_val === 0 ){
                            index  = step % 2 === 0 ? 1 : 0;
                            $current_slider = $not_self_slider.eq(index);
                            $current_val = $current_slider.slider( "value") ;
                        }
                        var current_input = $current_slider.data( "input") ;
                        var current_bottle = $current_slider.data( "bottle") ;
                        var $current_input  = $( "#"+current_input );
                        var $current_bottle  = $( current_bottle );
                        $current_slider.slider( "value", $current_val-1 );
                        $current_input.val(  $current_val-1 );
                        $current_bottle.css("height", 0.72 * +($current_val-1)  + "%");

                    }

                },
                change: function( event, ui ) {


                } ,
                stop: function( event, ui ) {

                    var dif_value =  getSumValues() - max_value;

                    if(dif_value>0){
                        if( ui.value === max_value){
                            $not_self_slider.slider( "value", 0 );
                            $not_self_input.val(0);
                            $not_self_bottle.css("height", 0);
                        }else{
                            var v1,v2,
                                $slider_1 = $not_self_slider.eq(0),
                                $slider_2 = $not_self_slider.eq(1),
                                $input_1 = $not_self_input.eq(0),
                                $input_2 = $not_self_input.eq(1),
                                $bottle_1 = $not_self_bottle.eq(0),
                                $bottle_2 = $not_self_bottle.eq(1),
                                slider_1_val = $slider_1.slider( "value") ,
                                slider_2_val = $slider_2.slider( "value") ,
                                c1,c2;

                            if(dif_value % 2 === 0 ){
                                v1 = v2 = dif_value/2;
                            }else{
                                v1 = (dif_value+1)/2;
                                v2 = dif_value- v1;
                            }

                            if(slider_1_val < v1){
                                c1 = 0;
                                c2 = slider_2_val - v2 - (v1 - slider_1_val);

                            }else if(slider_2_val < v2){
                                c2 = 0;
                                c1 = slider_1_val - v1 - (v2 - slider_2_val);
                            } else{

                                c1 = slider_1_val - v1;
                                c2 = slider_2_val - v2
                            }

                            $slider_1.slider( "value", c1);
                            $slider_2.slider( "value", c2);
                            $input_1.val(c1);
                            $input_2.val(c2);
                            $bottle_1.css("height", 0.72 * + c1  + "%");
                            $bottle_2.css("height", 0.72 * + c2  + "%");

                        }



                    }
                    setBottleFullHeight();
                    changeSvgGraph();
                }
            });
            setBottleFullHeight();
            $bottle.css("height", 0.72 * +value  + "%");
            $input.val(  value );
        });
        function setBottleFullHeight() {
            $bottle_full.css("height", 0.72 * +getSumValues()  + "%");
        }
        function getSumValues(){
            var sum = 0;
            $('.slider-input').each(function(){
                sum+= +$(this).val();
            });
            return sum;
        }
        
        function changeSvgGraph() {
            var bodied_val  = +$('#a-1').val(),
                sweet_val  = +$('#a-2').val(),
                fruit_val  = +$('#a-3').val();

            var alcohol_x = 90- 85*(bodied_val+sweet_val)/100;
            var tannins_x = 110+85*bodied_val/100;
            var sweetness_y = 110+85*sweet_val/100;
            var fruit_y = 90- 85*(fruit_val)/100;
            $polygon.attr('points', alcohol_x+',100 100,'+fruit_y+' '+tannins_x+',100 100, '+sweetness_y);


        }

    } );


    $('.selected__img__item, .placeOrder__bottle__label').attr("src",$(".sticker__item__img:first-child").attr("src"));

    $(".sticker__item__img").on("click", function () {
        $('.selected__img__item').attr("src",$(this).attr("src"));
    });
    $("#label__btn").on("click", function () {
        $('.placeOrder__bottle__label').attr("src",$(".selected__img__item").attr("src"));
    });
    $(".product__remove").on("click", function () {
        $(this).parent('.product__item').remove();
    })

});