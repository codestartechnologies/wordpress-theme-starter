<?php
/**
 * ThemePage class file.
 *
 * This file contains ThemePage class file. This is an example class file for classes that need to register admin menus with add_theme_page().
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Admin\Menus;

use Codestartechnologies\WordpressThemeStarter\Abstracts\ThemePage as AbstractsThemePage;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'ThemePage' ) ) {
    /**
     * Class ThemePage
     *
     * This class registers admin menus using add_theme_page(). This class must implement view_args() and load_page_hook() methods.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class ThemePage extends AbstractsThemePage {
        /**
         * ThemePage constructor
         *
         * @access public
         * @param array $parameters   Initial parameters passed to add_theme_page()
         * @return void
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            parent::__construct( $parameters );
        }

        /**
         * Get arguments that will be passed to the page.
         *
         * @access public
         * @return array
         * @since 1.0.0
         */
        public function view_args(): array
        {
            return array();
        }

        /**
         * Add functionalties that will run before the menu page is fully loaded.
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function load_page_hook(): void
        {
            //
        }
    }
}