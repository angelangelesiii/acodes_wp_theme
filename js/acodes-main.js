// COPYRIGHT 2017 ZIMIT MEDIA PHILIPPINES

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

	var is_banner_active = true,
		is_portfolio_active = false,
		is_contact_active = false;

	var controller = new ScrollMagic.Controller();

	bannerSectionOut = new TimelineMax({
		onComplete: timelineCallback
	});
	bannerSectionOut
		.to('#portfolioBtn' , 1, {x: -100, autoAlpha: 0, ease: Power2.easeIn}, 'x')
		.to('#contactBtn' , 1, {x: 100, autoAlpha: 0, ease: Power2.easeIn}, 'x')
		.to('.banner-section .container img', 1.2, {scale: 0.85, autoAlpha: 0, ease: Power2.easeIn}, 'x')
		.pause()
		;

	portfolioSectionIn = new TimelineMax();
	portfolioSectionIn
		.to('.portfolio-background', 0, {top: 0})
		.from('.portfolio-background', 2, {x: 70, autoAlpha: 0, ease: Power1.easeOut})
		.fromTo('.portfolio', 1.5, {top: '50%', autoAlpha: 0, scale: 1.3}, {top: 0, autoAlpha: 1, scale: 1, ease: Power2.easeOut}, '-=1.5')
		.pause()
		;

function timelineCallback() {
	portfolioSectionIn.play()
}

	$('#portfolioBtn').click(function(e){
		bannerSectionOut.play();
	});

});