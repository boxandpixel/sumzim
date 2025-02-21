import gulp from 'gulp';
const { src, dest, watch, series, task } = gulp;

import * as dartSass from 'sass'
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);

import autoprefixer from 'gulp-autoprefixer';
import minify from 'gulp-clean-css';
import terser from 'gulp-terser';

// Functions


// scss
function stylesMain() {
    return src('src/scss/main/*.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(minify())
        .pipe(dest('dist/'));
}


// js
function scriptsMain() {
    return src('src/js/main/*.js')
        .pipe(terser())
        .pipe(dest('dist/'))
}

// watch
function watchTask() {
    watch(
        [
            'src/scss/main/*.scss',
            'src/js/main/*.js',
        ], 
        series(stylesMain, scriptsMain)
    )

}

// Run gulp
task('default', series(
    stylesMain,
    scriptsMain,
    watchTask,
));
