<?php
/**
 * Display Brisko Hooks
 *
 * @package           BriskoHooksDisplay
 * @author            Uriel Wilson
 * @copyright         2020 Uriel Wilson
 * @license           GPL-2.0
 * @link           		https://urielwilson.com
 *
 * @wordpress-plugin
 * Plugin Name:       Brisko Hooks Display
 * Plugin URI:        https://switchwebdev.com/wordpress-plugins/
 * Description:       Visual display of the brisko theme hooks.
 * Version:           0.1.0
 * Requires at least: 3.4
 * Requires PHP:      5.6
 * Author:            SwitchWebdev.com
 * Author URI:        https://switchwebdev.com
 * Text Domain:       brisko-hooks-display
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

  # deny direct access
    if ( ! defined( 'WPINC' ) ) {
      die;
    }

  # plugin directory
	  define("DBRISKOHKS_VERSION", '0.1.0');

  # plugin directory
    define("DBRISKOHKS_DIR", dirname(__FILE__));

  # plugin url
    define("DBRISKOHKS_URL", plugins_url( "/",__FILE__ ));
#  -----------------------------------------------------------------------------



	/**
	 * brisko_actions()
	 *
	 * list of actions available
	 * print_r(brisko_actions());
	 * @return array actions
	 */
	if ( ! function_exists( 'brisko_actions' ) ) :
		function brisko_actions(){
		 	$actions = array();
		 	$actions[] = 'brisko_before_header';
		 	$actions[] = 'brisko_after_header';
		 	$actions[] = 'brisko_homepage_header';
		 	$actions[] = 'brisko_post_header';
		 	$actions[] = 'brisko_page_header';
		 	$actions[] = 'brisko_page_footer';
		 	$actions[] = 'brisko_after_post_content';
		 	$actions[] = 'brisko_before_sidebar';
		 	$actions[] = 'brisko_after_sidebar';
		 	$actions[] = 'brisko_before_footer';
		 	$actions[] = 'brisko_footer';
		 	$actions[] = 'brisko_after_footer';
		 	return $actions;
		}
	endif;

function display_action_area(){
	$style = 'style="border:dotted thin #bac4cc;padding: 2px;text-align: center; background-color: #e3eff9;"';

	$action_area = '<div class="action-area" '.$style.'>';
	$action_area .= 'action area';
	$action_area .= '</div>';
	echo $action_area;
}
foreach (brisko_actions() as $actionkey => $action) {
	add_action($action, 'display_action_area');
}
