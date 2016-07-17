var gulp = require('gulp'),
	runSequence = require('run-sequence'),
	sourcemaps = require('gulp-sourcemaps'),
	sass = require('gulp-sass'),
	cleanCSS = require('gulp-clean-css'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	minify = require('gulp-minify');

gulp.task('sass', function() {
	return gulp.src("css/scss/main.scss")
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('css'));
});

gulp.task('minifyCSS', function() {
	return gulp.src('css/main.css')
		.pipe(cleanCSS({
			keepSpecialComments: 0
		}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('css'));
});

gulp.task('concat', function() {
	return gulp.src('js/parts/*.js')
		.pipe(sourcemaps.init())
		.pipe(concat('main.js'))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('js'));
});

gulp.task('minifyJS', function() {
	return gulp.src('js/main.js')
		.pipe(minify({
			ext: {
				src: '.js',
				min: '.min.js'
			}
		}))
		.pipe(gulp.dest('js'));
});

gulp.task('default', function(callback) {
	runSequence(['sass', 'concat'], ['minifyCSS', 'minifyJS']);
});
