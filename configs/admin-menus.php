<?php
/**
 * This file contains configuration settings for classes that will register admin pages.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

return array(

    // Config values for WTSMenuPage::class
    'wts_menu_page'     => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Menu Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-menu-page',

        'view'          => 'menus.wts-menu-page',

        'position'      => null,
    ),

    // Config values for WTSOptionsPage::class
    'wts_options_page'  => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Options Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-options-page',

        'view'          => 'menus.wts-options-page',

        'position'      => null,
    ),

    // Config values for WTSThemePage::class
    'wts_theme_page'  => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Theme Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-theme-page',

        'view'          => 'menus.wts-theme-page',

        'position'      => null,
    )

    /**
     * You can add your custom config settings below.
     */

);