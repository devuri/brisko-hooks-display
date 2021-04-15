<?php

namespace Briskokit;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Briskokit\Display_Hooks' ) ) {

	/**
	 * Display_Hooks
	 */
	final class Display_Hooks {

		/**
		 * Private $instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Singleton
		 *
		 * @return object
		 */
		public static function init() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Brisko Hooks Displays is ready.
		 *
		 * @return void
		 */
		public function loaded() {
			do_action( 'brisko_hooks_display' );
		}

	    /**
	     * Brisko actions
	     * list of actions available
	     *
	     * @return array actions
	     */
	    public function brisko_actions() {

			// header.
			$actions[] = 'brisko_before_header';
			$actions[] = 'brisko_custom_header';
			$actions[] = 'brisko_navigation';
			$actions[] = 'brisko_nav_menu';
			$actions[] = 'brisko_after_header';
			$actions[] = 'brisko_homepage_header';

			// post.
			$actions[] = 'brisko_post_header';
			$actions[] = 'brisko_blog_title';
			$actions[] = 'brisko_blog_subtitle';
			$actions[] = 'brisko_before_entry_meta';
			$actions[] = 'brisko_after_entry_meta';
			$actions[] = 'brisko_related_content';
			$actions[] = 'brisko_after_post_content';

			// comments.
			$actions[] = 'brisko_before_comments';
			$actions[] = 'brisko_after_comments';

			// page.
			$actions[] = 'brisko_page_header';
			$actions[] = 'brisko_page_footer';

			// sidebar.
			$actions[] = 'brisko_before_sidebar';
			$actions[] = 'brisko_after_sidebar';

			// footer.
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
	    public function is_brisko_active() {
	    	if ( 'brisko' === get_option( 'template' ) ) {
	        	return true;
	      	} else {
	        	return false;
	      	}
	    }

		/**
		 * Display the Hooks
		 *
		 * @param  string|null $get_action .
		 */
		private function display_hooks( $get_action = null ) {

			if ( is_null( $get_action ) ) {
				return null;
			}

			if ( false === get_theme_mod( 'display_brisko_hooks', false ) ) {
				return false;
			}

			// only show to admin user.
			// fix: showing to all users.
			if ( ! current_user_can( 'manage_options' ) ) {
				return false;
			}
			echo wp_kses_post( $get_action );
		}

	    /**
	     * Display Hooks
	     *
	     * @return void
	     * @link https://developer.wordpress.org/reference/functions/add_action/
	     */
	    public function visualize() {
	      	if ( ! $this->is_brisko_active() ) { // @codingStandardsIgnoreLine
	        	// TODO maybe add a admin notice.
	      	} else {
		        foreach ( $this->brisko_actions() as $actionkey => $action ) {
		          	/**
		           	 * TODO only show this to the admin user
		           	 */
		          	add_action( $action, function() use ( $action ) {
			            $style = 'style="border:dotted thin #bac4cc;padding: 2px;text-align: center; background-color: #e3eff9;"';

			            $action_area = '<div class="action-area" ' . $style . '>';
			            $action_area .= $action;
			            $action_area .= '</div>';

			            	if ( is_user_logged_in() ) {
			              		$this->display_hooks( $action_area );
			            	}
						}, 99, 1
					);
		        }
	      	}
    	}
  	}
}
