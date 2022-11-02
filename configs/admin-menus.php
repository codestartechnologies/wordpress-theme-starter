<?php
/**
 * This file contains configuration settings for registering admin menu pages
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Initial values to create "WTS Menu" menu page in the admin area.
     */
    'wts_menu_page'     => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Menu Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-menu-page',

        'view'          => 'menus.menu-page',

        'position'      => null,
    ),

    /**
     * Initial values to create "WTS Options Page" menu page in the admin dashboard.
     */
    'wts_options_page'  => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Options Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-options-page',

        'view'          => 'menus.options-page',

        'position'      => null,
    ),

    /**
     * Initial values to create "WTS Theme Page" menu page in the admin dashboard.
     */
    'wts_theme_page'  => array(

        'page_title'    => esc_html__( 'WordPress Theme Starter - Theme Page', 'wts' ),

        'menu_title'    => esc_html__( 'WordPress Theme Starter', 'wts' ),

        'capability'    => 'manage_options',

        'menu_slug'     => 'wts-theme-page',

        'view'          => 'menus.theme-page',

        'position'      => null,
    )
);
