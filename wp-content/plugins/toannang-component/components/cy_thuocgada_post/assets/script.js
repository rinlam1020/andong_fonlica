wow = new WOW(
    {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       true,       // default
        live:         true        // default
    }
)
wow.init();

$(document).ready(function(){
  $('.qv_thuocgada_dv_group').slick({
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow:'<img src="/qv_thuocgada/qv_thuocgada_dv/images/left_03.png" class="btn-slider-left" alt="prev">',
    nextArrow:'<img src="/qv_thuocgada/qv_thuocgada_dv/images/right_03.png" class="btn-slider-right" alt="next">',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 340,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]

  });
});