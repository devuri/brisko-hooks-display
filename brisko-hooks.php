<?php
/**
 * Brisko Hooks Display
 *
 * @package   BriskoHooksDisplay
 * @author    Uriel Wilson
 * @copyright 2020 Uriel Wilson
 * @license   GPL-2.0
 * @link      https://urielwilson.com
 *
 * @wordpress-plugin
 * Plugin Name:       Brisko Hooks Display
 * Plugin URI:        https://switchwebdev.com/wordpress-plugins/
 * Description:       Visual display of the brisko theme hooks.
 * Version:           1.0.4
 * Requires at least: 3.4
 * Requires PHP:      5.6
 * Author:            SwitchWebdev.com
 * Author URI:        https://switchwebdev.com
 * Text Domain:       brisko-hooks-display
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

  	// deny direct access.
    if ( ! defined( 'WPINC' ) ) {
      	die;
    }

  	// plugin directory.
	define( 'DBRISKOHKS_VERSION', '1.0.3' );

	// plugin directory.
    define( 'DBRISKOHKS_DIR', dirname( __FILE__ ) );

  	// plugin url.
    define( 'DBRISKOHKS_URL', plugins_url( '/', __FILE__ ) );
// -----------------------------------------------------------------------------

	/**
	 *  Load the main class.
	 */
	require_once plugin_dir_path( __FILE__ ) . '/src/class-display-brisko-hooks.php';

	/**
	 * Display the hooks
	 */
	Briskokit\Display_Hooks::visualize();
