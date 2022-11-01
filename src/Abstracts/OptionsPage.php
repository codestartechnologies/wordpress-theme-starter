<?php
/**
 * OptionsPage abstract class file.
 *
 * This file contains OptionsPage abstract class which contains contracts for classes that will create admin menu pages with add_options_page().
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

if ( ! class_exists( 'OptionsPage' ) ) {
    /**
     * Class OptionsPage
     *
     * This class contains contracts that will be used to create admin menu pages with add-options_page().
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    abstract class OptionsPage extends MenuPage {
        /**
         * "admin_menu" action hook callback
         *
         * @access public
         * @final
         * @return void
         * @since 1.0.0
         */
        final public function menu_page() : void
        {
            $this->page_hook = add_options_page(
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