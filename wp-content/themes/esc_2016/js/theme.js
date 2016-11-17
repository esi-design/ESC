(function($) {
function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		if($('#nav-icon').hasClass('open')) {
			$('.menu-navigation-container').addClass('open');
		if($('body').hasClass('home')) {
			$('.nav--menu').css('background-color','#2d3033');	
		}
		} else {
			$('.menu-navigation-container').removeClass('open');
			if($('body').hasClass('home')) {
				$('.nav--menu').css('background-color','transparent');	
			}
		}
	});	

if(isMobile()) {
	$('body').addClass('mobile');
}

$(document).ready(function(){

if ($(window).width() < 768) {
	// Find all YouTube & Vimeo videos
	var $allVideos = $("iframe"),
	
	// The element that is fluid width
	$fluidEl = $("body");
	
	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {
	
	$(this)
	.data('aspectRatio', this.height / this.width)
	
	// and remove the hard coded width/height
	.removeAttr('height')
	.removeAttr('width');
	
	});
	
	// When the window is resized
	$(window).resize(function() {
	
	var newWidth = $fluidEl.width();
	
	// Resize all videos according to their own aspect ratio
	$allVideos.each(function() {
	
	var $el = $(this);
	$el
	.width(newWidth)
	.height(newWidth * $el.data('aspectRatio'));
	
	});
	
	// Kick off one resize to fix all videos on page load
	}).resize();
}
	
$('.carousel').slick({
	dots: false,
	// 		arrows: false,
	autoplay: true,
	autoplaySpeed: 2000,
	centerMode: true,
	centerPadding: '0px',
	asNavFor: '.carousel-text',
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

$('.carousel-text').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.carousel'
});


if(!isMobile()) {
$('.carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
	$('.carousel').slick('slickPause');
// 	console.log(currentSlide);
	var video =  $('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('video').get(0);
	var oldVideo =  $('.slick-slide[data-slick-index=' + (currentSlide-1) + ']').children('video').get(0);
	var nextVideo =  $('.slick-slide[data-slick-index=' + (currentSlide+1) + ']').children('video').get(0);
	$('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 0});
	video.play();
	
	$('.slick-slide[data-slick-index=' + (currentSlide - 1) + ']').children('img').animate({"opacity": 1});
	oldVideo.pause();
	oldVideo.currentTime = 0;
	
	$('.slick-slide[data-slick-index=' + (currentSlide + 1) + ']').children('img').animate({"opacity": 1});
	nextVideo.pause();
	nextVideo.currentTime = 0;

	video.onended = function(e) {
		$('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 1}, function() {
			$('.carousel').delay(1000).slick('slickNext');
		});
	};
});
}


});

function canvas(){
	var outputCanvas = document.getElementById('output'),
		output = outputCanvas.getContext('2d'),
		bufferCanvas = document.getElementById('buffer'),
		buffer = bufferCanvas.getContext('2d'),
		video = document.getElementById('video'),
		width = outputCanvas.width,
		height = outputCanvas.height,
		interval;
		
	function processFrame() {
		buffer.drawImage(video, 0, 0);

		var	image = buffer.getImageData(0, 0, width, height),
			imageData = image.data,
			alphaData = buffer.getImageData(0, height, width, height).data;
		
		for (var i = 3, len = imageData.length; i < len; i = i + 4) {
			imageData[i] = alphaData[i-1];
		}
		
		output.putImageData(image, 0, 0, 0, 0, width, height);
	}
	
	video.addEventListener('play', function() {
		$('.intro .growing-circle').animate({opacity:.1}, 800);
		interval = setInterval(processFrame, 40)
	}, false);
	
	video.addEventListener("timeupdate", function () {
        if (this.currentTime >= 2.8) {
            $('.intro .text > div').each(function(fadeInDiv) {
			   		$(this).delay(fadeInDiv * 200).animate({opacity:1}, 800);
   			});
        } if (this.currentTime >= 3.5) {
	        $('.reel .video, .reel .text').animate({opacity:1}, 800);
	    }
    }, false);

/*
	video.addEventListener('ended', function() {
		$('.reel .video, .reel .text').animate({opacity:1});
	}, false);
*/
	
	video.setAttribute("src", 'img/logo-animation2.mp4');		
}

if(!isMobile()) {
canvas(); 
} else {
	$('.intro .text > div').each(function(fadeInDiv) {
   		$(this).delay(fadeInDiv * 200).animate({opacity:1}, 800);
	});
	$('.reel .video, .reel .text').animate({opacity:1}, 800);
}

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