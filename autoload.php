<?php
/**
 * This file contains an autoloading function for loading required classes.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

spl_autoload_register( 'wts_autoloader' );

/**
 * Function to autoload classes starting with WTS_Theme namespace
 *
 * @param string $class
 * @return void
 * @since 1.0.0
 */
function wts_autoloader( string $class ) : void
{
    $namespace = 'WTS_Theme\App';

    if ( strpos( $class, $namespace ) !== 0 ) {
        return;
    }

    $class = str_replace( $namespace, '', $class );
    $class = str_replace( '\\', DIRECTORY_SEPARATOR, $class ) . '.php';
    $path = get_template_directory() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $class;

    if ( is_readable( $path ) ) {
        require_once( $path );
    }
}