<?php
/**
 * Constants class file.
 *
 * This file contains Constants class which defines needed constants that will be used in your theme development.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Constants Class
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Constants
{
    /**
     * Define core constants.
     *
     * @return void
     * @since 1.0.0
     */
    public static function define_constants() : void
    {
        /**
         * Specify theme version
         */

        if ( ! defined( 'WTS_THEME_VERSION' ) ) {
            define( 'WTS_THEME_VERSION', '0.1.0' );
        }

        /**
         * Define links to wts-template CSS files
         */

        if ( ! defined( 'WTS_TEMPLATE_CSS' ) ) {
            define( 'WTS_TEMPLATE_CSS', WTS_CSS_URI . 'style.css' );
        }

        if ( ! defined( 'WTS_TEMPLATE_RESPONSIVE_CSS' ) ) {
            define( 'WTS_TEMPLATE_RESPONSIVE_CSS', WTS_CSS_URI . 'responsive.css' );
        }

        /**
         * Define links to wts-template JS files
         */

        if ( ! defined( 'WTS_TEMPLATE_JS' ) ) {
            define( 'WTS_TEMPLATE_JS', WTS_JS_URI . 'script.js' );
        }

        /**
         * Define links to wts-template Image files
         */

        if ( ! defined( 'WTS_LOGO_IMG' ) ) {
            define( 'WTS_LOGO_IMG', WTS_IMG_URI . 'logo.png' );
        }

        if ( ! defined( 'WTS_LOGO_INVERTED_IMG' ) ) {
            define( 'WTS_LOGO_INVERTED_IMG', WTS_IMG_URI . 'logo inverted.png' );
        }

        if ( ! defined( 'WTS_BANNER_IMG' ) ) {
            define( 'WTS_BANNER_IMG', WTS_IMG_URI . 'WordPress Theme Starter.png' );
        }

        /**
         * Define constants needed by your theme below
         */
    }
}