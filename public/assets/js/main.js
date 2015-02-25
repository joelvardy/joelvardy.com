if (typeof String.prototype.startsWith !== 'function') {

	// see below for better implementation!
	String.prototype.startsWith = function (string) {
		return this.indexOf(string) === 0;
	};

}

window.addEventListener('load', function (event) {


	// Track external clicks (only run this if GA has loaded)
	ga(function () {
		var anchors = document.getElementsByTagName('a');
		for (var i = 0; i < anchors.length; i++) {
			anchors[i].addEventListener('click', function (event) {
				if (this.dataset.analytics) {

					var _this = this;

					event.preventDefault();

					ga('send', 'event', 'External', 'Exit Website', this.dataset.analytics, {
						'hitCallback': function () {
							document.location.href = _this.href;
						}
					});

				}
			}, false);
		}
	});


	// Filter projects by type
	var filterProjects = function () {

		if ( ! document.querySelector('section[page=projects]')) return;

		var filterAnchor = document.querySelector('section[page=projects] a.filter'),
			hidePersonal = (window.location.hash !== '#contract'),
			anchor = {
				hide: {
					href: '/projects#contract',
					title: 'Hide all side and personal projects',
					text: 'show only contract work'
				},
				show: {
					href: '/projects',
					title: 'Show all projects',
					text: 'show all projects'
				}
			};

		var updateFilter = function () {

			window.history.replaceState(null, null, (hidePersonal ? anchor.show.href : anchor.hide.href));

			hidePersonal = ! hidePersonal;

			var link = (hidePersonal ? anchor.show : anchor.hide);
			filterAnchor.setAttribute('href', link.href);
			filterAnchor.setAttribute('title', link.title);
			filterAnchor.innerHTML = link.text;

			var projects = document.querySelectorAll('section[page=projects] div.project');
			for (var i = 0; i < projects.length; ++i) {

				var project = projects[i];

				if (hidePersonal) {
					if (project.classList.contains('contract')) continue;
					project.style.display = 'none';
				} else {
					project.style.display = 'block';
				}

			}

		}

		filterAnchor.addEventListener('click', function (event) {
			event.preventDefault();
			updateFilter();
		});

		updateFilter();

	}
	filterProjects();


	// Style full width images
	var fullWidthImages = function (event) {

		var images = document.querySelectorAll('div.photo.full-width');
		for (var i = 0; i < images.length; ++i) {

			var imageContainer = images[i];
			var image = imageContainer.querySelector('img');

			// Convert image tags into background images (if this is not being called by resize event)
			if (event == null) {
				imageContainer.style.backgroundImage = 'url('+image.src+')';
				image.parentNode.removeChild(image);
			}

			// Ensure photos are full width
			var container = imageContainer.parentNode,
				bodyMargin = Math.ceil((document.documentElement.clientWidth - parseFloat(window.getComputedStyle(container).width)) / 2);
			imageContainer.style.marginLeft = -bodyMargin+'px';
			imageContainer.style.marginRight = -bodyMargin+'px';

		}

	}
	fullWidthImages();
	window.addEventListener('resize', fullWidthImages, false);


	// Style galleries
	var galleries = function () {

		var galleries = document.querySelectorAll('div.gallery');
		for (var i = 0; i < galleries.length; ++i) {

			var galleryContainer = galleries[i];

			var photos = galleryContainer.querySelectorAll('div.photo');
			for (var i = 0; i < photos.length; ++i) {
				var image = photos[i].querySelector('img');
				photos[i].style.backgroundImage = 'url('+image.src+')';
				image.parentNode.removeChild(image);
			}

		}

	}
	galleries();


	// Scrolling
	var anchorScrolling = function (duration) {

		var anchors = document.getElementsByTagName('a');
		for (var i = 0; i < anchors.length; i++) {
			if ( ! anchors[i].getAttribute('href').startsWith('#')) continue;
			anchors[i].addEventListener('click', function (event) {

				event.preventDefault();

				var targetPosition = document.getElementById(event.target.getAttribute('href').substring(1)).offsetTop;

				var scroller = new window.Scroller()
				.easing(window.Scroller.easing.easeInOutQuad);
				scroller.to(0, targetPosition, duration);

			}, false);
		}

	}
	anchorScrolling(250);


	// Reload content after application cache update
	/**
	 * Don't reload page, changes will be visible on the subsequent page load
	window.applicationCache.addEventListener('updateready', function (event) {
		if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {
			window.location.reload();
		}
	}, false);
	*/


});
