<?php
/**
 * Change the WordPress admin color scheme if on local development URL.
 *
 * @package     KnowTheCode\UpDevTools\AdminColor
 * @since       1.1.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\UpDevTools\AdminColor;

add_filter( 'get_user_option_admin_color', __NAMESPACE__ . '\set_local_development_admin_color_scheme', 5 );
/**
 * Force different admin color scheme when user is developer on development server
 *
 * @link https://gist.github.com/billerickson/654faf38a4eb98842c7c3524fc092d8f
 *
 * @since 1.1.0
 *
 * @param string $color_scheme
 *
 * @return string
 */
function set_local_development_admin_color_scheme( $color_scheme ) {
	if ( ! is_dev_site() ) {
		return $color_scheme;
	}

	return 'coffee';
}

/**
 * Check if current site is a development site.
 *
 * @since 1.1.0
 *
 * @return bool
 */
function is_dev_site() {
	$dev_strings = array( 'localhost', '.dev' );
	$is_dev_site = false;

	foreach ( $dev_strings as $string ) {
		if ( strpos( home_url(), $string ) ) {
			$is_dev_site = true;
		}
	}

	return $is_dev_site;
}
