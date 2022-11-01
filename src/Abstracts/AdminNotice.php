<?php
/**
 * AdminNotice abstract class file.
 *
 * This file contains AdminNotice abstract class which contains contracts for classes that will register admin notifications.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link        https://codestar.com.ng
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'AdminNotice' ) ) {
    /**
     * Class Customizer
     *
     * This class contains contracts that will be used to register admin notifications.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    abstract class AdminNotice implements ActionHooks {
        /**
         * Register add_action() and remove_action().
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function register_actions(): void
        {
            add_action( 'admin_notices', array( $this, 'notification' ) );
        }

        /**
         * "admin_notices" action hook callback
         *
         * @access public
         * @abstract
         * @return void
         * @since 1.0.0
         */
        abstract public function notification() : void;
    }
}