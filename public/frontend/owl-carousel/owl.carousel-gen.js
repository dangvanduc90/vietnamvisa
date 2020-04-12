$(document).ready(function() {
	var carousel_change = $(".slide_home");
	carousel_change.owlCarousel({
		loop:true,
		items : 1,
		singleItem:true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 1000,
		itemsTablet: [768,1],
		nav:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	});

	$('.list_news').owlCarousel({
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveclass: true,
		margin: 20,
		autoplay: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			768: {
				items: 2,
				nav: true
			},
			1000: {
				items: 3,
				nav: true,
				loop: true
			}
		}
	});

	$('.client_say').owlCarousel({
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveclass: true,
		margin: 30,
		autoplay: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			768: {
				items: 2,
				nav: true
			},
			1000: {
				items: 2,
				nav: true,
				loop: true
			}
		}
	});
	$('.list_partner').owlCarousel({
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveclass: true,
		margin: 10,
		autoplay: true,
		responsive: {
			0: {
				items: 2,
				nav: true
			},
			768: {
				items: 4,
				nav: true
			},
			1000: {
				items: 5,
				nav: true,
				loop: true
			}
		}
	});


});

/**
*
*/
function resizePanel() {
var w = $(window).width();
var h = $(window).height();
var dynamic_h = w*0.366;
$('.slider_panel').css('height', dynamic_h+'px');
}
