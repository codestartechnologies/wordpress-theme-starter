<?php
/**
 * Constants class file.
 *
 * This file contains Constants class which defines needed constants that will be used in Your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Core;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Constants' ) ) {
    /**
     * Class Constants
     *
     * This class defines needed constants that will be used in the theme development.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class Constants {
        /**
         * Define core constants.
         *
         * This methods defines constants needed by WordpressThemeStarter package.
         *
         * @access public
         * @static
         * @return void
         * @since 1.0.0
         */
        public static function define_core_constants() : void
        {

            /**
             * The directory for storing views that will be shown in the admin area
             */
            if ( ! defined( 'WTS_ADMIN_VIEWS_DIR' ) ) {
                define( 'WTS_ADMIN_VIEWS_DIR', 'views/admin' );
            }

            /**
             * The directory for storing views that will be shown in the public area
             */
            if ( ! defined( 'WTS_PUBLIC_VIEWS_DIR' ) ) {
                define( 'WTS_PUBLIC_VIEWS_DIR', 'views/public' );
            }
        }

        /**
         * Define theme constants
         *
         * Here you can specify constants you will use when developing your theme.
         *
         * @access public
         * @static
         * @return void
         * @since 1.0.0
         */
        public static function define_theme_constants() : void
        {

        }
    }
}