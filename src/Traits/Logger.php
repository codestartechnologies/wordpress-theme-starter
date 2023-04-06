<?php
/**
 * Logger trait file.
 *
 * This file contains Logger trait for logging errors to a log files.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Traits;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Trait Logger
 *
 * This trait is used for logging informations to a log file.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
trait Logger
{
    /**
     * Log a message to a log file
     *
     * @static
     * @param string $file          The full path to the file that triggered the logger. Example can be `__FILE__`
     * @param string $message       The message to log
     * @param string $type          The message type. Can be: "error", "warning", "info", or "debug"
     * @return void
     * @since 1.0.0
     */
    public static function log( string $file, string $message, string $type = 'error' ) : void
    {
        $type = ( ! in_array( $type, array( 'error', 'warning', 'info', 'debug' ) ) ) ? 'error' : $type;

        if ( defined( 'WTS_LOGS_PATH' ) ) {
            $timezone_id = wts_config( 'date.timezone_id' );
            date_default_timezone_set( $timezone_id );
            $message = sprintf( '[%1$s][%2$s][%3$s] %4$s', date( 'Y-m-d H:i:s' ), $type, $file, $message );
            $log_file = self::get_log_file()[ $type ];
            wts_log( $message, WTS_LOGS_PATH . $log_file );
        }
    }

    /**
     * get the file for logging a message
     *
     * @access private
     * @static
     * @return array
     * @since 1.0.0
     */
    private static function get_log_file() : array
    {
        return array(
            'error'     => 'error.log',
            'warning'   => 'warning.log',
            'info'      => 'info.log',
            'debug'     => 'debug.log',
        );
    }
}