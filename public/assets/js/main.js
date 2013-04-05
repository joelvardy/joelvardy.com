Zepto(function($) {


	// Track external clicks (only run this if GA has loaded)
	ga(function() {
		$('body').on('click', 'a', function(event) {

			var url, title;
			title = $(this).attr('data-analytics');

			if (title) {

				event.preventDefault();

				url = $(this).attr('href');

				ga('send', 'event', 'External', 'Exit Website', title, {
					'hitCallback': function() {
						document.location.href = url;
					}
				});

			}

		});
	});


	// Style photowall
	var photowall = $('#photowall');
	if (photowall.length !== 0) {

		// Extend to edges of page
		var positionPhotowall = function() {
			var bodyMargin = Math.ceil(parseFloat($('body').css('margin-left')));
			photowall.css('margin-left', -bodyMargin+'px');
			photowall.css('margin-right', -bodyMargin+'px');
		}
		positionPhotowall();
		$(window).bind('resize', positionPhotowall);

	}


});