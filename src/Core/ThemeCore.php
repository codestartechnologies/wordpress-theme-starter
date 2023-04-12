<?php
/**
 * ThemeCore class file.
 *
 * This file contains ThemeCore class which manages all important tasks in your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Core;

use Codestartechnologies\WordpressThemeStarter\Abstracts\AdminNotice;
use Codestartechnologies\WordpressThemeStarter\Abstracts\Customizer;
use Codestartechnologies\WordpressThemeStarter\Abstracts\MenuPage;
use Codestartechnologies\WordpressThemeStarter\Abstracts\OptionsPage;
use Codestartechnologies\WordpressThemeStarter\Abstracts\Settings;
use Codestartechnologies\WordpressThemeStarter\Abstracts\Sidebar;
use Codestartechnologies\WordpressThemeStarter\Abstracts\ThemePage;
use Codestartechnologies\WordpressThemeStarter\Helpers\Hooks as HelpersHooks;
use Codestartechnologies\WordpressThemeStarter\Helpers\ObjectsArray;
use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use WTS_Theme\App\Hooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ThemeCore class
 *
 * This class handles and manages all functionalities for your theme.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class ThemeCore implements ActionHooks
{
    /**
     * Theme hooks.
     *
     * @access protected
     * @var Hooks
     * @since 1.0.0
     */
    protected Hooks $hooks;

    /**
     * Theme default hooks.
     *
     * @access protected
     * @var HelpersHooks
     * @since 1.0.0
     */
    protected HelpersHooks $default_hooks;

    /**
     * Admin menu pages
     *
     * @access protected
     * @var MenuPage[]
     * @since 1.0.0
     */
    protected array $menu_pages;

    /**
     * Admin Theme pages
     *
     * @access protected
     * @var ThemePage[]
     * @since 1.0.0
     */
    protected array $theme_pages;

    /**
     * Admin Options pages
     *
     * @access protected
     * @var OptionsPage[]
     * @since 1.0.0
     */
    protected array $options_pages;

    /**
     * Theme sidebars
     *
     * @access protected
     * @var Sidebar[]
     * @since 1.0.0
     */
    protected array $sidebars;

    /**
     * WordPress widgets that will be unregistered
     *
     * @access protected
     * @var \WP_Widget[]
     * @since 1.0.0
     */
    protected array $removed_widgets;

    /**
     * Theme widgets
     *
     * @access protected
     * @var \WP_Widget[]
     * @since 1.0.0
     */
    protected array $widgets;

    /**
     * Theme customizers
     *
     * @access protected
     * @var Customizer[]
     * @since 1.0.0
     */
    protected array $customizers;

    /**
     * Theme settings
     *
     * @access protected
     * @var Settings[]
     * @since 1.0.0
     */
    protected array $settings;

    /**
     * Admin notices
     *
     * @access protected
     * @var AdminNotice[]
     * @since 1.0.0
     */
    protected array $admin_notices;

    /**
     * Theme construct
     *
     * @access public
     * @param Hooks $hooks
     * @param HelpersHooks $default_hooks
     * @param array $menu_pages
     * @param array $theme_pages
     * @param array $options_pages
     * @param array $sidebars
     * @param array $removed_widgets
     * @param array $widgets
     * @param array $customizers
     * @param array $settings
     * @param array $admin_notices
     * @return void
     * @since 1.0.0
     */
    public function __construct(
        Hooks $hooks,
        HelpersHooks $default_hooks,
        array $menu_pages = array(),
        array $theme_pages = array(),
        array $options_pages = array(),
        array $sidebars = array(),
        array $removed_widgets = array(),
        array $widgets = array(),
        array $customizers = array(),
        array $settings = array(),
        array $admin_notices = array()
    )
    {
        $this->hooks = $hooks;
        $this->default_hooks = $default_hooks;
        $this->menu_pages = ObjectsArray::check_objects_parent_type( $menu_pages, MenuPage::class )['valid'];
        $this->theme_pages = ObjectsArray::check_objects_parent_type( $theme_pages, ThemePage::class )['valid'];
        $this->options_pages = ObjectsArray::check_objects_parent_type( $options_pages, OptionsPage::class )['valid'];
        $this->sidebars = ObjectsArray::check_objects_parent_type( $sidebars, Sidebar::class )['valid'];
        $this->removed_widgets = ObjectsArray::check_objects_parent_type( $removed_widgets, \WP_Widget::class )['valid'];
        $this->widgets = ObjectsArray::check_objects_parent_type( $widgets, \WP_Widget::class )['valid'];
        $this->customizers = ObjectsArray::check_objects_parent_type( $customizers, Customizer::class )['valid'];
        $this->settings = ObjectsArray::check_objects_parent_type( $settings, Settings::class )['valid'];
        $this->admin_notices = ObjectsArray::check_objects_parent_type( $admin_notices, AdminNotice::class )['valid'];
    }

    /**
     * Theme core setup
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function setup() : void
    {
        // Register WordPress Theme Starter Hooks
        $this->default_hooks->register_actions();
        $this->default_hooks->register_filters();

        // Register Custom Hooks
        $this->hooks->register_actions();
        $this->hooks->register_filters();

        // Set up theme features
        $this->register_actions();
    }

    /**
     * Register add_action() and remove_action().
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function register_actions(): void
    {
        if ( is_admin() ) {
            $this->set_menu_pages();
            $this->set_theme_pages();
            $this->set_options_pages();
            $this->set_settings_pages();
            $this->set_admin_notices();
        }

        $this->set_sidebars();
        $this->set_customizers();

        add_action( 'widgets_init', array( $this, 'unset_widgets' ) );
        add_action( 'widgets_init', array( $this, 'set_widgets' ) );
    }

    /**
     * Add menu pages in the admin area
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_menu_pages() : void
    {
        if ( ! empty( $this->menu_pages ) ) {
            foreach ( $this->menu_pages as $menu_page ) {
                $menu_page->register_actions();
            }
        }
    }

    /**
     * Add theme pages in the admin area
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_theme_pages() : void
    {
        if ( ! empty( $this->theme_pages ) ) {
            foreach ( $this->theme_pages as $menu_page ) {
                $menu_page->register_actions();
            }
        }
    }

    /**
     * Add options pages in the admin area
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_options_pages() : void
    {
        if ( ! empty( $this->options_pages ) ) {
            foreach ( $this->options_pages as $menu_page ) {
                $menu_page->register_actions();
            }
        }
    }

    /**
     * Adds sidebars
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_sidebars() : void
    {
        if ( ! empty( $this->sidebars ) ) {
            foreach ( $this->sidebars as $sidebar ) {
                $sidebar->register_actions();
            }
        }
    }

    /**
     * Removes default widgets
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function unset_widgets() : void
    {
        if ( ! empty( $this->removed_widgets ) ) {
            foreach ( $this->removed_widgets as $removed_widget ) {
                unregister_widget( $removed_widget );
            }
        }
    }

    /**
     * Adds widgets
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function set_widgets() : void
    {
        if ( ! empty( $this->widgets ) ) {
            foreach ( $this->widgets as $widget ) {
                register_widget( $widget );
            }
        }
    }

    /**
     * Add customizer sections, controls and settings.
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_customizers() : void
    {
        if ( ! empty( $this->customizers ) ) {
            foreach ( $this->customizers as $customizer ) {
                $customizer->register_actions();
            }
        }
    }

    /**
     * Add settings, settings sections and settings fields
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_settings_pages() : void
    {
        if ( ! empty( $this->settings ) ) {
            foreach ( $this->settings as $setting ) {
                $setting->register_actions();
            }
        }
    }

    /**
     * Add admin notices
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function set_admin_notices() : void
    {
        if ( isset( $this->admin_notices ) ) {
            foreach ( $this->admin_notices as $notice ) {
                $notice->register_actions();
            }
        }
    }
}