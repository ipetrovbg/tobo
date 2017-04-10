var gulp 		= require('gulp'),
	watch 		= require('gulp-watch'),
	less 		= require('gulp-less'),
	rename 		= require('gulp-rename'),
	path 		= require('path');

var watcher 	= gulp.watch(['css/**/*.less', 'js/**/*.less']);
var css 		= './css';

gulp.task('less', function () {
  	return gulp.src(['css/**/*.less', 'js/**/*.less'])
  		.pipe(rename({dirname: ''}))
		.pipe(less())
		.pipe( gulp.dest( './css' ) );
});

gulp.task('default', ['less'], function () {
	watcher.on('change', function(event) {
		console.log( 'Compile: ', event.path );
		gulp.src(event.path)
			.pipe(rename({dirname: ''}))
			.pipe(less())
			.pipe( gulp.dest( './css' ) );

	});
});