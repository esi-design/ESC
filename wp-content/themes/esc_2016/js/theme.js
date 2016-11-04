(function($) {
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		if($('#nav-icon').hasClass('open')) {
			$('.menu-navigation-container').addClass('open');
		} else {
			$('.menu-navigation-container').removeClass('open');
		}
	});	

$(document).ready(function(){
	
$('.carousel').slick({
	dots: false,
	// 		arrows: false,
	autoplay: true,
	autoplaySpeed: 2000,
	centerMode: true,
	centerPadding: '0px',
	prevArrow: '<button type="button" class="slick-prev"></button>',
	nextArrow: '<button type="button" class="slick-next"></button>',
	infinite: true,
	speed: 300,
	slidesToShow: 3,
	slidesToScroll: 1,
	// 	  variableWidth: true,
	responsive: [
	{
	  breakpoint: 1024,
	  settings: {
		centerPadding: '0px',
	  }
	},
/*
	{
	  breakpoint: 767,
	  settings: {
		centerMode: false,
	    slidesToShow: 2,
	    slidesToScroll: 2
	  }
	},
*/
	{
	  breakpoint: 490,
	  settings: {
	    slidesToShow: 1,
	    slidesToScroll: 1
	  }
	}
	// You can unslick at a given breakpoint now by adding:
	// settings: "unslick"
	// instead of a settings object
	]
});


$('.carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
	$('.carousel').slick('slickPause');
// 	console.log(currentSlide);
	var video =  $('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('video').get(0);
	var oldVideo =  $('.slick-slide[data-slick-index=' + (currentSlide-1) + ']').children('video').get(0);
	$('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 0});
	video.play();
	
	$('.slick-slide[data-slick-index=' + (currentSlide - 1) + ']').children('img').animate({"opacity": 1});
	oldVideo.pause();
	oldVideo.currentTime = 0;

	video.onended = function(e) {
		$('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 1}, function() {
			$('.carousel').delay(1000).slick('slickNext');
		});
	};
});
});


function drawCircleRed() {
	var c=document.getElementById("logoCircles");
	var ctx=c.getContext("2d");
	var centerX = c.width / 2;
    var centerY = c.height / 2;
	ctx.fillStyle = "rgba(190,48,59,.3)";
	ctx.arc(centerX, centerY, 100, Math.PI*2, false);
	ctx.fill();	
}

// drawLogoCircles();

function drawCircle() {
	var c=document.getElementById("canvas");
	var ctx=c.getContext("2d");
		ctx.fillStyle = "rgba(190,48,59,.3)";
		ctx.arc(200, 100, 100, Math.PI*2, false);
		ctx.fill();	
}

// drawCircle();

$(function() {
	Grid.init();
});

})(jQuery);		