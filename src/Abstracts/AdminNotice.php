<?php
/**
 * AdminNotice abstract class file.
 *
 * This file contains contracts for AdminNotice abstract class. Classes that will register admin notifications will need to inherit this
 * class. Child classes must define `get_message()` method.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * AdminNotice abstract class
 *
 * This class contains contracts that will be used to register admin notifications. Classes that will register admin notifications will need
 * to inherit this class. Child classes must define `get_message()` method.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
abstract class AdminNotice implements ActionHooks
{
    /**
     * Notification Type
     *
     * Accepted values are: `error`, `warning`, `success`, and `info`. Default `error`.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $type = 'error';

    /**
     * Boolean check to determine if the notification message can be dismissed. Default `true`.
     *
     * @access protected
     * @var boolean
     * @since 1.0.0
     */
    protected bool $dismissible = true;

    /**
     * Register add_action() and remove_action().
     *
     * @final
     * @access public
     * @return void
     * @since 1.0.0
     */
    final public function register_actions() : void
    {
        add_action( 'admin_notices', array( $this, 'show_notification' ) );
    }

    /**
     * "admin_notices" action hook callback
     *
     * Prints admin screen notices.
     *
     * @final
     * @return void
     * @since 1.0.0
     */
    final public function show_notification() : void
    {
        if ( $this->can_show_notice() ) {
            $class = array( 'notice' );
            $class[] = $this->get_notice_class()[$this->type] ?? 'notice-error';
            $class[] = ( $this->dismissible ) ? 'is-dismissible' : null;
            printf( '<div class="%1$s"><p>%2$s</p></div>', implode( ' ', $class ), wp_kses_post( $this->get_message() ) );
        }
    }

    /**
     * Check before the admin notice is printed
     *
     * @access protected
     * @return bool
     * @since 1.0.0
     */
    protected function can_show_notice() : bool
    {
        return true;
    }

    /**
     * Get notification class from the type
     *
     * @return array
     * @since 1.0.0
     */
    private function get_notice_class() : array
    {
        return array(
            'error'     => 'notice-error',
            'warning'   => 'notice-warning',
            'success'   => 'notice-success',
            'info'      => 'notice-info',
        );
    }

    /**
     * The notification message
     *
     * @abstract
     * @access public
     * @return string
     * @since 1.0.0
     */
    abstract public function get_message() : string;
}