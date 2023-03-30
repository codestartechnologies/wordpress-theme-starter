<?php
/**
 * FilterHooks interface file.
 *
 * This file contains FilterHooks interface. Classes that make use of add_filter() and remove_filter()
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
 * Interface FilterHooks
 *
 * Classes that make use of add_filter() and remove_filter() need to implement this interface.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
interface FilterHooks {
    /**
     * Register add_filter() and remove_filter().
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function register_filters() : void;
}