jQuery( document ).ready(function() {
	jQuery('#news-category-slider').bxSlider({
	 	mode: 'fade',
  		pager: false,
  		auto: true,
  		nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
	});

	jQuery('#chitwan-news-slider').bxSlider({
	 	mode: 'fade',
  		pager: false,
  		auto: true,
  		nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
	});

	jQuery('#model-gallery-carousel').bxSlider({
  		pager: false,
  		auto: true,
  		nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		minSlides: 3,
		maxSlides: 4,
		slideWidth: 270,
		slideMargin: 20,
		moveSlides: 1,
	});

	jQuery('#entertainmnet-news-slider').bxSlider({
	 	mode: 'fade',
  		pager: false,
  		auto: true,
  		nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
	});
	
});
