<?php
/**
 * @package   Cares_Login_Form
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 */

namespace Cares_Login_Form\Public_Facing;

// Load plugin text domain
add_action( 'init', __NAMESPACE__ . '\\load_plugin_textdomain' );

// Load public-facing style sheet and JavaScript.
// add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles_scripts' );

// Add the shortcode handler
add_shortcode( 'cares-login-form', __NAMESPACE__ . '\\render_shortcode' );

/**
 * Load the plugin text domain for translation.
 *
 * @since    1.0.0
 */
function load_plugin_textdomain() {
	$domain = \Cares_Login_Form\get_plugin_slug();
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
}

/**
 * Register and enqueue public-facing style sheet.
 *
 * @since    1.0.0
 */
function enqueue_styles_scripts() {
}

/**
 * Render the login form shortcode.
 *
 * @since   1.0.0
 *
 * @param $atts Attributes as parsed by WP's shortcode handler.
 *
 * @return  html The pane.
 */
function render_shortcode( $atts ) {
	global $cares_login_form_params;

	$a = shortcode_atts( array(
		'show_logout_link' => false,
		'id'               => false,
		'classes'          => false
		), $atts );

	$cares_login_form_params = $a;

	$templates = new Template_Loader;

	ob_start();

	$templates->get_template_part( 'cares-login-form' );

	return ob_get_clean();
}
