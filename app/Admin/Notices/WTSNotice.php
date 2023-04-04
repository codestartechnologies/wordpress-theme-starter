<?php
/**
 * WTSNotice class file.
 *
 * This is file contains WTSNotice class that will print a notification message on the screen.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
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

/**
 * WTSNotice class
 *
 * This class will print a notification message on the screen.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSNotice extends AbstractsAdminNotice
{
    /**
     * WTSNotice constructor
     *
     * @return void
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->type = 'info';
    }

    /**
     * The notification message
     *
     * @return string
     * @since 1.0.0
     */
    public function get_message() : string
    {
        return __( '<b>Hello Admin!</b> Thanks for using WordPress Theme Starter Boiler-Plate!', 'wts' );
    }
}