<?php
/**
 * WTSAdminNotice class file.
 *
 * This is an example class file for printing admin notifications to the screen.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link        https://codestar.com.ng
 * @since       1.0.0
 */

namespace WTS_Theme\App\Admin\Notices;

use Codestartechnologies\WordpressThemeStarter\Abstracts\AdminNotice as AbstractsAdminNotice;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WTSAdminNotice' ) ) {
    /**
     * Class WTSAdminNotice
     *
     * This class contains methods for printing admin notifications to the screen. This class implements one method: notification().
     *
     * @package WordpressThemeStarter
     * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSAdminNotice extends AbstractsAdminNotice {
        /**
         * "admin_notices" action hook callback
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function notification() : void
        {
            $message = __( '<b>Hello Admin!</b> Thanks for using WordPress Theme Starter Boiler-Plate!', 'wts' );
            printf( '<div class="notice notice-info is-dismissible"><p>%s</p></div>', $message );
        }
    }
}