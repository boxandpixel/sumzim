<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sumzim
 */

if ( trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' ) !== 'page-not-found' ) {
	header( 'Location: ' . home_url( '/page-not-found/' ), true, 302 );
	exit;
}
