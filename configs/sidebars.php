<?php
/**
 * This file contains configuration settings for registering sidebar areas
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

return array(

    /**
     * Initial values to create 'WordPress Theme Starter Sidebar' sidebar area.
     */
    'wts_sidebar'  => array(

        'name'              => esc_html__( 'WordPress Theme Starter Sidebar', 'wts' ),

        'id'                => 'wts-sidebar',

        'description'       => esc_html__( 'Widgets in this area are shown in archive pages and single pages', 'wts' ),

        'class'             => '',

        'before_widget'     => '<div id="%1$s">',

        'after_widget'      => '</div>',

        'before_title'      => '<h4 class="sidebar-title">',

        'after_title'       => '</h4>',

        'before_sidebar'    => '',

        'after_sidebar'     => '',
    ),

    /**
     * Add configuration settings for your sidebar areas below
     */

);