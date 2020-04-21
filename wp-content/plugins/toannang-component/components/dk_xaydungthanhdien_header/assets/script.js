$(document).ready(function(){
	$('nav#menu').mmenu();

	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();    
	    if (scroll <= 200) {
	        $(".cy_khangphuc_header").removeClass("darkHeader");
	        $("#container-site").removeClass("darkSite");
	    }else{
	    	$(".cy_khangphuc_header").addClass("darkHeader");
	    	$("#container-site").addClass("darkSite");
	    }
	});

});