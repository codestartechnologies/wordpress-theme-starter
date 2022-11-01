<?php
/**
 * ThemePage abstract class file.
 *
 * This file contains ThemePage abstract class which contains contracts for classes that will
 * create menu pages in the admin section using add_theme_page().
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

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
     * This class contains contracts that will be used to create theme menu pages.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    abstract class ThemePage extends MenuPage {
        /**
         * "admin_menu" action callback
         *
         * @access public
         * @final
         * @return void
         * @since 1.0.0
         */
        final public function menu_page() : void
        {
            $this->page_hook = add_theme_page(
                $this->page_title,
                $this->menu_title,
                $this->capability,
                $this->menu_slug,
                array( $this, 'menu_page_cb' ),
                $this->position
            );
        }
    }
}