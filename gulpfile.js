// Load plugins
var del = require('del'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

// Styles
gulp.task('styles', function () {

    return gulp.src('./public/assets/scss/design.scss')
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(autoprefixer())
        .on('error', function (error) {
            console.error('Error!', error);
        })
        .pipe(gulp.dest('./public/assets/minified'));

});

// JavaScript
gulp.task('scripts', function () {

    return gulp.src('./public/assets/js/**/*.js')
        .pipe(concat('app.js'))
        .pipe(uglify())
        .on('error', function (error) {
            console.error('Error!', error);
        })
        .pipe(gulp.dest('./public/assets/minified'));

});

// Clean
gulp.task('clean', function () {
    del(['./public/assets/minified/*']);
});

// Default task
gulp.task('default', ['clean'], function () {
    gulp.start('styles', 'scripts');
});

// Watch
gulp.task('watch', ['default'], function () {
    gulp.watch('./public/assets/scss/**/*.scss', ['styles']);
    gulp.watch('./public/assets/js/**/*.js', ['scripts']);
});
