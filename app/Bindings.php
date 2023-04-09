<?php
/**
 * Bindings class file.
 *
 * This file contains Bindings class used to register classes that are needed to add features to the theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App;

use WP_Widget_Calendar;
use WTS_Theme\App\Admin\Customizers\WTSCustomizer;
use WTS_Theme\App\Admin\Menus\WTSMenuPage;
use WTS_Theme\App\Admin\Menus\WTSOptionsPage;
use WTS_Theme\App\Admin\Menus\WTSThemePage;
use WTS_Theme\App\Admin\Notices\WTSNotice;
use WTS_Theme\App\Admin\Settings\WTSSettings;
use WTS_Theme\App\Public\Sidebars\WTSSidebar;
use WTS_Theme\App\Public\Widgets\WTSWidget;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Bindings class
 *
 * This class is used to register classes that are needed to add features to the theme. classes are grouped according
 * to their functionlities.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Bindings
{
    /**
     * An array containing classes that will create admin menus.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $menus = array(

        /**
         * WTSMenuPage::class will create a menu page - "WordPress Theme Starter" in the admin area.
         *
         * Remove or Comment out the line below if you do not want to create this menu.
         */

        WTSMenuPage::class => 'admin-menus.wts_menu_page',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create sub menus under `Appearance`.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $themes_menus = array(

        /**
         * WTSThemePage::class will create a menu page - "WordPress Theme Starter" under `Appearance`.
         *
         * Remove or Comment out the line below if you do not want to create this menu.
         */

        WTSThemePage::class => 'admin-menus.wts_theme_page',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create sub menus under `Settings`.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $setting_menus = array(

        /**
         * WTSOptionsPage::class will create a menu page - "WordPress Theme Starter" under `Settings`.
         *
         * Remove or Comment out the line below if you do not want to create this menu.
         */

        WTSOptionsPage::class => 'admin-menus.wts_options_page',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create sidebar areas.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $sidebars = array(

        /**
         * WTSSidebar::class will register a custom sidebar area - "WordPress Theme Starter Sidebar".
         *
         * Remove or Comment out the line below if you do not want to create this sidebar area.
         */

        WTSSidebar::class => 'sidebars.wts_sidebar',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing wordpress widget classes that will be unregistered.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $unregistered_widgets = array(

        /**
         * WP_Widget_Calendar::class will unregister "Calendar" wordpress widget.
         *
         * Remove or Comment out the line below if you do not want to unregister this widget.
         */

        WP_Widget_Calendar::class,

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create widgets.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $widgets = array(

        /**
         * WTSWidget::class will register a custom wordpress widget - "WordPress Theme Starter Widget".
         *
         * Remove or Comment out the line below if you do not want to create this widget.
         */

        WTSWidget::class,

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create customizer settings, sections and controls.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $customizers = array(

        /**
         * WTSCustomizer::class will register a custom customizer section with control, visible in the customizer page.
         *
         * Remove or Comment out the line below if you do not want to create this customizer settings.
         */

        WTSCustomizer::class => 'customizers.wts_customizer',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create setting sections and fields.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $settings = array(

        /**
         * WTSSettings::class will register a custom setting section and field that can be displayed using do_settings_sections().
         *
         * Remove or Comment out the line below if you do not want to create this setting.
         */

        WTSSettings::class => 'settings.wts_sidebar_settings',

        /**
         * You can add your custom classes below
         */

    );

    /**
     * An array containing classes that will create admin notices.
     *
     * @access public
     * @static
     * @var array
     * @since 1.0.0
     */
    public static array $admin_notices = array(

        /**
         * WTSNotice::class will display a custom admin notification message on the screen.
         *
         * Remove or Comment out the line below if you do not want to create this notification.
         */

        WTSNotice::class,

        /**
         * You can add your custom classes below
         */

    );
}