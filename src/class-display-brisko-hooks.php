<?php

namespace Briskokit;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Briskokit\Display_Hooks' ) ) {

	/**
	 * Display_Hooks
	 */
	final class Display_Hooks {

	    /**
	     * Brisko actions
	     * list of actions available
	     *
	     * @return array actions
	     */
	    public static function brisko_actions() {
		 	$actions = array();
		 	$actions[] = 'brisko_before_header';
		 	$actions[] = 'brisko_after_header';
		 	$actions[] = 'brisko_homepage_header';
		 	$actions[] = 'brisko_post_header';
		 	$actions[] = 'brisko_before_entry_meta';
		 	$actions[] = 'brisko_after_entry_meta';
		 	$actions[] = 'brisko_before_comments';
		 	$actions[] = 'brisko_after_comments';
		 	$actions[] = 'brisko_page_header';
		 	$actions[] = 'brisko_page_footer';
		 	$actions[] = 'brisko_after_post_content';
		 	$actions[] = 'brisko_before_sidebar';
		 	$actions[] = 'brisko_after_sidebar';
		 	$actions[] = 'brisko_before_footer';
		 	$actions[] = 'brisko_footer_credit';
		 	$actions[] = 'brisko_footer';
		 	$actions[] = 'brisko_after_footer';
		 	return $actions;
		}

	    /**
	     * Check if brisko is active
	     *
	     * @return bool
	     */
	    public static function is_brisko_active() {
	    	if ( 'brisko' === get_option( 'template' ) ) {
	        	return true;
	      	} else {
	        	return false;
	      	}
	    }

	    /**
	     * Display Hooks
	     *
	     * @return void
	     * @link https://developer.wordpress.org/reference/functions/add_action/
	     */
	    public static function visualize() {
	      	if ( ! self::is_brisko_active() ) { // @codingStandardsIgnoreLine
	        	// TODO maybe add a admin notice.
	      	} else {
		        foreach ( self::brisko_actions() as $actionkey => $action ) {
		          	/**
		           	 * TODO only show this to the admin user
		           	 */
		          	add_action( $action, function() use ( $action ) {
			            $style = 'style="border:dotted thin #bac4cc;padding: 2px;text-align: center; background-color: #e3eff9;"';

			            $action_area = '<div class="action-area" ' . $style . '>';
			            $action_area .= $action;
			            $action_area .= '</div>';

			            	if ( is_user_logged_in() ) {
			              		echo wp_kses_post( $action_area );
			            	}
						}, 99, 1
					);
		        }
	      	}
    	}
  	}
}
