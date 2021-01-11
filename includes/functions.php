<?php
/**
 * @package   Cares_Login_Form
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 */

 // Functions in the global scope.

/**
 * A helper function to fetch parameter data from the global variable.
 * Really, this is just a helper function to hide the shame of
 * resorting to using a global variable.
 *
 * @since 1.0.0
 * @param string $param The parameter to fetch.
 * @return mixed The value for the parameter.
 */
function clf_get_param( $param ) {
	global $cares_login_form_params;
	$retval = false;

	if ( is_array( $cares_login_form_params ) && isset( $cares_login_form_params[$param] ) ) {
		$retval = $cares_login_form_params[$param];
	}
	return $retval;
}

/**
 * A helper function to generate the css for the form.
 * This is to allow for custom css in the future.
 *
 * @since 1.0.0
 * @return string The css rules.
 */
function cares_login_form_css() {
	?>
	<style type="text/css">
		.cares-login-form label,
		.cares-login-action-login-register {
			display: block;
		}
		.cares-login-widget-register-link {
			float: right;
		}
	</style>
	<?php
}
