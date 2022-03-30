<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Coderz_Tracker' ) ) :

	/**
	 * Main Coderz_Tracker Class.
	 *
	 * @package		CODERZTRAC
	 * @subpackage	Classes/Coderz_Tracker
	 * @since		1.0.0
	 * @author		Coderz
	 */
	final class Coderz_Tracker {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Coderz_Tracker
		 */
		private static $instance;

		/**
		 * CODERZTRAC helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Coderz_Tracker_Helpers
		 */
		public $helpers;

		/**
		 * CODERZTRAC settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Coderz_Tracker_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'coderz-tracker' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'coderz-tracker' ), '1.0.0' );
		}

		/**
		 * Main Coderz_Tracker Instance.
		 *
		 * Insures that only one instance of Coderz_Tracker exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Coderz_Tracker	The one true Coderz_Tracker
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Coderz_Tracker ) ) {
				self::$instance					= new Coderz_Tracker;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Coderz_Tracker_Helpers();
				self::$instance->settings		= new Coderz_Tracker_Settings();

				//Fire the plugin logic
				new Coderz_Tracker_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'CODERZTRAC/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once CODERZTRAC_PLUGIN_DIR . 'core/includes/classes/class-coderz-tracker-helpers.php';
			require_once CODERZTRAC_PLUGIN_DIR . 'core/includes/classes/class-coderz-tracker-settings.php';

			require_once CODERZTRAC_PLUGIN_DIR . 'core/includes/classes/class-coderz-tracker-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'coderz-tracker', FALSE, dirname( plugin_basename( CODERZTRAC_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.