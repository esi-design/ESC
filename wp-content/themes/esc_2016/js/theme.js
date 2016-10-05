(function($) {
$(document).ready(function(){
// 	console.log('theme');
	$('.carousel').slick({
	  dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000,
		centerMode: true,
		centerPadding: '0px',
	  infinite: true,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 1,
// 	  variableWidth: true,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: false,
	        centerMode: true,
			centerPadding: '20px',
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
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
					console.log(currentSlide);
		var video =  $('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('video').get(0)
// 	  $('.slick-slide[data-slick-index=' + (currentSlide) + ']').css('width','400px');
	  $('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 0});
	  video.play();
	  video.onended = function(e) {
		 $('.slick-slide[data-slick-index=' + (currentSlide) + ']').children('img').animate({"opacity": 1});
      	$('.carousel').slick('slickNext');
    	};
	 });
});

//Lets create a simple particle system in HTML5 canvas and JS

//Initializing the canvas
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

//Canvas dimensions
var W = 700; var H = 300;

//Lets create an array of particles
var particles = [];
for(var i = 0; i < 40; i++)
{
	//This will add 50 particles to the array with random positions
	particles.push(new create_particle());
}

//Lets create a function which will help us to create multiple particles
function create_particle()
{
	//Random position on the canvas
	this.x = Math.random()*W;
	this.y = Math.random()*H;
	
	//Lets add random velocity to each particle
	this.vx = Math.random()*5-1;
	this.vy = Math.random()*5-1;

// 	this.vx = 2;
// 	this.vy = 2;
	
	//Random colors
/*
	var r = Math.random()*255>>0;
	var g = Math.random()*255>>0;
	var b = Math.random()*255>>0;
*/
	var colors = ["190,48,59","6,167,226"];
	var rgb = colors[Math.floor(Math.random() * colors.length)];
	this.color = "rgba("+rgb+",.9)";
	
	//Random size
	this.radius = Math.random()*3+1;
}

var x; var y;
var reverseX;
var reverseY;
//Lets animate the particle
function draw()
{
	//Moving this BG paint code insde draw() will help remove the trail
	//of the particle
	//Lets paint the canvas black
	//But the BG paint shouldn't blend with the previous frame
	ctx.globalCompositeOperation = "source-over";
	//Lets reduce the opacity of the BG paint to give the final touch
	ctx.fillStyle = "#2d3033";
	ctx.fillRect(0, 0, W, H);
	
	//Lets blend the particle with the BG
	ctx.globalCompositeOperation = "lighter";
	
	//Lets draw particles from the array now
	for(var t = 0; t < particles.length; t++)
	{
		var p = particles[t];
		
		ctx.beginPath();
		
		//Time for some colors
		var gradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.radius);
		gradient.addColorStop(0, "white");
// 		gradient.addColorStop(0.4, "white");
		gradient.addColorStop(0.4, p.color);
		gradient.addColorStop(1, "black");
		
		ctx.fillStyle = p.color;
		ctx.arc(p.x, p.y, p.radius, Math.PI*2, false);
		ctx.fill();
		
		//Lets use the velocity now
			p.x += p.vx;	
			p.y += p.vy;		
 
				console.log("V= "+p.vx+" P="+t+" X="+p.x);
				console.log("V= "+p.vy+" P="+t+" Y="+p.y);

		if(p.x <= 50 || p.x >= 700) {
// 			console.log('less');
			p.vx *= -1;
			if(p.x <= 50) {
				p.x = 51;
			} if(p.x >= 700) {
				p.x = 699;
			}
			console.log('P='+t+' switchX');
		}
		if(p.y <= 50 || p.y >= 300) {
			p.vy *= -1;
			if(p.y <= 50) {
				p.y = 51;
			} if(p.y >= 300) {
				p.y = 299;
			}
			console.log('P='+t+' switchY');
		}

	}
}

/*
function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {

       callback();

       if (++x === repetitions) {
           window.clearInterval(intervalID);
       }
    }, delay);
}

setIntervalX(function(){
	draw();
}, 33, 200);
*/

// setInterval(draw,100);

function drawCircle() {
	var c=document.getElementById("canvas");
	var ctx=c.getContext("2d");
		ctx.fillStyle = "rgba(190,48,59,.3)";
		ctx.arc(200, 100, 100, Math.PI*2, false);
		ctx.fill();	
}

// drawCircle();
//I hope that you enjoyed the tutorial :)
})(jQuery);		