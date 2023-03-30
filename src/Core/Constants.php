<?php
/**
 * Constants class file.
 *
 * This file contains Constants class which defines needed constants that will be used in Your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Core;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Constants
 *
 * This class defines needed constants that will be used in the theme development.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Constants
{
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
         * Theme directory path
         */
        if ( ! defined( 'WTS_PATH' ) ) {
            define( 'WTS_PATH', trailingslashit( get_theme_file_path() ) );
        }

        /**
         * Theme directory uri
         */
        if ( ! defined( 'WTS_URI' ) ) {
            define( 'WTS_URI', trailingslashit( get_theme_file_uri() ) );
        }

        /**
         * Directory uri for css files
         */
        if ( ! defined( 'WTS_CSS_URI' ) ) {
            define( 'WTS_CSS_URI', trailingslashit( WTS_URI . 'assets/css' ) );
        }

        /**
         * Directory uri for javascript files
         */
        if ( ! defined( 'WTS_JS_URI' ) ) {
            define( 'WTS_JS_URI', trailingslashit( WTS_URI . 'assets/js' ) );
        }

        /**
         * Directory uri for image files
         */
        if ( ! defined( 'WTS_IMG_URI' ) ) {
            define( 'WTS_IMG_URI', trailingslashit( WTS_URI . 'assets/images' ) );
        }

        /**
         * Directory for storing views shown in the admin area
         */
        if ( ! defined( 'WTS_ADMIN_VIEWS_DIR' ) ) {
            define( 'WTS_ADMIN_VIEWS_DIR', trailingslashit( 'views/admin' ) );
        }

        /**
         * Directory for storing views shown in the public area
         */
        if ( ! defined( 'WTS_PUBLIC_VIEWS_DIR' ) ) {
            define( 'WTS_PUBLIC_VIEWS_DIR', trailingslashit( 'views/public' ) );
        }

        /**
         * Directory for storing configuration files
         */
        if ( ! defined( 'WTS_CONFIGS_DIR' ) ) {
            define( 'WTS_CONFIGS_DIR', trailingslashit( WTS_PATH . 'configs') );
        }

        /**
         * Theme template parts base directory
         */
        if ( ! defined( 'WTS_TEMPLATE_PARTS_DIR' ) ) {
            define( 'WTS_TEMPLATE_PARTS_DIR', trailingslashit( WTS_PATH . 'template-parts/' ) );
        }

        /**
         * Directory for storing theme language translation files
         */
        if ( ! defined( 'WTS_LANGUAGES_DIR' ) ) {
            define( 'WTS_LANGUAGES_DIR', trailingslashit( WTS_PATH . 'languages/' ) );
        }
    }
}