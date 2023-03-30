<?php
/**
 * ActionHooks interface file.
 *
 * This file contains ActionHooks interface. Classes that make use of add_action() and remove_action()
 * need to implement this interface.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Interfaces;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Interface ActionHooks
 *
 * Classes that make use of add_action() and remove_action() need to implement this interface.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
interface ActionHooks {
    /**
     * Register add_action() and remove_action().
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function register_actions() : void;
}