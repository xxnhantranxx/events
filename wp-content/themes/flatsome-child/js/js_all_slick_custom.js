jQuery(document).ready(function($){
	$(document).ready(function(){
		$('.slider_other_website').slick({
			lazyLoad: 'ondemand',
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			nextArrow: '<i class="fas fa-arrow-circle-right"></i>',
			prevArrow: '<i class="fas fa-arrow-circle-left"></i>',
			infinite: true,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
						}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
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
	});
});