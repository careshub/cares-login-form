<?php
/**
 *
 * @package   Cares_Login_Form
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 *
 * @wordpress-plugin
 * Plugin Name:       CARES Login Form
 * Plugin URI:        @TODO
 * Description:       Add a login form using a shortcode.
 * Version:           1.1.0
 * Author:            dcavins
 * Text Domain:       cares-login-form
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/careshub/cares-login-form
 */

namespace Cares_Login_Form;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

function init() {
	$base_path = plugin_dir_path( __FILE__ );

	// Functions in the global scope.
	require_once( $base_path . 'includes/functions.php' );

	// Template loader class.
	require_once( $base_path . 'includes/class-gamajo-template-loader.php' );
	require_once( $base_path . 'includes/class-clf-template-loader.php' );
	require_once( $base_path . 'public/public.php' );

	// Support for interacting with other login plugins, like Invisible ReCAPTCHA
	require_once( $base_path . 'includes/integrations.php' );
}
add_action( 'init', __NAMESPACE__ . '\\init', 2 );

/*
 * Helper function.
 * @return Fully-qualified URI to the root of the plugin.
 */
function get_plugin_base_uri(){
	return plugin_dir_url( __FILE__ );
}

/*
 * Helper function.
 * @return Directory path to the root of the plugin.
 */
function get_plugin_base_dir_path(){
	return plugin_dir_path( __FILE__ );
}

/*
 * Helper function.
 * @TODO: Update this when you update the plugin's version above.
 *
 * @return string Current version of plugin.
 */
function get_plugin_version(){
	return '1.0.0';
}
function get_plugin_slug(){
	return 'cares-login-form';
}
