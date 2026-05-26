<?php
/**
 * Plugin Name: Sumzim Maintenance Mode
 * Description: Redirects non-admin visitors to maintenance.php when wp-content/maintenance-active exists.
 * Enable:  touch wp-content/maintenance-active
 * Disable: rm wp-content/maintenance-active
 */

add_action( 'template_redirect', function () {

	$flag = WP_CONTENT_DIR . '/maintenance-active';

	if ( ! file_exists( $flag ) ) {
		return;
	}

	// Let logged-in admins through.
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	wp_redirect( home_url( '/maintenance.php' ), 302 );
	exit;

} );
