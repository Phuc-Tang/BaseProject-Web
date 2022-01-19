(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

})(jQuery);

$('input[type="radio"]').on('change', function() {
	$('input[type="radio"]').not(this).prop('checked', false);
 });