<?php
/**
 * ThemePage class file.
 *
 * This class contains ThemePage class file. This is an example class file for classes that need to register admin menus
 * using add_theme_page() method.
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
     * This is an example class file for classes that need to register admin menus using add_theme_page() method. This class implements
     * two methods: view_args() and load_page_hook().
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class ThemePage extends AbstractsThemePage {
        /**
         * ThemePage constructor
         *
         * @access public
         * @param array $parameters   Initial parameters passed to add_theme_page() method
         * @return void
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            parent::__construct( $parameters );
        }

        /**
         * Returns arguments that will be passed to the page.
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
         * Used to add functionalties that will run before the registered menu page is fully loaded.
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