<?php
/**
 * The main template that your theme works with it.
 *
 * This file is like a plugin for your template. All of functions and classes
 * that you want to use it in your WordPress theme, are inside in this file.
 *
 * @package    WordpressThemeStarter
 * @version    1.0.0
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://codestar.com.ng
 */

use Codestartechnologies\WordpressThemeStarter\Core\Constants as CoreConstants;
use Codestartechnologies\WordpressThemeStarter\Core\Bootstrap;
use WTS_Theme\App\Bindings;
use WTS_Theme\App\Constants;
use WTS_Theme\App\Hooks;

/**
 * Prevent direct access to this file from url
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class WTSTheme
 *
 * This class is primary file of theme which is used from singleton design pattern.
 *
 * @package WordpressThemeStarter
 * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSTheme {
    /**
     * Instance property of Rome class.
     *
     * This property will be used to create one object from Rome class in the whole of
     * program execution
     *
     * @access private
     * @static
     * @var WTSTheme
     * @since 1.0.0
     */
    private static WTSTheme $instance;

    /**
     * Object containing core functionalities of the theme.
     *
     * @access private
     * @var Bootstrap
     * @since 1.0.0
     */
    private Bootstrap $bootstrap;

    /**
     * WTSTheme constructor
     *
     * Defines related constants, include autoloader class for this theme.
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function __construct()
    {
        /**
         * Include autoloader class that will load required classes for this theme.
         */
        require_once get_template_directory() . '/vendor/autoload.php';
        require_once get_template_directory() . '/autoload.php';

        /**
         * Define core constants
         */
        CoreConstants::define_core_constants();

        /**
         * Define theme constants
         */
        Constants::define_constants();

    }

    /**
     * WTSTheme Instance
     *
     * Creates an instance from WTSTheme class
     *
     * @access public
     * @static
     * @return WTSTheme
     * @since 1.0.0
     */
    public static function instance() : WTSTheme
    {
        /**
         * Check for an existing instance and return instance
         */
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Initialize the theme with dependency injections.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function init() : void
    {
        $this->bootstrap = new Bootstrap(
            new Hooks(),
            self::boot_with_configs( Bindings::$menus ),
            self::boot_with_configs( Bindings::$themes_menus ),
            self::boot_with_configs( Bindings::$setting_menus ),
            self::boot_with_configs( Bindings::$sidebars ),
            self::boot( Bindings::$unregistered_widgets ),
            self::boot( Bindings::$widgets ),
            self::boot_with_configs( Bindings::$customizers ),
            self::boot_with_configs( Bindings::$settings ),
            self::boot( Bindings::$admin_notices )
        );

        $this->bootstrap->setup();
    }

    /**
     * Initialize classes.
     *
     * @param array $classes
     * @return array
     */
    private static function boot( array $classes = array() ) : array
    {
        $objects_array = array();

        if ( ! empty( $classes ) ) {
            foreach ( $classes as $class ) {
                if ( class_exists( $class ) ) {
                    $objects_array[] = new $class();
                }
            }
        }

        return $objects_array;
    }

    /**
     * Initialize classes.
     *
     * @param array $classes
     * @return array
     */
    private static function boot_with_configs( array $classes = array() ) : array
    {
        $objects_array = array();

        if ( ! empty( $classes ) ) {
            foreach ( $classes as $class => $config ) {
                if ( class_exists( $class ) ) {
                    $objects_array[] = new $class( wts_config( $config ) );
                }
            }
        }

        return $objects_array;
    }
}

$theme = WTSTheme::instance();
$theme->init();
