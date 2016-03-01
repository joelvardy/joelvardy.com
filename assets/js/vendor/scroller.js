'use strict';

/*
 * Based on work done by Nikhil Nigade (@dezinezync) https://gist.github.com/dezinezync/5487119
 */

var DEFAULT_ELEMENT = document.documentElement.scrollTop ? document.documentElement : document.body;
var REQUEST_ANIMATION_FRAME = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.oRequestAnimationFrame;


/**
 * Creates a new Scroller object.
 *
 * @param {HTMLElement} element
 */
var Scroller = function Scroller (element) {

	element = element ? element : DEFAULT_ELEMENT;

	var prefs = {
		easing: Scroller.easing.linear
	};

	/**
	 * Sets the easing function function to use.
	 * @param {Function} easing The easing function to use.
	 * @returns {Scroller}
	 */
	this.easing = function (easing) {
		prefs.easing = easing;
		return this;
	};

	/**
	 * Scrolls the prepared element to targetX and targetY.
	 * @param {Number} targetX
	 * @param {Number} targetY
 	 * @param {Number} duration
	 */
	this.to = function (targetX, targetY, duration) {

		var startX = element.scrollLeft,
			startY = element.scrollTop;

		var distanceX = (targetX - startX),
			distanceY = (targetY - startY);

		// Prevent Scrolling if already there.
		if (startX === targetX && startY === targetY) return;

		var startTime = Date.now();

		var scroll = function (/*timestamp*/) {

			var currentTime = Date.now(),
					time = Math.min(1, ((currentTime - startTime) / duration)),
					easedT = prefs.easing(time);

			element.scrollTop = (easedT * distanceY) + startY;
			element.scrollLeft = (easedT * distanceX) + startX;

			if (time < 1) {
				REQUEST_ANIMATION_FRAME.call(window, scroll);
			}

		};

		REQUEST_ANIMATION_FRAME(scroll);

	};

};

/*
 * Easing Functions - inspired from http://gizma.com/easing/
 * only considering the t value for the range [0, 1] => [0, 1]
 */
Scroller.easing = {

	// no easing, no acceleration
	linear: function (t) {
		return t;
	},

	// accelerating from zero velocity
	easeInQuad: function (t) {
		return t * t;
	},

	// decelerating to zero velocity
	easeOutQuad: function (t) {
		return t * (2 - t);
	},

	// acceleration until halfway, then deceleration
	easeInOutQuad: function (t) {
		return t < .5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
	},

	// accelerating from zero velocity
	easeInCubic: function (t) {
		return t * t * t;
	},

	// decelerating to zero velocity
	easeOutCubic: function (t) {
		return (--t) * t * t + 1;
	},

	// acceleration until halfway, then deceleration
	easeInOutCubic: function (t) {
		return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
	},

	// accelerating from zero velocity
	easeInQuart: function (t) {
		return t * t * t * t;
	},

	// decelerating to zero velocity
	easeOutQuart: function (t) {
		return 1 - (--t) * t * t * t;
	},

	// acceleration until halfway, then deceleration
	easeInOutQuart: function (t) {
		return t < .5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
	},

	// accelerating from zero velocity
	easeInQuint: function (t) {
		return t * t * t * t * t;
	},

	// decelerating to zero velocity
	easeOutQuint: function (t) {
		return 1 + (--t) * t * t * t * t;
	},

	// acceleration until halfway, then deceleration
	easeInOutQuint: function (t) {
		return t < .5 ? 16 * t * t * t * t * t : 1 + 16 * (--t) * t * t * t * t;
	}

};

window.Scroller = Scroller;

