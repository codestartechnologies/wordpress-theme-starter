<?php
/**
 * Bindings class file.
 *
 * This file contains Bindings class which returns classes that will be registered with the theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App;

use WTS_Theme\App\Admin\Customizers\WTSCustomizer;
use WTS_Theme\App\Admin\Menus\WTSMenuPage;
use WTS_Theme\App\Admin\Menus\WTSOptionsPage;
use WTS_Theme\App\Admin\Menus\WTSThemePage;
use WTS_Theme\App\Admin\Notices\WTSNotice;
use WTS_Theme\App\Admin\Settings\WTSSettings;
use WTS_Theme\App\Public\Sidebars\WTSSidebar;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Bindings
 *
 * This class returns classes that will be registered with the theme.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Bindings
{
    /**
     * Bindings for classes that register admin menus
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $menus = array(
        WTSMenuPage::class => 'admin-menus.wts_menu_page',
    );

    /**
     * Bindings for classes that register themes menus
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $themes_menus = array(
        WTSThemePage::class => 'admin-menus.wts_theme_page',
    );

    /**
     * Bindings for classes that register setting menus
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $setting_menus = array(
        WTSOptionsPage::class => 'admin-menus.wts_options_page',
    );

    /**
     * Bindings for classes that register sidebars
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $sidebars = array(
        WTSSidebar::class => 'sidebars.wts_sidebar',
    );

    /**
     * Bindings for wordpress widget classes that will be unregistered
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $unregistered_widgets = array(
        WP_Widget_Calendar::class,
    );

    /**
     * Bindings for classes that register widgets
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $widgets = array(
        WTSWidget::class,
    );

    /**
     * Bindings for classes that register customizers
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $customizers = array(
        WTSCustomizer::class => 'customizers.wts_customizer',
    );

    /**
     * Bindings for classes that register settings
     *
     * @static
     * @access public
     * @var array
     * @since 1.0.0
     */
    public static array $settings = array(
        WTSSettings::class => 'settings.wts_sidebar_settings',
    );

    /**
     * Bindings for classes that create admin notices
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $admin_notices = array(

        /**
         * Un-comment the line below in order to display a custom notification message on the screen.
         */
        WTSNotice::class,

    );
}