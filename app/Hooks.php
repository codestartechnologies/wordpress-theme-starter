<?php
/**
 * Hooks class file.
 *
 * This file contains Hooks class which handles WordPress hooks in Your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App;

use Codestartechnologies\WordpressThemeStarter\Core\Hooks as CoreHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Hooks' ) ) {
    /**
     * Hooks Class
     *
     * @package     WordpressThemeStarter
     * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    class Hooks extends CoreHooks
    {
        /**
         * Register add_action() and remove_action().
         *
         * @return void
         */
        public function register_actions() : void
        {
            /**
             * Add WordPress Theme Starter default action hooks
             */
            parent::register_actions();

            /**
             * Add and remove action hooks below using add_action( 'hookname', callback ) and remove_action( 'hookname' );
             */
        }

        /**
         * Register add_filter() and remove_filter().
         *
         * @return void
         */
        public function register_filters() : void
        {
            /**
             * Add WordPress Theme Starter default filter hooks
             */
            parent::register_filters();

            /**
             * Add and remove filter hooks below using add_filter( 'hookname', callback ) and remove_filter( 'hookname' );
             */
        }
    }
}
