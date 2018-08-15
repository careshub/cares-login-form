** Basic Usage **
Use the shortcode [cares-login-form] to add a loging form to your page.

** Shortcode Parameters **
* Add the parameter "show_logout_link" to be display a logout link in the place of the login form when the user is logged in. E.g. [cares-login-form show_logout_link="true"]
* Add the parameter "id" to override the default id, 'cares-login-widget-form'. E.g. [cares-login-form id="my-custom-id"]
* Add the parameter "classes" to override the default class, 'standard-form'. E.g. [cares-login-form classes="one two"]

** Customizations **
If you want to override the login form template for a particular theme, copy /public/templates/cares-login-form.php to the root of your theme (still using the file name cares-login-form.php), and the template chooser will use that template in preference to the template bundled with this plugin.
