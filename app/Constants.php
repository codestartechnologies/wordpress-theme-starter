<?php
/**
 * Constants class file.
 *
 * This file contains Constants class which defines needed constants that will be used in your theme development.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App;

use Codestartechnologies\WordpressThemeStarter\Core\Constants as CoreConstants;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Constants' ) ) {
    /**
     * Constants Class
     *
     * @package     WordpressThemeStarter
     * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    class Constants extends CoreConstants
    {
        /**
         * Define core constants.
         *
         * @return void
         */
        public static function define_constants() : void
        {
            /**
             * Add WordPress Theme Starter default constants
             */
            parent::define_core_constants();

            /**
             * Define constants needed by your theme below
             */
        }
    }
}
