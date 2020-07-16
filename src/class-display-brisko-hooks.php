<?php

namespace Briskokit;

if (!defined('ABSPATH')) exit;

if (!class_exists('Briskokit\Display_Hooks')) {

	/**
	 * Display_Hooks
	 */
  final class Display_Hooks {

    /**
     * brisko_actions()
     *
     * list of actions available
     * @return array actions
     */
    public static function brisko_actions(){
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

    // /**
    //  * actions display
    //  * @return
    //  */
    // public static function display_action_area(){
    // 	$style = 'style="border:dotted thin #bac4cc;padding: 2px;text-align: center; background-color: #e3eff9;"';
    //
    // 	$action_area = '<div class="action-area" '.$style.'>';
    //   $action_area .= 'Brisko Action';
    // 	$action_area .= '</div>';
    //
    //   if ( is_user_logged_in() ) {
    //   	echo $action_area;
    //   }
    // }

    /**
     * check if brisko is active
     * @return boolean
     */
    public static function is_brisko_active(){
      if ( 'brisko' === get_option( 'template' )  ) {
        return 1;
      } else {
        return 0;
      }
    }

    /**
     * Display Hooks
     * @return
     * @link https://developer.wordpress.org/reference/functions/add_action/
     */
    public static function visualize(){
      if ( ! self::is_brisko_active() ) {
        // brisko is not active
        // TODO maybe add a admin notice
      } else {
        foreach ( self::brisko_actions() as $actionkey => $action) {
          /**
           * TODO only show this to the admin user
           */
          add_action( $action , function($a) use ($action) {
            $style = 'style="border:dotted thin #bac4cc;padding: 2px;text-align: center; background-color: #e3eff9;"';

            $action_area = '<div class="action-area" '.$style.'>';
            $action_area .= $action;
            $action_area .= '</div>';

            if ( is_user_logged_in() ) {
              echo $action_area;
            }
          }, 10, 1);
        }
      }
    }
  } // class
}
