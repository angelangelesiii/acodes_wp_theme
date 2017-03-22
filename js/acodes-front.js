// COPYRIGHT 2017 ZIMIT MEDIA PHILIPPINES

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

	$('.full-page').fullpage({
		//Scrolling
		css3: true,
		scrollingSpeed: 1000,
		easingcss3: 'cubic-bezier(0.880, 0.015, 0.145, 0.975)',
		loopHorizontal: false,

		// Design
		verticalCentered: false
	});

	// SCROLLMAGIC AND TWEENS
	var frontpageY = new ScrollMagic.Controller();
	var frontpageX = new ScrollMagic.Controller({
		vertical: false
	});

	// Banner Tween
	var bannerTween = new TimelineMax();
	bannerTween
		.to('.banner-section .inner', 1, {})
		
		;

	var bannerScene = new ScrollMagic.Scene({
		triggerElement: '.banner-section',
		triggerHook: 0,
		duration: '100%'
	})
	.setTween(bannerTween)
	// .addIndicators()
	.addTo(frontpageY);

	// Portfolio Tweens
	$('.portfolio-item').each(function(){

		var portfolioItemTween = new TimelineMax();
		portfolioItemTween
			.set('.portfolio .portfolio-item .container', {perspective:800})
			.set('.portfolio .portfolio-item .container .portfolio-item-image', {transformStyle: 'preserve-3d'})
			.from($(this).find('.portfolio-item-image'), 1, {
				autoAlpha: 0,
				x: '50%',
				rotationY: '-40deg',
				ease: Power2.easeOut
			})
			;

		// Horitzontal Tween
		var portfolioItemSceneHorizontal = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: 0.75,
			reverse: false
		})
		.setTween(portfolioItemTween)
		// .addIndicators()
		;

		// Add Horizontal Tween to controller on enter
		var portfolioItemSceneVertical = new ScrollMagic.Scene({
			triggerElement: '.portfolio .item-count-1',
			duration: '100%'
		})
		.on ('enter', function(){
			portfolioItemSceneHorizontal.addTo(frontpageX);
		})
		.on ('leave', function(){
			portfolioItemSceneHorizontal.remove();
		})
		// .addIndicators()
		.addTo(frontpageY);

	});

	// WINDOW LOAD FUNCTIONS
	$(window).load(function(){

		// Banner Tween
		var introTimeline = new TimelineMax();
		introTimeline
			.from('.banner-logo-piece.triangle', 2.5, {
				scale: 1.7,
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'a')
			.from('.banner-logo-piece.line1', 2.5, {
				x: 300,
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'a+=0.2')
			.from('.banner-logo-piece.line2', 2.5, {
				x: -300,
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'a+=0.5')
			.from('.banner-logo-piece.text', 1.5, {
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'b-=1.2')
			.from('#portfolioBtn', 1.5, {
				x: -70,
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'b-=0.5')
			.from('#contactBtn', 1.5, {
				x: 70,
				autoAlpha: 0,
				ease: Power2.easeOut
			}, 'b-=0.5')
			.play();

	});

});