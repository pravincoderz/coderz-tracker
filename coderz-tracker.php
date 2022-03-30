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


    $updater = MakeitWorkPress\WP_Updater\Boot::instance();
    $updater->add(['type' => 'plugin', 'source' => 'https://github.com/pravincoderz/coderz-tracker.git']);

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
