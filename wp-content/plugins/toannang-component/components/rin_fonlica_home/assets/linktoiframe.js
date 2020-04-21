function insertLink(){
            document.getElementById(\'vid_frame\').src=\'http://youtube.com/embed/eg6kNoJmzkY?autoplay=1&rel=0&showinfo=0&autohide=1\'
        }
  		$(document).ready(function () {
		    $(".arrow-right").bind("click", function (event) {
		        event.preventDefault();
		        $(".vid-list-container").stop().animate({
		            scrollLeft: "+=336"
		        }, 750);
		    });
		    $(".arrow-left").bind("click", function (event) {
		        event.preventDefault();
		        $(".vid-list-container").stop().animate({
		            scrollLeft: "-=336"
		        }, 750);
		    });
		});