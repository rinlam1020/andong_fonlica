wow = new WOW(
        {
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: true, // default
            live: true        // default
        }
)
wow.init();
$(document).ready(function() {
$(window).bind("load resize", function(){
    if(jQuery(window).width()<992){
      jQuery('#main-menu').mmenu();
    }
  });


});
