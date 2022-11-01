<?php
/**
 * AdminNotice class file.
 *
 * This file contains AdminNotice class which contains methods for printing admin notifications to the screen.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link        https://codestar.com.ng
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Admin\Notices;

use Codestartechnologies\WordpressThemeStarter\Abstracts\AdminNotice as AbstractsAdminNotice;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'AdminNotice' ) ) {
    /**
     * Class AdminNotice
     *
     * This class contains methods for printing admin notifications to the screen. This class implements one method: notification().
     *
     * @package WordpressThemeStarter
     * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class AdminNotice extends AbstractsAdminNotice {
        /**
         * "admin_notices" action hook callback
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function notification() : void
        {
            //
        }
    }
}