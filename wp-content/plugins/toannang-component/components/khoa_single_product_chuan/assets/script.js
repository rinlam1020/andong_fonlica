

$('.slick-splq').slick({

    arrows: false,

    infinite: true,

    dots: false,

    speed: 1000,

    slidesToShow: 4,

    slidesToScroll: 1,

    vertical:false,

    autoplay: true,

    autoplaySpeed: 1500,

    responsive: [

        {

            breakpoint: 1024,

            settings: {

                vertical:false,

                slidesToShow: 3,

                slidesToScroll: 1

            }

        },

        {

            breakpoint: 600,

            settings: {

                vertical:false,

                slidesToShow: 2,

                slidesToScroll: 1

            }

        },

        {

            breakpoint: 480,

            settings: {

                vertical:false,

                slidesToShow: 1,

                slidesToScroll: 1

            }

        }

    ]

});

$('.img-thumbail-sigle-pro-k').slick({

    arrows: false,

    infinite: true,

    dots: false,

    speed: 1000,

    slidesToShow: 4,

    slidesToScroll: 1,

    vertical:false,

    autoplay: true,

    autoplaySpeed: 1500,

    responsive: [

        {

            breakpoint: 1024,

            settings: {

                vertical:false,

                slidesToShow: 3,

                slidesToScroll: 1

            }

        },

        {

            breakpoint: 600,

            settings: {

                vertical:false,

                slidesToShow: 2,

                slidesToScroll: 1

            }

        },

        {

            breakpoint: 480,

            settings: {

                vertical:false,

                slidesToShow: 2,

                slidesToScroll: 1

            }

        }

    ]

});



//star-rating

$(document).ready(function(){

    /* 1. Visualizing things on Hover - See next part for action on click */

    $('#stars li').on('mouseover', function(){

        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star

        $(this).parent().children('li.star').each(function(e){

            if (e < onStar) {

                $(this).addClass('hover');

            }

            else {

                $(this).removeClass('hover');

            }

        });

    }).on('mouseout', function(){

        $(this).parent().children('li.star').each(function(e){

            $(this).removeClass('hover');

        });

    });

    /* 2. Action to perform on click */

    $('#stars li').on('click', function(){

        var onStar = parseInt($(this).data('value'), 10); // The star currently selected

        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {

            $(stars[i]).removeClass('selected');

        }

        for (i = 0; i < onStar; i++) {

            $(stars[i]).addClass('selected');

        }

        // JUST RESPONSE (Not needed)

        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

        var msg = "";

        if (ratingValue > 1) {

            msg = "Thanks! You rated this " + ratingValue + " stars.";

        }

        else {

            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";

        }

        responseMessage(msg);

    });

    if($('.xzoom-gallery3').length > 0){

        $('.xzoom-gallery3').on('click',function (e) {

            e.preventDefault();

            $('#thumbnail-product').attr('src',$(this).attr('xpreview'));

            $('#thumbnail-product').parent().attr('href',$(this).attr('xpreview'));

        });

    }

});

