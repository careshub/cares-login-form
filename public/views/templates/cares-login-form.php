<?php
$current_url = is_ssl() ? 'https://' : 'http://';
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$redirect_url = $current_url;
if ( ! empty( $_REQUEST['redirect_to'] ) ) {
	$redirect_url = $_REQUEST['redirect_to'];
}

if ( is_user_logged_in() ) :
	if ( clf_get_param( 'show_logout_link' ) ) :
		?>

		<?php
		/**
		 * Fires before the display of widget content if logged in.
		 *
		 * @since 1.0.0
		 */
		do_action( 'cares_before_login_widget_loggedin' );


		if ( function_exists( 'buddypress' ) ) : ?>

			<div class="cares-login-widget-user-avatar">
				<a href="<?php echo bp_loggedin_user_domain(); ?>">
					<?php bp_loggedin_user_avatar( 'type=thumb&width=50&height=50' ); ?>
				</a>
			</div>

			<div class="cares-login-widget-user-links">
				<div class="cares-login-widget-user-link"><?php echo bp_core_get_userlink( get_current_user_id() ); ?></div>
				<div class="cares-login-widget-user-logout"><a class="logout" href="<?php echo wp_logout_url( $current_url ); ?>"><?php _e( 'Log Out', 'cares-login-form' ); ?></a></div>
			</div>

		<?php else : ?>

			<div class="cares-login-widget-user-logout"><a class="logout" href="<?php echo wp_logout_url( $current_url ); ?>"><?php _e( 'Log Out', 'cares-login-form' ); ?></a></div>

		<?php endif; ?>

	<?php
	endif;

	/**
	 * Fires after the display of widget content if logged in.
	 *
	 * @since 1.9.0
	 */
	do_action( 'cares_after_login_widget_loggedin' ); ?>

<?php else : ?>
	<?php echo cares_login_form_css(); ?>
	<div>
		<?php

		/**
		 * Fires before the display of widget content if logged out.
		 *
		 * @since 1.9.0
		 */
		do_action( 'cares_before_login_widget_loggedout' );

		$form_id = clf_get_param( 'id' ) ? clf_get_param( 'id' ) : 'cares-login-widget-form';
		$form_classes = clf_get_param( 'classes' ) ? clf_get_param( 'classes' ) : 'standard-form';
		?>

		<form name="cares-login-form" id="<?php echo esc_attr( $form_id ); ?>" class="cares-login-form <?php echo esc_attr( $form_classes ); ?>" action="<?php echo esc_url( wp_login_url() ); ?>" method="post">
			<label for="cares-login-widget-user-login"><?php _e( 'Username or email address', 'cares-login-form' ); ?> <br />
				<input type="text" name="log" id="cares-login-widget-user-login" class="input" value="" />
			</label>

			<label for="cares-login-widget-user-pass"><?php _e( 'Password', 'cares-login-form' ); ?> <br />
				<input type="password" name="pwd" id="cares-login-widget-user-pass" class="input" value="" spellcheck="false" autocorrect=false autocapitalize="none" />
			</label>

			<div class="forgetmenot"><label for="cares-login-widget-rememberme"><input name="rememberme" type="checkbox" id="cares-login-widget-rememberme" value="forever" /> <?php _e( 'Keep me logged in', 'cares-login-form' ); ?></label></div>

			<input type="hidden" name="redirect_to" value="<?php echo $redirect_url; ?>" />

			<div class="cares-login-action-login-register">
				<?php

				/**
				 * Fires inside the display of the login widget form,
				 * before the submit button
				 *
				 * @since 1.1.0
				 */
				do_action( 'cares_login_widget_form_before_submit' );

				?>

				<input type="submit" name="cares-login-widget-submit" id="cares-login-widget-submit" value="<?php esc_attr_e( 'Log In', 'cares-login-form' ); ?>" />

				<?php if ( get_option( 'users_can_register' ) ) : ?>

					<span class="cares-login-widget-register-link"><a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php _e( 'Register', 'cares-login-form' ); ?></a></span>

				<?php endif; ?>
			</div>

			<div class="login-meta">
				<a href="<?php echo wp_lostpassword_url( $current_url ); ?>" class="forgot-password">Forgot your password or username?</a>

				<?php

				/**
				 * Fires inside the display of the login widget form.
				 *
				 * @since 1.0.0
				 */
				do_action( 'cares_login_widget_form' );

				?>
			</div>
		</form>
	</div>

	<?php

	/**
	 * Fires after the display of widget content if logged out.
	 *
	 * @since 1.9.0
	 */
	do_action( 'cares_after_login_widget_loggedout' ); ?>

<?php endif;
