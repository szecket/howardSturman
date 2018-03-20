$(document).ready(function() {

	// --------------------------------------------------
	// Check if browser JS is enabled
	// --------------------------------------------------
	$('html').removeClass('no-js').addClass('js');

	// --------------------------------------------------
	// If JS is enabled - run page transitions
	// --------------------------------------------------
	$(".js #container").animsition({
		inClass: 'overlay-slide-in-bottom',
	    outClass: 'overlay-slide-out-bottom',
		inDuration: 500,
		outDuration: 300,
		linkElement: '.al',
		loading: true,
		loadingParentElement: 'body',
		loadingClass: 'animsition-loading',
		timeout: false,
		timeoutCountdown: 5000,
		onLoadEvent: true,
		browser: [ 'animation-duration', '-webkit-animation-duration'],
		overlay : true,
		transition: function(url){ window.location.href = url; }
	}).one('animsition.inStart',function(){
		 $('body').removeClass('bg-init');
		 kollideInit();
    });

}); // document.ready


function kollideInit() {

	// --------------------------------------------------
	// Mobile Check
	// --------------------------------------------------
	var isMobile = $('#isMobile');

	if( isMobile.css("display") == "block" ) {
		isMobile = true;
	} else {
		isMobile = false;
	}


	// --------------------------------------------------
	// Cover Media Size
	// --------------------------------------------------
	winHeight = $(window).outerHeight();

	if( ! isMobile ) {
		$('.cover-media-container, .cover-media, .cover-slider, .cover-image, .intro.fullheight, .glide__wrapper, .glide__track, .glide__slide').height( winHeight - winHeight/7 );
	} else {
		if(winHeight < 640) {
			$('.cover-media-container, .cover-media, .cover-slider, .cover-image, .intro.fullheight, .glide__wrapper, .glide__track, .glide__slide').css("min-height", winHeight + 100);
		} else {
			$('.cover-media-container, .cover-media, .cover-slider, .cover-image, .intro.fullheight, .glide__wrapper, .glide__track, .glide__slide').css("min-height", winHeight - 50);
		}
	}


	// --------------------------------------------------
	// Scrolldown
	// --------------------------------------------------
	$('.scrolldown').on('click', function() {
		$('body').animate().stop();
		if( $(this).hasClass('scrolled') ) {
			$('html, body').animate({ scrollTop: 0 }, 600);
			$(this).removeClass('scrolled');
		} else {
			$('html, body').animate({ scrollTop: ($(window).height() / 1.5) }, 600);
			$(this).addClass('scrolled');
		}
	});

	// --------------------------------------------------
	// Glidejs Slider
	// --------------------------------------------------
	if( $('.slider').length != 0 ) {
		var slider = $('.slider').glide({
        	type: 'carousel',
        	// type: 'slideshow',
			autoplay: 5000,
			animationDuration: 0,
			autoheight: false,
			hoverpause: true
    	});

		slider_api = slider.data('glide_api');

		slider.on("beforeTransition.glide", function(event, data) {
			$('.slider .glide__slide.active').removeClass('active');
		});

		$("body").keydown(function(e) {
			if( e.keyCode == 37 || e.keyCode == 39 ) {
				slider_api.pause();
			}
		});
	}
	if( $('.carousel').length != 0 ) {
		$('.carousel').glide({
        	type: 'carousel',
			autoplay: 0,
			keyboard: false
    	});
	}


	// --------------------------------------------------
	// Hamburger on Mobile
	// --------------------------------------------------
	$('.hamburger-container').on('click', function() {
		if( $('.menu').hasClass('animate') ) {
			$('.menu, .bar').removeClass('animate');
			$('.hamburger-container').removeClass('animate');
		} else {
			$('.menu, .bar').addClass('animate');
			$('.hamburger-container').addClass('animate');
		}
	});
	// --------------------------------------------------
	// Mobile Navigation
	// --------------------------------------------------
	$('.hamburger-menu').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, 'fast');
		$('html').toggleClass('nav-open');
		$('.menu').toggleClass('active');
	});



	// --------------------------------------------------
	// fitVids
	// --------------------------------------------------
	$('.video').fitVids();


	// --------------------------------------------------
	// FeatherLight Lightbox
	// --------------------------------------------------
	$('.gallery a, .lightbox a').featherlightGallery({
		targetAttr: 'href'
	});

} // kollide
