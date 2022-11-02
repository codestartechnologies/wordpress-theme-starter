<?php
/**
 * This file contains configuration settings for registering sidebar areas
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Initial values to create 'WordPress Theme Starter Sidebar' sidebar area.
     */
    'wts_sidebar'  => array(

        'name'              => esc_html__( 'WordPress Theme Starter Sidebar', 'wts' ),

        'id'                => 'wts-sidebar',

        'description'       => esc_html__( 'Widgets in this area are shown in the posts page', 'wts' ),

        'class'             => '',

        'before_widget'     => '<div id="%1$s">',

        'after_widget'      => '</div>',

        'before_title'      => '<h4>',

        'after_title'       => '</h4>',

        'before_sidebar'    => '',

        'after_sidebar'     => '<br />',
    ),

);
