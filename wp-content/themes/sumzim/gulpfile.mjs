import gulp from 'gulp';
const { src, dest, watch, series, task } = gulp;

import * as dartSass from 'sass'
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);

import autoprefixer from 'gulp-autoprefixer';
import minify from 'gulp-clean-css';
import terser from 'gulp-terser';
import concat from 'gulp-concat';
import rename from 'gulp-rename';
import header from 'gulp-header';
import plumber from 'gulp-plumber';
import sourcemaps from 'gulp-sourcemaps';

import { utimesSync } from 'node:fs';

// gulp copies the source file's mtime onto its output, so a rebuilt file keeps
// an old mtime. functions.php uses filemtime() as the ?ver= cache buster, so
// without this the browser and WP Rocket keep serving the previous asset.
function touch(file) {
    const now = new Date();
    utimesSync(file, now, now);
}

const themeHeader = `/*!
Theme Name: Summers & Zim's
Theme URI: https://sumzim.com/wp-content/themes/sumzim
Author: Box & Pixel
Author URI: https://boxandpixel.com
Description: The Summers & Zim's theme is built by Box & Pixel and is based on _s by Automattic.
Version: 1.2
Tested up to: 5.4
Requires PHP: 5.6
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: sumzim
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready
*/\n\n`;

// scss
function stylesMain() {
    return src('src/scss/main/site.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(minify())
        .pipe(header(themeHeader))
        .pipe(rename('style.css'))
        .pipe(dest('./'))
        .on('end', () => touch('./style.css'));
}

// js
function scriptsMain() {
    return src('src/js/main/*.js')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.min.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./'))
        .on('end', () => touch('./scripts.min.js'));
}

// watch
function watchTask() {
    watch(
        [
            'src/scss/main/**/*.scss',
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
