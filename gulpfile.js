// Load plugins
var gulp = require('gulp'),
	del = require('del'),
	concat = require('gulp-concat'),
	notify = require('gulp-notify'),
	sass = require('gulp-ruby-sass'),
	uglify = require('gulp-uglifyjs');


// SASS
gulp.task('styles', function () {
	return gulp.src('public/assets/sass/design.scss')
	.pipe(sass({
		style: 'compressed'
	}))
	.on('error', notify.onError(function (error) {
		return error.message;
	}))
	.pipe(gulp.dest('public/assets/minified'))
	.pipe(notify({
		title: 'Styles',
		message: 'Task complete'
	}));
});


// JavaScript
gulp.task('scripts', function () {
	return gulp.src('public/assets/js/**/*.js')
	.pipe(concat('main.js'))
	.pipe(gulp.dest('public/assets/minified'))
	.pipe(uglify({
		outSourceMap: true
	}))
	.pipe(gulp.dest('public/assets/minified'))
	.pipe(notify({
		title: 'Scripts',
		message: 'Task complete'
	}));
});


// Clean
gulp.task('clean', function() {
	del(['public/assets/minified']);
});


// Default task
gulp.task('default', ['clean'], function() {
	gulp.start('styles', 'scripts');
});

// Watch
gulp.task('watch', function() {
	gulp.watch('public/assets/sass/**/*.scss', ['styles']);
	gulp.watch('public/assets/js/**/*.js', ['scripts']);
});
