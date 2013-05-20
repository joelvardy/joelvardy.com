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


	// Style full width images
	var fullWidthImages = function(event) {
		$('div.photo.full-width').each(function() {

			// Convert image tags into background images
			if (null == event) {
				$(this).css('background-image', 'url('+$('img', this).attr('src')+')');
				$('img', this).remove();
			}

			// Ensure photos are full width
			var bodyMargin = Math.ceil(parseFloat($('body').css('margin-left')));
			$(this).css('margin-left', -bodyMargin+'px');
			$(this).css('margin-right', -bodyMargin+'px');

		});
	}
	fullWidthImages();
	$(window).bind('resize', fullWidthImages);


});