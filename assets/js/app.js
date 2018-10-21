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

});
