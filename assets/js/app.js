window.addEventListener('DOMContentLoaded', function () {

    // Track external clicks (only run this if GA has loaded)
    ga(function () {
        var anchors = document.querySelectorAll('a[data-analytics]');
        [].forEach.call(anchors, function (anchor) {
            anchor.addEventListener('click', function (event) {

                event.preventDefault();

                var _this = this;
                ga('send', 'event', 'External', 'Exit Website', this.dataset.analytics, {
                    'hitCallback': function () {
                        document.location.href = _this.href;
                    }
                });

            }, false);
        });
    });

    // Scroll smoothly to anchor on page
    (function (duration) {
        var anchors = document.querySelectorAll('a');
        [].forEach.call(anchors, function (anchor) {
            if (!anchor.getAttribute('href').startsWith('#')) {
                return;
            }
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                var targetPosition = document.getElementById(anchor.getAttribute('href').substring(1)).offsetTop;

                var scroller = new window.Scroller(document.body).easing(window.Scroller.easing.easeInOutQuad);
                scroller.to(0, targetPosition, duration);
            }, false);
        });
    })(250);

});
