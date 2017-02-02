<?php
/**
 * Genesis Browse Happy
 *
 * @package    Genesis_Browse_Happy
 * @author     Craig Simpson <craig@craigsimpson.scot>
 * @license    GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Browse Happy
 * Plugin URI:        https://github.com/craigsimps/genesis-browse-happy
 * Description:       Places a notification at the top of the screen and links the user to <a href="http://browsehappy.com/">Browse Happy</a> if they are  using IE9 or below.
 * Version:           1.0.1
 * Author:            Craig Simpson
 * Author URI:		  https://craigsimpson.scot/
 * Text Domain:	      genesis-browse-happy
 * Domain Path	      /languages
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: craigsimps/genesis-browse-happy
 * GitHub Plugin URI: https://github.com/craigsimps/genesis-browse-happy
 */

namespace BrowseHappy;

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'genesis_before', __NAMESPACE__ . '\\add_notice' );
/**
 * Output the Browse Happy notice if browser is IE9 or below.
 *
 * @since 1.0.0
 */
function add_notice() {
	echo '<!--[if lte IE 9]>';
	printf(
		/* translators: %s link to Browse Happy website */
		wp_kses_post( __( '<p class="browser-upgrade">You are using an <strong>outdated</strong> browser. Please <a href="%s">upgrade your browser</a> to improve your experience and security.</p>', 'genesis-browse-happy' ) ),
		esc_url( 'http://browsehappy.com/' )
	);
	echo '<![endif]-->';
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_style' );
/**
 * Include the Browse Happy styles if the browser is IE9 or below.
 *
 * @since 1.0.0
 */
function enqueue_style() {
	wp_enqueue_style( 'genesis-browse-happy', esc_url( plugin_dir_url( __FILE__ ) . 'css/genesis-browse-happy.css' ) );
	wp_style_add_data( 'genesis-browse-happy', 'conditional', 'lte IE 9' );
}
