// Track external clicks (only run this if GA has loaded)
ga(function() {
	var anchors = document.getElementsByTagName('a');
	for (var i = 0; i < anchors.length; i++) {
		anchors[i].addEventListener('click', function(event) {
			if (this.dataset.analytics) {

				event.preventDefault();

				ga('send', 'event', 'External', 'Exit Website', this.dataset.analytics, {
					'hitCallback': function() {
						document.location.href = this.href;
					}
				});

			}
		}, false);
	}
});


// Style full width images
var fullWidthImages = function(event) {
	var imageContainer = document.querySelector('div.photo.full-width'),
		image = imageContainer.querySelector('img');

	// Convert image tags into background images
	if (null == event) {
		imageContainer.style.backgroundImage = 'url('+image.src+')';
		image.parentNode.removeChild(image);
	}

	// Ensure photos are full width
	var body = document.querySelector('body'),
		bodyMargin = Math.ceil(parseFloat(window.getComputedStyle(body).marginLeft));
	imageContainer.style.marginLeft = -bodyMargin+'px';
	imageContainer.style.marginRight = -bodyMargin+'px';

}
fullWidthImages();
window.addEventListener('resize', fullWidthImages, false);