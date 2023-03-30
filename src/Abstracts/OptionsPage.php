<?php
/**
 * OptionsPage abstract class file.
 *
 * This file contains OptionsPage abstract class which contains contracts for classes that will create admin menu pages with add_options_page().
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class OptionsPage
 *
 * This class contains contracts that will be used to create admin menu pages with add-options_page().
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
abstract class OptionsPage extends MenuPage
{
    /**
     * "admin_menu" action hook callback
     *
     * @final
     * @access public
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