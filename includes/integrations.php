<?php
/**
 * @package   Cares_Login_Form
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 */

 // Support for situations where other plugins are interacting with the login process.
namespace Cares_Login_Form\Integrations;

/**
 * Add necessary input for "Invisible reCaptcha" plugin by Mihai Chelaru, if active.
 *
 * @return string HTML element for Google Invisible Recaptcha to use.
 */
function add_invisible_recaptcha_container() {
	do_action( 'google_invre_render_widget_action' );
}
add_action( 'cares_login_widget_form',  __NAMESPACE__ . '\\add_invisible_recaptcha_container' );
