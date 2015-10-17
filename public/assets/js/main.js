/**
 * Add .startsWith() to strings
 */
if (typeof String.prototype.startsWith !== 'function') {
    String.prototype.startsWith = function (string) {
        return this.indexOf(string) === 0;
    };
}

window.addEventListener('DOMContentLoaded', function () {

    // Track external clicks (only run this if GA has loaded)
    ga(function () {
        var anchors = document.querySelectorAll('a[data-analytics]');
        for (var i = 0; i < anchors.length; ++i) {
            anchors[i].addEventListener('click', function (event) {

                event.preventDefault();

                var _this = this;
                ga('send', 'event', 'External', 'Exit Website', this.dataset.analytics, {
                    'hitCallback': function () {
                        document.location.href = _this.href;
                    }
                });

            }, false);
        }
    });

    // Style full width images
    var fullWidthImages = function (event) {

        var images = document.querySelectorAll('div.photo.full-width');
        for (var i = 0; i < images.length; ++i) {

            var imageContainer = images[i];
            var image = imageContainer.querySelector('img');

            // Convert image tags into background images (if this is not being called by resize event)
            if (event === null) {
                imageContainer.style.backgroundImage = 'url(' + image.src + ')';
                image.parentNode.removeChild(image);
            }

            // Ensure photos are full width
            var container = imageContainer.parentNode,
                bodyMargin = Math.ceil((document.documentElement.clientWidth - parseFloat(window.getComputedStyle(container).width)) / 2);
            imageContainer.style.marginLeft = -bodyMargin + 'px';
            imageContainer.style.marginRight = -bodyMargin + 'px';

        }

    };
    fullWidthImages(); // Running without event object will make DOM changes
    window.addEventListener('resize', fullWidthImages, false);

    // Style galleries
    (function () {

        var galleries = document.querySelectorAll('div.gallery');
        for (var i = 0; i < galleries.length; ++i) {

            var galleryContainer = galleries[i];

            var photos = galleryContainer.querySelectorAll('div.photo');
            for (var j = 0; j < photos.length; ++j) {
                var image = photos[j].querySelector('img');
                photos[j].style.backgroundImage = 'url(' + image.src + ')';
                image.parentNode.removeChild(image);
            }

        }

    })();

    // Scroll smoothly to anchor on page
    (function (duration) {

        var anchors = document.getElementsByTagName('a');
        for (var i = 0; i < anchors.length; ++i) {
            if (!anchors[i].getAttribute('href').startsWith('#')) continue;
            anchors[i].addEventListener('click', function (event) {

                event.preventDefault();

                var targetPosition = document.getElementById(event.target.getAttribute('href').substring(1)).offsetTop;

                var scroller = new window.Scroller(document.body)
                    .easing(window.Scroller.easing.easeInOutQuad);
                scroller.to(0, targetPosition, duration);

            }, false);
        }

    })(250);

});
