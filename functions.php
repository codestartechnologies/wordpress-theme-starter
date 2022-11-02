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

use App\Admin\Customizers\WTSCustomizer;
use App\Admin\Menus\WTSMenuPage;
use App\Admin\Menus\WTSOptionsPage;
use App\Admin\Menus\WTSThemePage;
use App\Admin\Notices\WTSAdminNotice;
use App\Admin\Settings\WTSSettings;
use App\Constants;
use App\Hooks;
use App\Public\Sidebars\WTSSidebar;
use App\Public\Widgets\WTSWidget;
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
                /**
                 * WordPress Theme Starter default menu page(s)
                 *
                 * You can comment out any WTS default menu page
                 */
                new WTSMenuPage( wts_config( 'admin-menus.wts_menu_page' ) ),

                /**
                 * You can add custom classes for registering admin menu page below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default theme menu page(s)
                 *
                 * You can comment out any WTS default theme menu page
                 */
                new WTSThemePage( wts_config( 'admin-menus.wts_theme_page' ) ),

                /**
                 * You can add custom classes for registering admin theme menu page below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default options menu page(s)
                 *
                 * You can comment out any WTS default options menu page
                 */
                new WTSOptionsPage( wts_config( 'admin-menus.wts_options_page' ) ),

                /**
                 * You can add custom classes for registering admin options menu page below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default sidebar(s)
                 *
                 * You can comment out any WTS default sidebar area
                 */
                new WTSSidebar( wts_config( 'sidebars.wts_sidebar' ) ),

                /**
                 * You can add custom classes for registering sidebar areas below
                 */

            ],
            [
                /**
                 * Default widget classes that will be unregistered by WordPress Theme Starter
                 *
                 * You can comment out any widget that has been unregistered by WTS
                 */
                WP_Widget_Calendar::class,

                /**
                 * You can add custom widget classes that will be unregistered below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default widget(s)
                 *
                 * You can comment out any WTS default widget
                 */
                WTSWidget::class,

                /**
                 * You can add custom classes for adding widget below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default customizer section(s)
                 *
                 * You can comment out any WTS default customizer section
                 */
                new WTSCustomizer( wts_config( 'customizers.wts_customizer' ) ),

                /**
                 * You can add custom classes for registering customizer section below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default setting page(s)
                 *
                 * You can comment out any WTS default settings page
                 */
                new WTSSettings( wts_config( 'settings.wts_sidebar_settings' ) ),

                /**
                 * You can add custom classes for registering settings page below
                 */

            ],
            [
                /**
                 * WordPress Theme Starter default admin notification(s)
                 *
                 * You can comment out any WTS default admin notification
                 */
                WTSAdminNotice::class,

                /**
                 * You can add custom classes for adding admin notifications below
                 */

            ]
        );

        $this->bootstrap->setup();
    }
}

$theme = WTSTheme::instance();
$theme->init();
