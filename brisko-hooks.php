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
 * Plugin URI:        https://wpbrisko.com/wordpress-plugins/
 * Description:       Visual display of the brisko theme hooks.
 * Version:           1.3.1
 * Requires at least: 4.6
 * Requires PHP:      5.6
 * Author:            uriel
 * Author URI:        https://wpbrisko.com
 * Text Domain:       brisko-hooks-display
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

  	// deny direct access.
    if ( ! defined( 'WPINC' ) ) {
      	die;
    }

	/**
	 *  Load the main class.
	 */
	require_once plugin_dir_path( __FILE__ ) . '/src/class-display-brisko-hooks.php';


	// Display the hooks.
	Briskokit\Display_Hooks::init()->visualize();
