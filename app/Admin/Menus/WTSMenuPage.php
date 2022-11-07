<?php
/**
 * WTSMenuPage class file.
 *
 * This is an example class file for creating admin menu pages with add_menu_page().
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace WTS_Theme\App\Admin\Menus;

use Codestartechnologies\WordpressThemeStarter\Abstracts\MenuPage as AbstractsMenuPage;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WTSMenuPage' ) ) {
    /**
     * Class WTSMenuPage
     *
     * This class registers admin menus using add_menu_page(). This class must implement view_args() and load_page_hook() methods.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSMenuPage extends AbstractsMenuPage {
        /**
         * WTSMenuPage constructor
         *
         * @access public
         * @param array $parameters   Initial parameters passed to add_menu_page()
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
            return array(

                'random_string' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quidem suscipit voluptas aliquam in nisi, iste dolorem incidunt possimus ab, ullam mollitia, velit nostrum sunt repellat a ipsum laborum repudiandae!',
            );
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