$(window).bind('load', function(){
	if($('header').length && $('footer').length && $(window).width() > 767){
		var screenH = $(window).outerHeight();
		var headerH = $('header').outerHeight();
		var footerH = $('footer').outerHeight();
		var hVal = screenH - headerH - footerH;
		$('.cy_minhloc_blog').css('height',hVal);
	}
});