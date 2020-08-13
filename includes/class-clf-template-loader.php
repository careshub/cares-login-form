<?php
/**
 * @package   Cares_Login_Form
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 */

namespace Cares_Login_Form\Public_Facing;

/**
 * Template loader.
 *
 * Originally based on functions in Easy Digital Downloads (thanks Pippin!).
 *
 * When using in a plugin, create a new class that extends this one and just overrides the properties.
 *
 * @package Gamajo_Template_Loader
 * @author  Gary Jones
 */
class Template_Loader extends \Gamajo_Template_Loader {
	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $filter_prefix = 'cares_login_form';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * Can either be a defined constant, or a relative reference from where the subclass lives.
	 *
	 * e.g. YOUR_PLUGIN_TEMPLATE or plugin_dir_path( dirname( __FILE__ ) ); etc.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $plugin_directory = '';

	/**
	 * Clean up template data.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		$this->plugin_directory = \Cares_Login_Form\get_plugin_base_dir_path() . 'public/views/';
	}

}
