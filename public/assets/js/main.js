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


});