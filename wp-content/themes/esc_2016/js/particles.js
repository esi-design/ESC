(function($) {
	var canvas;
	var context;
	var proton;
	var renderer;
	var emitter;
	var stats;
	var index;
	var randomBehaviour;
	var gravity;
	
	Main();
	function Main() {
		canvas = document.getElementById("testCanvas");
		canvas.width = 792;
		canvas.height = 310;
		context = canvas.getContext('2d');
		context.globalCompositeOperation = "lighter";
		addStats();

		loadImage();
	}

	function addStats() {
		stats = new Stats();
		stats.setMode(2);
// 		stats.domElement.style.position = 'absolute';
// 		stats.domElement.style.left = '0px';
// 		stats.domElement.style.top = '0px';
// 		document.getElementById('container').appendChild(stats.domElement);
	}

	function loadImage() {
		var image = new Image()
		image.onload = function(e) {
			var rect = new Proton.Rectangle((canvas.width - e.target.width) / 2, (canvas.height - e.target.height) / 2, e.target.width, e.target.height);
			context.drawImage(e.target, rect.x, rect.y);
			createProton(rect);
			tick();
		}
		image.src = '../img/particles.png';
	}

	function createProton(rect) {
		proton = new Proton;
		emitter = new Proton.Emitter();
		//setRate
		emitter.rate = new Proton.Rate(new Proton.Span(20, 35), new Proton.Span(.5));
		//addInitialize
		emitter.addInitialize(new Proton.Position(new Proton.PointZone(0, 0)));
		emitter.addInitialize(new Proton.Mass(1));
		emitter.addInitialize(new Proton.Radius(1, 7));
		emitter.addInitialize(new Proton.Life(1.2,2.5));
		emitter.addBehaviour(new Proton.Alpha(1, .3));
		var imagedata = context.getImageData(rect.x, rect.y, rect.width, rect.height);
		emitter.addInitialize(new Proton.P(new Proton.ImageZone(imagedata, rect.x, rect.y + 50)));
		//addBehaviour

		randomBehaviour = new Proton.RandomDrift(2, 2, .2);
		gravity = new Proton.Gravity(0);
		emitter.addBehaviour(customScaleBehaviour());
// 		emitter.addBehaviour(gravity);
// 		emitter.addBehaviour(randomBehaviour);
		emitter.addBehaviour(new Proton.Color(['#06a7e2', '#f6303e']));
		emitter.addBehaviour(new Proton.CrossZone(new Proton.RectZone(0, 0, canvas.width, canvas.height), 'collision'));
		emitter.emit();
		//add emitter
		proton.addEmitter(emitter);

		//canvas renderer
		renderer = new Proton.Renderer('canvas', proton, canvas);
		renderer.start();

		//debug
		//Proton.Debug.drawEmitter(proton, canvas, emitter);

		index = 0;
/*
		window.addEventListener('mousedown', function(e) {
			if (index % 2 == 0) {
				randomBehaviour.reset(50, 50, .1);
				gravity.reset(0);
			} else {
				randomBehaviour.reset(2, 2, .2);
				gravity.reset(0);
			}
			index++;	
		});
*/
	}

	function customScaleBehaviour() {
		return {
			initialize : function(particle) {
				particle.oldRadius = particle.radius;
				particle.scale = 0;
			},
			applyBehaviour : function(particle) {
				if (particle.energy >= 2 / 3) {
					particle.scale = (1 - particle.energy) * 3;
				} else if (particle.energy <= 1 / 3) {
					particle.scale = particle.energy * 3;
				}
				particle.radius = particle.oldRadius * particle.scale;
			}
		}
	}

	function tick() {
		requestAnimationFrame(tick);
		stats.begin();
		proton.update();
		stats.end();
	}
	})(jQuery);		