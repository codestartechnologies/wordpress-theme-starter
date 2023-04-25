<?php
/**
 * Constants class file.
 *
 * This file contains Constants class which defines needed constants to ease your theme development processes.
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
 * This class defines needed constants to ease your theme development processes.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Constants
{
    /**
     * Define core constants.
     *
     * @static
     * @return void
     * @since 1.0.0
     */
    public static function define_constants() : void
    {
        // Theme Name
        if ( ! defined( 'THEME_NAME' ) ) {
            define( 'THEME_NAME', $_ENV['THEME_NAME'] ?? 'YOUR_THEME_NAME' );
        }

        // Theme Version
        if ( ! defined( 'THEME_VERSION' ) ) {
            define( 'THEME_VERSION', $_ENV['THEME_VERSION'] ?? 'YOUR_THEME_VERSION' );
        }

        // Theme Author
        if ( ! defined( 'THEME_AUTHOR' ) ) {
            define( 'THEME_AUTHOR', $_ENV['THEME_AUTHOR'] ?? 'YOUR_THEME_AUTHOR' );
        }

        // Theme version
        if ( ! defined( 'WTS_THEME_VERSION' ) ) {
            define( 'WTS_THEME_VERSION', '0.1.0' );
        }

        // Links to CSS and JS files used in the front-end

        if ( ! defined( 'WTS_TEMPLATE_CSS' ) ) {
            define( 'WTS_TEMPLATE_CSS', WTS_CSS_URI . 'style.css' );
        }

        if ( ! defined( 'WTS_TEMPLATE_RESPONSIVE_CSS' ) ) {
            define( 'WTS_TEMPLATE_RESPONSIVE_CSS', WTS_CSS_URI . 'responsive.css' );
        }

        if ( ! defined( 'WTS_TEMPLATE_JS' ) ) {
            define( 'WTS_TEMPLATE_JS', WTS_JS_URI . 'script.js' );
        }

        // Links to Image files used at the front-end

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
         * Define your custom constants below. It is recommended you check for existence of a constant before defining it.
         */

    }
}