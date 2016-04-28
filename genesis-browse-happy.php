<?php
/**
 * Genesis Browse Happy
 *
 * @package    Genesis_Browse_Happy
 * @author     Craig Simpson <csimps@gmail.com>
 * @license    GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Browse Happy
 * Plugin URI:        https://github.com/craigsimps/genesis-browse-happy
 * Description:       Adds a basic notification bar and link to http://browsehappy.com if visitor is using IE8 or below.
 * Version:           1.0.0
 * Author:            Craig Simpson
 * Text Domain:	      genesis-browse-happy
 * Domain Path	      /languages
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: craigsimps/genesis-browse-happy
 * GitHub Plugin URI: https://github.com/craigsimps/genesis-browse-happy
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'genesis_before', 'bh_browse_happy' );
/**
 * Output the Browse Happy notice if browser is IE8 or below.
 *
 * @since 1.0.0
 */
function bh_browse_happy() {
	?>
	<!--[if lte IE 8]>
	<?php echo sprintf( '<p class="browser-upgrade">%s<strong>%s</strong>%s<a href="%s">%s</a>%s</p>', esc_html( 'You are using an ', 'genesis-browse-happy' ), esc_html( 'outdated', 'genesis-browse-happy' ), esc_html( ' browser. Please ', 'genesis-browse-happy' ), esc_url( 'http://browsehappy.com' ),	esc_html( 'upgrade your browser', 'genesis-browse-happy' ), esc_html( ' to improve your experience.', 'genesis-browse-happy' ) ); ?>
	<![endif]-->
	<?php
}

add_action( 'wp_enqueue_scripts', 'bh_enqueue_style' );
/**
 * Include the Browse Happy styles if the browser is IE8 or below.
 *
 * @since 1.0.0
 */
function bh_enqueue_style() {
	global $wp_styles;
	wp_enqueue_style( 'genesis-browse-happy', esc_url( plugin_dir_url( __FILE__ ) . 'css/genesis-browse-happy.css' ) );
	$wp_styles->add_data( 'genesis-browse-happy', 'conditional', 'lte IE 8' );
}
