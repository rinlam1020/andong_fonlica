/*$(document).ready(function() {
        $(".col-md-6").hover(function() {
            $(".sup-opacity-hover",this).fadeIn(500,function() {
              $(".sup-opacity-hover",this).addClass("display-blocked");
            });
            $(".sup-opacity-hover-inner",this).addClass("display-blocked");
            $(".sup-opacity",this).addClass("display-none");
            $(".sup-title",this).addClass("display-none");   
        },function(){
            $(".sup-opacity-hover",this).fadeOut(500,function() {
              $(".sup-opacity-hover",this).addClass("display-blocked");
            });
            $(".sup-opacity-hover-inner",this).removeClass("display-blocked");
            $(".sup-opacity",this).removeClass("display-none");
            $(".sup-title",this).removeClass("display-none");
            
        });
    });
    $(document).ready(function() {
        $(".btn").hover(function() {
            $(".sup-opacity-hover",this).fadeIn(500,function() {
              $(".sup-opacity-hover",this).addClass("display-blocked");
            });
            $(".sup-opacity-hover-inner",this).addClass("display-blocked");
            $(".sup-opacity",this).addClass("display-none");
            $(".sup-title",this).addClass("display-none");   
        },function(){
            $(".sup-opacity-hover",this).fadeOut(500,function() {
              $(".sup-opacity-hover",this).addClass("display-blocked");
            });
            $(".sup-opacity-hover-inner",this).removeClass("display-blocked");
            $(".sup-opacity",this).removeClass("display-none");
            $(".sup-title",this).removeClass("display-none");
            
        });
    });*/
    $(document).ready(function() {
      // slick carousel
      $("#rin_nuochoacharme_partner .sliderr").slick({
        mobileFirst:true,
        adaptiveHeight: true,
        dots: true,
          infinite:true,
        slidesToShow: 6,
        slidesToScroll: 1,
        verticalSwiping: true,
        autoplay:false,
        autoplaySpeed: 2000,

          loop: true
      });
``});/*
    $(document).ready(function() {
      // slick carousel
      $(".slider2").slick({
        adaptiveHeight: false,
        dots: false,
        vertical: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        verticalSwiping: false,
        autoplay:true,
        autoplaySpeed: 2500,
        arrows: true,
        infinite: true
      });
``});/*
    const slider = $(".slider");
slider.on('wheel', (function(e) {
  e.preventDefault();

  if (e.originalEvent.deltaY < 0) {
    $(this).slick('slickNext');
  } else {
    $(this).slick('slickPrev');
  }
}));*/