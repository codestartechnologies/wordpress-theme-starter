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
        // Theme directory path
        if ( ! defined( 'WTS_PATH' ) ) {
            define( 'WTS_PATH', trailingslashit( get_theme_file_path() ) );
        }

        // Theme directory uri
        if ( ! defined( 'WTS_URI' ) ) {
            define( 'WTS_URI', trailingslashit( get_theme_file_uri() ) );
        }

        // Theme assets directory uri
        if ( ! defined( 'WTS_ASSETS_URI' ) ) {
            define( 'WTS_ASSETS_URI', trailingslashit( WTS_URI . 'assets' ) );
        }

        // Theme css files directory uri
        if ( ! defined( 'WTS_CSS_URI' ) ) {
            define( 'WTS_CSS_URI', trailingslashit( WTS_ASSETS_URI . 'css' ) );
        }

        // Theme javascript files directory uri
        if ( ! defined( 'WTS_JS_URI' ) ) {
            define( 'WTS_JS_URI', trailingslashit( WTS_ASSETS_URI . 'js' ) );
        }

        // Theme image files directory uri
        if ( ! defined( 'WTS_IMG_URI' ) ) {
            define( 'WTS_IMG_URI', trailingslashit( WTS_ASSETS_URI . 'images' ) );
        }

        // Theme view files directory
        if ( ! defined( 'WTS_VIEWS_DIR' ) ) {
            define( 'WTS_VIEWS_DIR', trailingslashit( WTS_PATH . 'views' ) );
        }

        // Directory for storing views shown in the admin area
        if ( ! defined( 'WTS_ADMIN_VIEWS_DIR' ) ) {
            define( 'WTS_ADMIN_VIEWS_DIR', trailingslashit( WTS_VIEWS_DIR . 'admin' ) );
        }

        // Directory for storing views shown in the public area
        if ( ! defined( 'WTS_PUBLIC_VIEWS_DIR' ) ) {
            define( 'WTS_PUBLIC_VIEWS_DIR', trailingslashit( WTS_VIEWS_DIR . 'public' ) );
        }

        // Theme configuration files directory
        if ( ! defined( 'WTS_CONFIGS_DIR' ) ) {
            define( 'WTS_CONFIGS_DIR', trailingslashit( WTS_PATH . 'configs') );
        }

        // Theme template parts base directory
        if ( ! defined( 'WTS_TEMPLATE_PARTS_DIR' ) ) {
            define( 'WTS_TEMPLATE_PARTS_DIR', trailingslashit( WTS_PATH . 'template-parts' ) );
        }

        // Theme language translation files directory
        if ( ! defined( 'WTS_LANGUAGES_DIR' ) ) {
            define( 'WTS_LANGUAGES_DIR', trailingslashit( WTS_PATH . 'languages' ) );
        }

        // Theme logs directory
        if ( ! defined( 'WTS_LOGS_PATH' ) ) {
            define( 'WTS_LOGS_PATH', trailingslashit( WTS_PATH . 'logs' ) );
        }
    }
}