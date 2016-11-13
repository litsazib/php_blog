(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');	
	slider.setup('masterslider' , {
		 width:1400,    // slider standard width
		 height:600,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 overPause: true,
		 autoplay:true,
		 view:"parallax"
	});
})(jQuery);
// ===============
(function($) {
 "use strict";
	var slider = new MasterSlider();
		slider.setup('masterslider2' , {
		 width:1400,    // slider standard width
		// height:580,    slider standard height
		 space:1,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true
	});
})(jQuery);
// ================
	$('#slider').loopSlider({
		autoMove : true,
		mouseOnStop : true,
		turn : 9000,
		motion : 'swing',
		delay: 500,
		width : 750,
		height : 350,
		marginLR : 5,
		viewSize : 100,
		viewOverflow : 'visible',
		navPositionBottom : 30,
		navibotton : true,
		navbtnImage : ''
	});