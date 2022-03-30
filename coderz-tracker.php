<?php
/**
 * Coderz Tracker
 *
 * @package       CODERZTRAC
 * @author        Coderz
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Coderz Tracker
 * Plugin URI:    https://coderzvisiontech.com/
 * Description:   This is some demo short description...
 * Version:       1.0.0
 * Author:        Coderz
 * Author URI:    https://your-author-domain.com
 * Text Domain:   coderz-tracker
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Coderz Tracker. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'CODERZTRAC_NAME',			'Coderz Tracker' );

// Plugin version
define( 'CODERZTRAC_VERSION',		'1.0.0' );

// Plugin Root File
define( 'CODERZTRAC_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'CODERZTRAC_PLUGIN_BASE',	plugin_basename( CODERZTRAC_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'CODERZTRAC_PLUGIN_DIR',	plugin_dir_path( CODERZTRAC_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'CODERZTRAC_PLUGIN_URL',	plugin_dir_url( CODERZTRAC_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once CODERZTRAC_PLUGIN_DIR . 'core/class-coderz-tracker.php';


 
/**
 * Updater class for WordPress plugins hosted with Github.
 *
 * @since   1.1
 * @author  WP Theme Tutorial, Curtis McHale
 * @link    https://github.com/jkudish/WordPress-GitHub-Plugin-Updater
 */
function sfn_gfcoupon_github_updater(){

  /* includes the update from Github code */
  require_once( plugin_dir_path( __FILE__ ) . '/updater.php' );

  define('WP_GITHUB_FORCE_UPDATE', true);

  if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
      $config = array(
          'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
          'proper_folder_name' => 'coderz-tracker', // this is the name of the folder your plugin lives in
          'api_url' => 'https://api.github.com/repos/pravincoderz/coderz-tracker', // the github API url of your github repo
          'raw_url' => 'https://raw.github.com/pravincoderz/coderz-tracker/master', // the github raw url of your github repo
          'github_url' => 'https://github.com/pravincoderz/coderz-tracker', // the github url of your github repo
          'zip_url' => 'https://github.com/pravincoderz/coderz-tracker/zipball/master', // the zip url of the github repo
          'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
          'requires' => '1.0', // which version of WordPress does your plugin require?
          'tested' => '1.0', // which version of WordPress is your plugin tested up to?
          'readme' => 'readme.txt' // which file to use as the readme for the version number
      );
      new WPGitHubUpdater($config);
  }
}
add_action( 'init', 'sfn_gfcoupon_github_updater' );


/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Coderz
 * @since   1.0.0
 * @return  object|Coderz_Tracker
 */
function CODERZTRAC() {
	return Coderz_Tracker::instance();
}

CODERZTRAC();
