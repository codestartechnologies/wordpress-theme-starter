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

use App\Constants;
use App\Hooks;
use Codestartechnologies\WordpressThemeStarter\Core\Bootstrap;

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
    private static ?WTSTheme $instance = null;

    /**
     * Object containing core functionalities of the theme.
     *
     * @access private
     * @var Bootstrap
     * @since 1.0.0
     */
    private Bootstrap $bootstrap;

    /**
     * Object that contains all Wordpress hooks needed by the theme.
     *
     * @access protected
     * @var Hooks
     * @since 1.0.0
     */
    protected Hooks $hooks;

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
        if ( is_null( self::$instance ) ) {
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
        $this->hooks = new Hooks();
        $this->bootstrap = new Bootstrap(
            $this->hooks,
            [
                // Add classes for setting up menu pages
            ],
            [
                // Add classes for setting up theme pages
            ],
            [
                // Add classes for setting up options pages
            ],
            [
                // Add classes for setting up sidebars
            ],
            [
                // Add wordpress widget classes that will be unregistered
            ],
            [
                // Add classes for setting up widgets
            ],
            [
                // Add classes for setting up customizers
            ],
            [
                // Add classes for setting up settings
            ],
            [
                // Add classes for setting up admin notices
            ]
        );

        $this->bootstrap->setup();
    }
}

$theme = WTSTheme::instance();
$theme->init();
